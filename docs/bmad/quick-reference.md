---
<<<<<<< .merge_file_EvfORR
title: "Media — quick reference"
type: note
tags: [media, quick-reference, commands, actions, spatie-media-library]
created: 2026-09-28
updated: 2026-09-28
qmd: "Media quick reference comandi azioni conversioni ffmpeg s3"
related:
  - ./README.md
  - ./setup-guide.md
  - ./architecture/module-boundary.md
---

# Media — quick reference

> **SUMMARY**: riferimento rapido per lo sviluppo su `Modules\Media`:
> namespace, modelli chiave, action orchestrative, comandi console, path
> delle conversioni e dipendenze. Tutto derivato da file reali del modulo.

## Namespace e connessione

- Namespace: `Modules\Media`
- Connessione DB modello: `media` (vedi `app/Models/BaseModel.php:24`)

## Modelli principali

| Modello | File | Estende / Implementa | Tabella |
|---|---|---|---|
| `Media` | `app/Models/Media.php` | `SpatieMedia` | `media` |
| `MediaConvert` | `app/Models/MediaConvert.php` | `BaseModel` | `media_converts` |
| `TemporaryUpload` | `app/Models/TemporaryUpload.php` | `BaseModel`, `HasMedia` | `temporary_uploads` |
| `BaseModel` | `app/Models/BaseModel.php` | `XotBaseModel` | — |

## Relazioni chiave

- `Media.mediaConverts()` → `HasMany` (`app/Models/Media.php:145`)
- `Media.temporaryUpload()` → `BelongsTo` (`app/Models/Media.php:124`)
- `MediaConvert.media()` → `BelongsTo` (reverse)

## Action orchestrative

| Action | File | Scopo |
|---|---|---|
| `AttachMediaAction` | `app/Actions/AttachMediaAction.php` | allega media a un modello |
| `ConvertVideoAction` | `app/Actions/Video/ConvertVideoAction.php` | conversione video principale |
| `SaveAttachmentsAction` | `app/Actions/SaveAttachmentsAction.php` | salvataggio allegati |
| `S3.UploadFileAction` | `app/Actions/S3/UploadFileAction.php` | upload su S3 |
| `S3.DeleteFileAction` | `app/Actions/S3/DeleteFileAction.php` | cancellazione su S3 |

## Console

| Comando | File | Descrizione |
|---|---|---|
| `media:convert-video` (o simile) | `app/Console/Commands/ConvertVideoCommand.php` | conversione video via FFmpeg |

## Conversioni (Spatie)

- Conversioni immagine: `app/conversions/` e `app/Conversions/ImageGenerators/`
- Conversioni video: `app/Conversions/VideoGenerators/`
- Conversione FFmpeg: `app/Actions/Ffmpeg/ResolveMediaExporterAction.php`

## Diagnostic

- `app/Actions/Diagnostic/S3/` — test connessione, credenziali, permessi
- `app/Actions/Diagnostic/Aws/` — diagnostica CloudFront, IAM, S3
- `app/Actions/Diagnostic/Support/` — creazione client S3/STS

## Enum

- `AttachmentTypeEnum` → `app/Enums/AttachmentTypeEnum.php`

## Resource Filament

| Resource | Namespace |
|---|---|
| `MediaResource` | `app/Filament/Resources/MediaResource` |
| `MediaConvertResource` | `app/Filament/Resources/MediaConvertResource` |
| `TemporaryUploadResource` | `app/Filament/Resources/TemporaryUploadResource` |
| `HasMediaResource` | `app/Filament/Resources/HasMediaResource` |

## Comandi rapidi (da laravel/)

```bash
# PHPStan solo su questo modulo
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Media

# Pint su questo modulo
./vendor/bin/pint Modules/Media

# Pest su questo modulo
./vendor/bin/pest Modules/Media
```

## Vedi anche

- [README](./README.md)
- [Setup guide](./setup-guide.md)
- [Architettura — module boundary](./architecture/module-boundary.md)
- [Epic roadmap](./epics/module-roadmap.md)
=======
title: "Media — BMAD Quick Reference"
description: "Comandi rapidi BMAD per il modulo Media"
module: "Media"
alias: "media"
documentation_date: "2026-09-29"
bmad_version: "6.2.0"
---

# Media — BMAD Quick Reference

