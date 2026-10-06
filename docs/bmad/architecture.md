<<<<<<< HEAD
---
title: "Architettura - Modulo Media"
module: "Media"
type: architecture
tags: [architecture, structure]
created: 2026-07-14
updated: 2026-08-04
---

# Architettura Modulo Media

## Panoramica

Il modulo Media gestisce la memorizzazione, elaborazione e distribuzione di file multimediali (immagini, video, documenti, audio) all'interno dell'applicazione Laravel Laraxot.

## Informazioni Generali

- **Namespace principale**: `Modules\Media`
- **Pacchetto Composer**: `laraxot/module_media_fila5`
- **Dipendenze principali**:
  - `php ^8.2`
  - `pbmedia/laravel-ffmpeg ^8.5` (conversione video)
  - `intervention/image *` (manipolazione immagini)
  - `Modules\Xot` (base framework)
  - `Modules\Tenant` (multi-tenancy)
  - `Modules\User` (autenticazione)

## Struttura PSR-4

```json
{
  "autoload": {
    "psr-4": {
      "Modules\\Media\\": "app/",
      "Modules\\Media\\Database\\Factories\\": "database/factories/",
      "Modules\\Media\\Database\\Seeders\\": "database/seeders/"
    }
  },
  "autoload-dev": {
    "psr-4": {
      "Modules\\Media\\Tests\\": "tests/"
    }
  }
}
```

## Architettura Logica

### Directory Principali

- **`app/`** - Codice applicativo
  - `Actions/` - QueueableActions per operazioni media (immagini, video)
  - `Models/` - Modelli Eloquent (Media, MediaConvert, TemporaryUpload, etc.)
  - `Contracts/` - Interfacce e contratti
  - `Conversions/` - Generatori di conversioni (immagini, video)
  - `Datas/` - Spatie Laravel Data DTOs
  - `Enums/` - Enumerazioni (tipi media, stati conversione)
  - `Filament/` - Componenti Filament (Resources, Pages, Actions)
  - `Http/` - Controllers, middleware, requests, Livewire components
  - `Services/` - Servizi (legacy, preferire Actions)
  - `Providers/` - Service Providers

- **`database/`** - Migrazioni e factories
  - `migrations/` - Migrazioni database (XotBaseMigration)
  - `factories/` - Factories per testing

- **`resources/`** - Assets frontend
  - `views/` - Blade templates
  - `assets/` - JS/SASS

- **`lang/`** - Traduzioni (es. `lang/it/`)

- **`tests/`** - Test suite (Pest)
  - `Feature/` - Test funzionali
  - `Unit/` - Test unitari

- **`config/`** - File di configurazione

- **`docs/`** - Documentazione (canonical bridge)

## Dipendenze dai Moduli Xot

Gerarchicamente il modulo Media dipende da:
- **Xot** (6+ utilizzi di `XotBaseMigration`, base Filament resources)
- **Tenant** (multi-tenancy)
- **User** (autenticazione)
- **UI** (componenti UI comuni)

## Funzionalità Principali

### Gestione File
- Upload di file multipli (drag-and-drop)
- Supporto multi-format (immagini, video, documenti, audio)
- Memorizzazione con isolamento tenant

### Elaborazione Media
- Ottimizzazione e compressione immagini
- Conversione video (FFmpeg)
- Generazione automatica di versioni (thumbnail, preview)
- Watermark automatico

### Streaming Video
- Streaming ottimizzato con supporto HLS/DASH
- Gestione sottotitoli

### Integrazione CDN
- Supporto per Content Delivery Network
- URL pubblico e privato

## Convenzioni

### Naming
- Modelli: singolare (Media, MediaConvert, TemporaryUpload)
- Actions: `{Verb}{Noun}Action` (es. `ConvertVideoAction`)
- Namespaces: Modules\Media\{Domain}\{Component}

### Testing
- Pest framework (no PHPUnit diretto)
- No `RefreshDatabase` - usare database dedicated `.env.testing`
- Coverage target: 80%+

## Dependency Injection

Il modulo utilizza l'inversion of control tramite:
- Constructor injection nelle Actions
- Service Provider per binding
- Interfacce nei Contracts per loose coupling

## Stato Corrente

- **Total file PHP**: 97
- **Classi/Interfacce**: 64
- **PHPStan Level**: 10 (strict typing)
- **Test Coverage**: In progress

## Vedere Anche

- README.md - Documentazione di base
- index.md - Bridge indice
- /docs/ root - Standard di documentazione globali

---

<!-- Merged from ARCHITECTURE.md, which collided with this file on case-insensitive filesystems. -->

---
title: "Architecture: Media Module"
type: architecture
tags: [module, architecture, media, storage]
created: 2026-08-04
updated: 2026-08-04
---
# Media Module — Architecture

## Purpose
Media module provides file handling, storage, and processing infrastructure for the Laraxot ecosystem. Manages uploads, transformations, and media metadata.

## Core Components

**Models:**
- `Media` — Primary media model (spatie/laravel-medialibrary)
- `MediaCollections` — Collection definitions
- `MediaItem` — Extended media metadata

**Actions:**
- `UploadMediaAction` — Primary entrypoint for file uploads
- `ProcessMediaAction` — Image/video processing pipeline
- `DeleteMediaAction` — Cleanup associated files

**Filament Resources:**
- `MediaResource` — Browse and manage media library
- `CollectionResource` — Manage media collections

## Database Schema
- `media` table: id, model_type, model_id, collection_name, name, file_name, mime_type, size, url, custom_properties

## Design Decisions
| Decision | Rationale |
|----------|-----------|
| Spatie MediaLibrary | Battle-tested, handles transformations |
| Custom collections | Separate by media type/use case |
| Lazy loading | Optimize performance for large libraries |

## Integration Points
**Depends On:** Xot module (BaseModel), Laravel Storage
**Depended On By:** Activity, Lang, PDF generation

## Quality Gates
- **PHPStan L10**: Pending verification
- **Storage**: Tested with local/S3 drivers
=======
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
>>>>>>> laraxot/dev
