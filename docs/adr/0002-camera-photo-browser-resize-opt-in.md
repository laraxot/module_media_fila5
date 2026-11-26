---
title: "ADR — Le foto da fotocamera si riducono nel browser, con un campo dedicato e non per tutti i FileUpload"
type: decision
module: Media
tags: [adr, media, upload, fotocamera, filepond, resize, mobile]
created: 2026-11-24
updated: 2026-11-26
status: accepted
decision-makers: [Media]
related:
  - ../../app/Filament/Forms/Components/CameraPhotoUpload.php
  - ../../resources/js/camera-image.js
  - ../stories/media-mobile-camera-upload.story.md
qmd: "camera photo browser resize opt foto"
---

# ADR: le foto da fotocamera si riducono nel browser, con un campo dedicato e non per tutti i FileUpload

## Contesto

- Una foto da telefono pesa 3-10 MB; il server di riferimento accetta 2 MB per richiesta (nginx e PHP): HTTP 413 su
  `/livewire/upload-file` prima che PHP veda il file.
- Misura (story `../stories/media-mobile-camera-upload.story.md`, `file-upload.js` di Filament 5.10): foto 4000x3000 da
  9,9 MB ridotta a 2048 px = 1,84 MB, a 1920 px = 1,51 MB.
- Applicare il resize di FilePond a ogni campo (`FileUpload::configureUsing`) e' stato misurato: riscrive gli SVG, appiattisce
  le GIF animate in PNG, ingrassa i PNG piccoli.

Domanda: come far passare le foto grandi senza toccare gli altri upload e senza dipendere dai limiti del server?

## Driver della decisione

- Le foto da fotocamera superano il limite di richiesta del server (HTTP 413 prima di PHP): il file va ridotto prima dell'invio.
- Gli altri upload (SVG, GIF animate, PNG piccoli, PDF) non devono cambiare: il resize globale e' stato misurato dannoso.
- Il limite di nginx non e' leggibile da PHP ([ADR 0003](0003-effective-upload-limit-in-web-request.md)): la soluzione non puo' basarsi su una configurazione del server.

## Alternative scartate

- Resize globale su ogni `FileUpload`: danni misurati su SVG, GIF e PNG piccoli.
- `filament-take-picture-field` / `getUserMedia`: anteprima a bassa risoluzione, permessi del browser, stato base64 nel
  payload Livewire (stesso limite di 2 MB), niente galleria ne' PDF.
- Upload a blocchi (Uppy): rotte e riassemblaggio in piu', un secondo flusso accanto a Livewire.
- Alzare il limite del server: utile e fuori dal codice (proprietario dell'hosting), ma non basta per foto da 10 MB su reti lente.
- `capture` sull'unico input: su Android e iOS apre solo la fotocamera, niente galleria ne' PDF.

## Decisione

- Pannello: campo `CameraPhotoUpload` (`app/Filament/Forms/Components/CameraPhotoUpload.php`, estende
  `XotBaseSpatieMediaLibraryFileUpload`) con resize FilePond `contain`, lato massimo `MAX_SIDE` = 2048 px
  (`CameraPhotoUpload.php:20`), senza upscale. E' **opt-in**: lo usa solo il campo che riceve foto.
- Front office: `resources/js/camera-image.js` (`window.MediaCameraImage.normalize(file)`) riduce e converte HEIC prima
  dell'upload; due pulsanti, "Scatta una foto" (`capture="environment"`) e "Scegli file" (galleria e PDF).
- `maxSize` del campo resta sul file originale (FilePond lo controlla prima del resize); la validazione server non cambia.

## Conseguenze

- Pro: foto sotto 2 MB senza cambiare il server; gli altri upload restano intatti.
- Contro: la riduzione dipende dal browser; un PNG grande a 2048 px puo' ancora superare 2 MB (FilePond di Filament 5.10 non
  permette di forzare l'output JPEG).
- Debito: il commento della classe (`CameraPhotoUpload.php:14`) e il test (`tests/Unit/Filament/CameraPhotoUploadTest.php:14`)
  citano `docs/camera-photo-upload-research.md`, che non esiste piu' nel modulo; le misure sono nella story. Due numeri
  divergenti: `CameraPhotoUpload::MAX_SIDE` = 2048, default di `normalize()` in `camera-image.js:71` = 1920 (il chiamante
  puo' passare `maxSide`); la story voleva un solo numero.

## Conferma

- `tests/Unit/Filament/CameraPhotoUploadTest.php`: resize `MAX_SIDE` x `MAX_SIDE`, modo `contain`, niente upscale
  (`shouldAutomaticallyUpscaleImagesWhenResizing()` falso), un campo puo' scegliere una misura propria; da `laravel/`: `vendor/bin/pest Modules/Media/tests/Unit/Filament/CameraPhotoUploadTest.php`
  (runner con DB isolato: `bashscripts/tools/pest-scratch-db.sh`).
- Nessun resize globale: `rg -n "configureUsing" Modules/*/app --glob '*.php' | rg -i "FileUpload"` dal dir `laravel/` non
  deve dare risultati (oggi vuoto); la regola resta anche una voce di review.
