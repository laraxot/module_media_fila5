---
title: "ADR — Media"
type: index
tags: [adr, decisioni, media]
created: 2026-11-18
updated: 2026-11-24
---

# ADR del modulo Media

Il **perche'** delle scelte di Media sugli upload: quanto puo' pesare un file e chi lo decide, come passano le foto da
telefono, cosa resta nel file salvato (privacy).

Leggili prima di: cambiare un limite di upload, aggiungere un campo che riceve foto, toccare il trattamento delle immagini
salvate o "semplificare" la ri-codifica con un'altra libreria.

Formato (5 sezioni, frontmatter `type: decision`): [regola canonica](../../../Xot/docs/rules/action-behavioral-contract.md).

## Decisioni

- [Metadati delle foto tolti sul server con GD](strip-image-metadata-server-side.md) — ri-codifica JPEG/PNG senza Exif, GPS e testo; Imagick misurato e scartato.
- [Limite di upload effettivo letto nella richiesta web](effective-upload-limit-in-web-request.md) — minimo tra PHP (con margine), regola Livewire e campo.
- [Foto da fotocamera ridotte nel browser, campo opt-in](camera-photo-browser-resize-opt-in.md) — `CameraPhotoUpload` e `camera-image.js`, mai resize globale.
