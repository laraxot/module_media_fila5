---
title: "Contratto — StripImageMetadataAction"
type: contract
action: "Modules\Media\Actions\Image\StripImageMetadataAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "contract StripImageMetadataAction media exif gps privacy immagine MEDIA-STRIP-INV"
---

# StripImageMetadataAction

Riscrive l'originale JPEG o PNG di un media senza metadati (EXIF, posizione GPS, fotocamera, XMP, chunk di testo).
Codice: `app/Actions/Image/StripImageMetadataAction.php:15-57`. Perche': [ADR 0005](../adr/0005-strip-image-metadata-server-side.md);
misure e storia: [story 0024](../stories/0024-media-mobile-camera-upload.story.md).

Chiamante: `Modules\Fixcity\Listeners\StripTicketPhotoMetadataListener` (registrato in
`Modules/Fixcity/app/Providers/EventServiceProvider.php:29` su `MediaHasBeenAddedEvent`; agisce solo se `model_type` e' il morph di `Ticket`).

## Input

- `Spatie\MediaLibrary\MediaCollections\Models\Media $media` gia' salvato, con il file sul suo `disk`: usa `mime_type`, `disk`, `getPathRelativeToRoot()`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| MEDIA-STRIP-INV-1 | Un JPEG esce senza Exif ne' GPS e con l'orientamento Exif gia' applicato ai pixel (larghezza e altezza scambiate per Orientation=6). | `MEDIA-STRIP-INV-1` |
| MEDIA-STRIP-INV-2 | Un PNG esce senza chunk `tEXt`/`iTXt` (testo, XMP), con le stesse dimensioni. | `MEDIA-STRIP-INV-2` |
| MEDIA-STRIP-INV-3 | Un mime diverso da `image/jpeg` e `image/png` (PDF, ...) resta identico byte per byte e il record non cambia. | `MEDIA-STRIP-INV-3` |
| MEDIA-STRIP-INV-4 | Dopo la riscrittura la colonna `size` del record e' la dimensione del nuovo file. | `MEDIA-STRIP-INV-4` |
| MEDIA-STRIP-INV-5 | La scelta si fa sul `mime_type` del record, non sul contenuto: un JPEG registrato come `application/octet-stream` non viene toccato. | `MEDIA-STRIP-INV-5` |

## Effetti collaterali

1. Legge l'originale dal disco del media.
2. Decodifica con Intervention Image (driver GD) e ri-codifica con `strip: true` (JPEG qualita' 90, PNG).
3. Sovrascrive il file sullo stesso percorso (`$disk->put`).
4. `UPDATE media SET size = ...` (`$media->save()`).

## Errori

- File mancante sul disco (`get()` restituisce `null`): ritorna senza fare nulla.
- Immagine non decodificabile da GD: l'eccezione di Intervention Image risale al chiamante; `StripTicketPhotoMetadataListener` non la cattura.
  In Fixcity la previene a monte `TicketForm::decodableImageRule()` (`Modules/Fixcity/app/Filament/Resources/TicketResource/Schemas/TicketForm.php:243`).

## Non fa

- Non tocca conversioni e immagini responsive gia' generate (vanno rigenerate dopo, se servono).
- Non converte formati (HEIC, WEBP restano come sono: il mime non e' gestito).
- Non conserva una copia dell'originale con i metadati: la posizione e' persa per sempre, ed e' voluto.
- JPEG ri-codificato a qualita' 90: non e' una copia lossless.

## Prove

- `MEDIA-STRIP-INV-1`..`5`: `tests/Unit/Actions/Image/StripImageMetadataActionTest.php`; `vendor/bin/pest Modules/Media/tests --group=MEDIA-STRIP-INV-1`.
  Fixture con GPS e Orientation=6 costruite byte per byte, precondizione che il GPS ci fosse prima, PNG con `tEXt`/`iTXt`, PDF intatto, caso di controllo per INV-5.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Image/StripImageMetadataAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