## Comandi Rapidi

### Help

```bash
bmad-help
```

### Workflow Media

```bash
# Phase 1
bmad-domain-research      # Studio dominio: immagini, video, streaming, S3
bmad-technical-research   # Fattibilità FFmpeg, CloudFront, conversione

# Phase 2
bmad-create-prd           # PRD: upload, conversioni, streaming, allegati
bmad-create-architecture  # Architettura Media ↔ MediaConvert ↔ TemporaryUpload

# Phase 3
bmad-create-epics-and-stories            # Epic: immagini, video, allegati
bmad-check-implementation-readiness      # Quality gate

# Phase 4
bmad-sprint-planning      # Sprint iniziale
bmad-create-story         # Story: modello MediaConvert, migrazione
bmad-dev-story            # Implementazione
bmad-code-review          # Review con focus path, storage, ffmpeg
```

### Agenti per Media

| Agente | Skill | Scopo |
|--------|-------|-------|
| Mary (analyst) | `skill: "bmad-agent-analyst"` | ricerca gestione media |
| John (pm) | `skill: "bmad-agent-pm"` | PRD conversioni e streaming |
| Winston (architect) | `skill: "bmad-agent-architect"` | architettura storage e path |
| Amelia (dev) | `skill: "bmad-agent-dev"` | implementazione Actions |
| Quinn (qa) | `skill: "bmad-agent-qa"` | test upload, conversione, signed URL |

## Comandi Artisan del Modulo

```bash
php artisan media:convert-video {disk} {file}   # Convert Video
```

## Classi Chiave

### Contracts (`app/Contracts/`)

| Contract | Ruolo |
|---|---|
| `PathGeneratorContract` | Genera i path di storage in modo pluggable |
| `PathGenerator` | Implementazione concreta del generatore path |

### Enums (`app/Enums/`)

`AttachmentTypeEnum` → `image`, `video`, `document`, `manual`.

### Actions (`app/Actions/`) — un dominio per cartella

| Dominio | Action principali |
|---------|-------------------|
| `Video/` | `ConvertVideoAction`, `ConvertVideoByMediaConvertAction`, `ConvertVideoByConvertDataAction`, `GetVideoDurationAction`, `GetVideoScreenshotAction`, `GetVideoFrameContentAction` |
| `Image/` | `Merge`, `SvgExistsAction` |
| `Ffmpeg/` | `ResolveMediaExporterAction` |
| `Stream/` | `StreamVideoAction`, `SubtitleService` |
| `Subtitle/` | gestione sottotitoli |
| `CloudFront/` | `GetCloudFrontSignedUrlAction` |
| `S3/` | upload e gestione bucket |
| `TemporaryUpload/` | `GenerateTemporaryUploadPathAction` e ciclo di vita |
| `Diagnostic/` | diagnostica ambiente ffmpeg/disk |
| root | `AttachMediaAction`, `SaveAttachmentsAction`, `GetAttachmentsSchemaAction` |

### Models (`app/Models/`)

`Media`, `MediaConvert`, `TemporaryUpload` — tutti da `BaseModel`.

### Filament 5

- **Resources**: `MediaResource`, `MediaConvertResource`, `TemporaryUploadResource`, `HasMediaResource`
- **Extra**: `Clusters/`, `RelationManagers/`, `Infolists/`, `Actions/`, `Tables/`
- **Livewire**: nessun controller residuo — i Conversion manager sono il target widget

## Pattern del Modulo

- Un path di storage non è mai hardcoded: passa da `PathGeneratorContract`
- `MediaConvert` è asincrono: la conversione parte e il record si aggiorna via queue
- Streaming via URL firmato CloudFront, mai file pubblico esposto
- `TemporaryUpload` precede l'attach: cycle separato, cleanup a parte
- Conversione immagini con `intervention/image`, video con `pbmedia/laravel-ffmpeg` `^8.5`

## Verifica

```bash
cd laravel

php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Media
./vendor/bin/pest Modules/Media
./vendor/bin/pint
```

## Quick Flow

```bash
bmad-quick-dev "Aggiungi thumbnail alla tabella media"
bmad-quick-spec "Specifica retention dei temporary upload"
```

---

*Media · BMAD Quick Reference · data 2026-09-29*
>>>>>>> .merge_file_WK5iXE
