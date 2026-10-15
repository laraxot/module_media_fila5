---
title: "Architettura - Modulo Media"
module: "Media"
type: architecture
tags: [architecture, structure]
created: 2026-07-14
updated: 2026-10-14
status: draft
qmd: "architettura modulo media media"
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
  - `Modules\User`, `Modules\UI`, `Modules\Job` (uso puntuale, conteggi in README.md). `Tenant` compare solo nei `repositories` di `composer.json`: nessun uso in `app/` (verificato 2026-10-14)

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
  - (nessuna `Services/`: `app/Services` non esiste piu', vedi story 2026-10-08 services-to-actions)
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
- **User** (3 usi: modello `User`, test), **UI** (2 usi: `GetAllIconsAction`), **Job** (1 uso: `ClockWidget`)
- Tenant: nessun uso nel codice (verificato 2026-10-14)

## Funzionalità Principali

### Gestione File
- Upload di file multipli (drag-and-drop)
- Supporto multi-format (immagini, video, documenti, audio)
- Memorizzazione sui dischi Laravel (S3 con CloudFront); nessun isolamento per tenant nel codice

### Elaborazione Media
- Ottimizzazione e compressione immagini
- Conversione video (FFmpeg)
- Conversione `preview` per i `TemporaryUpload` (`config('media-library.generate_thumbnails_for_temporary_uploads')`)
- Watermark automatico: non presente nel codice (verificato 2026-10-14)

### Streaming Video
- Streaming: `Actions/Stream/StreamVideoAction`. HLS/DASH: non presenti nel codice (verificato 2026-10-14)
- Sottotitoli: `Actions/Subtitle/*` (SRT in VTT, lettura XML)

### Integrazione CDN
- CloudFront con URL firmati: `Actions/CloudFront/GetCloudFrontSignedUrlAction`, chiavi `filesystems.cloudfront.*` e `services.cloudfront.*`
- Nessun CDN generico oltre a CloudFront

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

- **File PHP in `app/`**: 124 (misurato 2026-10-14; include 2 copie in `app/conversions` per variante di maiuscole e 1 file vuoto sotto `Clusters/` con nome corrotto)
- **PHPStan**: `vendor/bin/phpstan analyse Modules/Media` dalla cartella `laravel/` esce con 0 e nessun errore (2026-10-14)
- **Test Coverage**: In progress

## Vedere Anche

- README.md - Documentazione di base
- index.md - Bridge indice
- /docs/ root - Standard di documentazione globali

---

<!-- Merged from ARCHITECTURE.md, which collided with this file on case-insensitive filesystems. -->

> Nota 2026-10-14: questa sezione, copia di `architecture.md` (marcato `stale`), cita Action, modelli e Resource che non esistono in `app/` (`UploadMediaAction`, `ProcessMediaAction`, `DeleteMediaAction`, `MediaItem`, `CollectionResource`) e consumatori (Activity, Lang) non confermati dal codice. Conservata per storia: usare la parte sopra e il README.md.

# Media Module - Architecture (copia storica di ARCHITECTURE.md)

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
