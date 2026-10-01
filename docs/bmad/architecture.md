<<<<<<< .merge_file_aVCoVp
<<<<<<< .merge_file_RqCfVn
---
title: "Media — architecture"
type: architecture
tags: [media, architecture, module-boundary, providers, models, resources]
created: 2026-09-28
updated: 2026-09-28
qmd: "Media architettura componenti modelli risorse provider dipendenze"
related:
  - ./README.md
  - ./architecture/module-boundary.md
  - ./brainstorming.md
  - ./epics/module-roadmap.md
  - ./epics/architecture-boundary.epic.md
---

# Media — architecture

> **SUMMARY**: indice della documentazione architetturale del modulo
> `Modules\Media`. Il dettaglio del confine modulare, inventario `app/`/`tests/`
> e decisioni di progetto sono nei **shard** sottostanti (non sovrascritti).
> Questo file root funge da indice e non duplica il contenuto dei shard.

## Shard architettura

| Shard | Descrizione |
|---|---|
| [architecture/module-boundary.md](./architecture/module-boundary.md) | inventario `app/` (126 PHP), `tests/` (56), aree applicative, confini e decisioni da confermare |

## Provider

Dichiarati in `module.json`:

| Provider | File |
|---|---|
| `MediaServiceProvider` | `app/Providers/MediaServiceProvider.php` |
| `AdminPanelProvider` | `app/Providers/Filament/AdminPanelProvider.php` |

## Modelli

| Modello | File | Estende | Tabella |
|---|---|---|---|
| `Media` | `app/Models/Media.php` | `SpatieMedia` | `media` |
| `MediaConvert` | `app/Models/MediaConvert.php` | `BaseModel` | `media_converts` |
| `TemporaryUpload` | `app/Models/TemporaryUpload.php` | `BaseModel`, `HasMedia` | `temporary_uploads` |
| `BaseModel` | `app/Models/BaseModel.php` | `XotBaseModel` | — |

### Relazioni verificate

| Modello | Relazione | Tipo | Target (`app/Models/`) |
|---|---|---|---|
| `Media` | `mediaConverts()` | `HasMany` | `MediaConvert` |
| `Media` | `temporaryUpload()` | `BelongsTo` | `TemporaryUpload` |
| `Media` | `creator()` | `BelongsTo` | `Modules\User\Models\User` |
| `MediaConvert` | `media()` | `BelongsTo` | `Media` |

## Resource Filament

| Resource | Directory | Schema/Tables |
|---|---|---|
| `MediaResource` | `app/Filament/Resources/MediaResource/` | `Schemas/MediaForm.php`, `Schemas/MediaInfolist.php`, `Tables/MediasTable.php`, `Tables/MediaTable.php` |
| `MediaConvertResource` | `app/Filament/Resources/MediaConvertResource/` | `Schemas/MediaConvertForm.php`, `Schemas/MediaInfolist.php`, `Tables/MediaConvertsTable.php` |
| `TemporaryUploadResource` | `app/Filament/Resources/TemporaryUploadResource/` | `Schemas/TemporaryUploadForm.php`, `Schemas/TemporaryUploadInfolist.php`, `Tables/TemporaryUploadsTable.php` |
| `HasMediaResource` | `app/Filament/Resources/HasMediaResource/` | `Schemas/HasMediaForm.php`, `Schemas/HasMediaInfolist.php`, `Tables/HasMediasTable.php`; `RelationManagers/MediaRelationManager.php` |

## Action principali

| Area | Action | File |
|---|---|---|
| Convert | `ConvertVideoAction` | `app/Actions/Video/ConvertVideoAction.php` |
| Attach | `AttachMediaAction` | `app/Actions/AttachMediaAction.php` |
| Save | `SaveAttachmentsAction` | `app/Actions/SaveAttachmentsAction.php` |
| S3 | `UploadFileAction` | `app/Actions/S3/UploadFileAction.php` |
| S3 | `DeleteFileAction` | `app/Actions/S3/DeleteFileAction.php` |
| CloudFront | `GetCloudFrontSignedUrlAction` | `app/Actions/CloudFront/GetCloudFrontSignedUrlAction.php` |
| FFmpeg | `ResolveMediaExporterAction` | `app/Actions/Ffmpeg/ResolveMediaExporterAction.php` |
| Subtitle | `ConvertSrtToVttAction` | `app/Actions/Subtitle/ConvertSrtToVttAction.php` |
| Diagnostic | `RunFullAwsDiagnosticAction` | `app/Actions/Diagnostic/Aws/RunFullAwsDiagnosticAction.php` |

## Dipendenze esterne

| Dipendenza | Versione | Fonte |
|---|---|---|
| `spatie/laravel-medialibrary` | — | modello `app/Models/Media.php:13` (`SpatieMedia`) |
| `pbmedia/laravel-ffmpeg` | ^8.5 | `composer.json`, `app/Actions/Ffmpeg/` |
| `intervention/image` | * | `composer.json`, `app/Actions/Image/` |

## Persistenza

| Area | Path |
|---|---|
| Migrations | `database/migrations/` (6 file) |
| Factories | `database/factories/` |
| Seeders | `database/seeders/` |

## Test

| Area | Path | Conteggio |
|---|---|---|
| Unit | `tests/Unit/` | ~45 file |
| Feature | `tests/Feature/`, `tests/feature/` | 2 file (duplicati) |
| Filament | `tests/Filament/`, `tests/filament/` | 2 file (duplicati) |
| Fixtures | `tests/Fixtures/` | 3 stub |
| Support | `tests/Support/` | 1 file |
| **Totale** | `tests/` | **56 file** |

## Vedi anche

- [README](./README.md)
- [Brainstorming](./brainstorming.md)
- [Epic roadmap](./epics/module-roadmap.md)
- [Epic architettura](./epics/architecture-boundary.epic.md)
- [Quick reference](./quick-reference.md)
- [Setup guide](./setup-guide.md)
- [BMAD method (Xot)](../../Xot/docs/bmad-method.md)
=======
=======
>>>>>>> .merge_file_aW8Ute
# Architettura del modulo Media

## Overview

[DA COMPLETARE]

## Componenti principali

### Actions
Azioni eseguibili (Queueable Actions) per la logica di business.

### Resources
Risorse Filament per il pannello di amministrazione.

### Widget
Widget Filament per dashboard e pannelli.

### Models
Modelli Eloquent per l'interazione con il database.

### Contracts
Interfacce per l'iniezione di dipendenze.

## Flussi di dati

[DA COMPLETARE]

## Pattern utilizzati

- Action invece di Service
- Filament Widget invece di Livewire
- Array una chiave per riga
- Schema-driven Forms (XotBaseSchemaWidget)
<<<<<<< .merge_file_aVCoVp
>>>>>>> .merge_file_QnukCQ
=======
>>>>>>> .merge_file_aW8Ute
