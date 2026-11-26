---
title: "Architecture Decision Records — Media"
type: index
module: Media
tags: [adr, decisioni]
created: 2026-11-18
updated: 2026-11-26
qmd: "media architecture decision records formato adr decisione contesto alternative scartate conseguenze conferma decisioni readme"
---

# Architecture Decision Records — Media

Il **perche'** delle scelte di questo pacchetto: una decisione per file, con le alternative scartate e una conferma
ripetibile. Un ADR si scrive solo per una scelta difficile da invertire, sorprendente e con un trade-off reale.
Il nome del file e' `NNNN-argomento.md`, senza date (la data sta nella frontmatter). Modello: [0000-template](0000-template.md);
regole condivise: [Xot ADR](../../../Xot/docs/adr/README.md). Le intestazioni sono controllate da
`Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`.

## Formato

Frontmatter: `title`, `type: decision`, `status` (`proposed`, `accepted`, `rejected`, `deprecated`, `superseded` con
`superseded_by`), `created`, `updated`, `module`, `decision-makers`. Sezioni `##` in quest'ordine: `Contesto`,
`Driver della decisione`, `Alternative scartate`, `Decisione`, `Conseguenze`, `Conferma`. Se il codice di oggi contraddice
la decisione si aggiunge `Stato attuale` con file e riga; non si riscrive la storia. Chi cambia una decisione scrive un nuovo
ADR e segna il vecchio `superseded`.

## Decisioni

| ADR | Stato | Scopo | Conferma oggi |
|---|---|---|---|
| [0001](0001-upload-temporanei-con-percorso-scopato-e-policy.md) | accepted | Percorso `tmp/` scopato per gli upload temporanei e policy `media.*`/`temporary_upload.*`. Ha `Stato attuale`: l'Action dei percorsi e la Request S3 non hanno chiamanti. | Test percorsi (`MEDIA-PATH-INV-2`..`4`) e policy; la Request non e' provata. |
| [0002](0002-camera-photo-browser-resize-opt-in.md) | accepted | Foto da fotocamera ridotte nel browser con un campo dedicato (`CameraPhotoUpload`), non su ogni `FileUpload`. | `CameraPhotoUploadTest` e `rg configureUsing`. |
| [0003](0003-effective-upload-limit-in-web-request.md) | accepted | Limite di upload annunciato = minimo tra PHP, Livewire e campo, letto nella richiesta web. | `GetEffectiveUploadLimitActionTest` (`GET-EFFECTIVE-UPLOAD-LIMIT-INV-1`, `-3`, `-4`); il default 12 MB non e' provato. |
| [0004](0004-media-visibility-follows-owner.md) | accepted | La visibilita' dei media segue il record owner. Ha `Stato attuale`: il codice non la implementa, ogni punto di ingresso fissa la sua. | Nessuna conferma automatica; proposta nel file. |
| [0005](0005-strip-image-metadata-server-side.md) | accepted | Metadati Exif/GPS tolti sul server ri-codificando con GD (`StripImageMetadataAction`). | `StripImageMetadataActionTest` (`MEDIA-STRIP-INV-1`..`5`). |
| [media-visibility-follows-owner](media-visibility-follows-owner.md) | superseded da 0004 | Copia senza numero di 0004, tenuta per non rompere i link. | — |
| [0000-template](0000-template.md) | — | Modello per un nuovo ADR. | — |

## Stato di copertura

- 5 ADR numerati, tutti con le sei sezioni; 4 con una conferma automatica (0001, 0002, 0003, 0005), 1 senza (0004).
- Decisioni che il codice contraddice o non usa: 0001 (flusso di upload non collegato) e 0004 (visibilita' decisa nei singoli punti).
  Vanno riviste dal proprietario del modulo.

## Da ripulire (richiede una decisione umana)

- `media-visibility-follows-owner.md` duplica 0004: proposta, eliminarlo dopo aver aggiornato i link in `INDEX.md`.
- `index.md` e `INDEX.md` sono due indici dello stesso elenco (su file system che non distinguono maiuscole collidono): proposta,
  tenere questo README e togliere gli altri due; fino ad allora sono allineati a questa tabella.
