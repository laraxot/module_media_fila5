---
id: module-media-readme
title: "Media — File, Immagini, Video e Documenti"
type: module-readme
category: module-documentation
module: Media
status: active
tags: [media, files, images, video, storage]
created: 2026-09-14
<<<<<<< HEAD
updated: 2026-09-14
=======
updated: 2026-09-28
>>>>>>> laraxot/dev
qmd: "media files images video ffmpeg storage cdn module documentation"
issues:
  - "https://github.com/laraxot/module_media_fila5/issues/57"
discussions:
  - "https://github.com/laraxot/module_media_fila5/discussions/58"
related:
  - "./docs/"
sources: []
---

# 🖼️ Media

> **File, immagini, video e documenti.**

Upload, storage, trasformazioni e distribuzione media locale o cloud.

## Cosa offre

- **Upload** – carico sicuro di file
- **Immagini** – gestione dimensioni e formati
- **Video/FFmpeg** – transcodifica e processing
- **S3/CDN** – distribuzione e caching

<<<<<<< HEAD
=======
<<<<<<< .merge_file_Aw7Iuk
<<<<<<< .merge_file_HjRo7a
## Funzionalità chiave

### Upload & storage
- Upload temporanei con tracciamento di sessione
- Validazione automatica (MIME type, dimensione, estensioni)
- Supporto multi-disk (local, S3, Minio, CloudFront)
- Operazioni di attach atomiche

### Elaborazione immagini
- Trasformazioni Intervention Image (resize, crop, optimize)
- Conversione formato (WebP, fallback AVIF)
- Generazione thumbnail
- Preservazione e sanitizzazione dati EXIF

### Video
- Pipeline di conversione FFmpeg (MP4, WebM, HLS)
- Generazione ed embedding sottotitoli
- Estrazione frame per thumbnail

### Cloud
- Supporto nativo AWS S3, URL firmati CloudFront per contenuti privati
- Compatibilità Minio per deployment self-hosted

## Dipendenze

- `pbmedia/laravel-ffmpeg` e `intervention/image` (vedi `composer.json` per i vincoli correnti)
- Pacchetti di sistema: `ffmpeg`, `imagemagick` o `gd`

=======
>>>>>>> .merge_file_Su0kLD
=======
>>>>>>> .merge_file_GKhRUC
>>>>>>> laraxot/dev
## Confini architetturali

This module publishes contracts usable by other modules. Logic lives in `Actions`; admin UI follows Laraxot/XotBase.

## Integrazione rapida

```bash
cd laravel
php artisan module:list
./vendor/bin/phpstan analyse Modules/Media
```

See local docs for integration patterns.

## Documentazione

The technical map is in [docs/README.md](./docs/README.md).

- [Story BMAD del modulo](./docs/stories/)
<<<<<<< HEAD
=======
<<<<<<< .merge_file_Aw7Iuk
<<<<<<< .merge_file_HjRo7a

- [Architettura](./docs/architecture.md) · [Pattern](./docs/patterns.md) · [Troubleshooting](./docs/troubleshooting.md)
- [FFmpeg](./docs/ffmpeg-usage.md) · [Performance](./docs/PERFORMANCE-OPTIMIZATION.md) · [Migrazioni](./docs/MIGRATIONS.md) · [Testing](./docs/testing-guidelines.md)
- [Changelog](./CHANGELOG.md) · [Semantic release config](./.releaserc.json)

=======
>>>>>>> .merge_file_Su0kLD
=======
>>>>>>> .merge_file_GKhRUC
>>>>>>> laraxot/dev
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Qualità e manutenzione

Maintain `declare(strict_types=1);` in PHP, adhere to project PHPStan config, and update docs when contracts evolve.

---

**Modulo** `media` · **Laraxot ecosystem** · **Project-agnostic**
<<<<<<< HEAD
=======
<<<<<<< .merge_file_Aw7Iuk
<<<<<<< .merge_file_HjRo7a

>>>>>>> laraxot/dev
---
# Media Module — File Storage & Transformation

**Last updated:** 2026-07-28

Complete media management for the Laraxot ecosystem: image optimization, video encoding, FFmpeg integration, and cloud storage (S3/CloudFront).

## Why This Module

- **Unified file handling** — Consistent API for uploads, validation, and storage across all modules
- **FFmpeg integration** — Professional-grade video encoding with automatic quality presets
- **Image optimization** — Intervention Image transforms with smart caching strategy
- **Cloud-native** — Built-in S3/CloudFront support with fallback to local storage
- **Filament admin UI** — Media library, bulk operations, batch processing
- **Battle-tested conventions** — Laraxot best practices embedded from day one

## Key Features

### File Upload & Storage
- Temporary upload handling with session tracking
- Automatic validation (MIME type, size, extensions)
- Multiple disk support (local, S3, Minio, CloudFront)
- Atomic attachment operations

### Image Processing
- Intervention Image transforms (resize, crop, optimize)
- Automatic format conversion (WebP, AVIF fallback)
- Smart thumbnail generation
- EXIF data preservation & sanitization

### Video Encoding
- FFmpeg conversion pipeline (MP4, WebM, HLS)
- Subtitle generation & embedding
- Frame extraction for thumbnails
- Adaptive bitrate streaming preparation

### Cloud Integration
- AWS S3 native support
- CloudFront URL signing for private content
- Minio compatibility for self-hosted deployments
- Automatic CDN invalidation

## Dependencies

**Composer packages:**
- `pbmedia/laravel-ffmpeg:^8.7` — Video processing
- `intervention/image:^3.0` — Image transformation
- `laravel/framework:^11.0` — Laravel framework
- `spatie/laravel-queueable-action` — Async actions

**System packages (required):**
- `ffmpeg` — Video encoding engine
- `imagemagick` or `gd` — Image processing library

## Documentation

**Start here:**
1. [Documentation Index](./docs/INDEX.md) — Navigation & file guide
2. [Architecture](./docs/ARCHITECTURE.md) — System design & patterns
3. [Patterns & Best Practices](./docs/PATTERNS.md) — Common patterns & anti-patterns
4. [Troubleshooting](./docs/TROUBLESHOOTING.md) — Error resolution

**Deep dives:**
- [API Documentation](./docs/API.md) — Action signatures & contracts
- [FFmpeg Integration](./docs/ffmpeg-usage.md) — Video encoding guide
- [Components](./docs/COMPONENTS.md) — Intervention Image, Storage strategies

**Operations:**
- [Performance Optimization](./docs/PERFORMANCE-OPTIMIZATION.md) — Tuning guide
- [Migration Guide](./docs/MIGRATIONS.md) — Database upgrades
- [Testing Guidelines](./docs/testing-guidelines.md) — Test strategies

## Release & Automation

- **Semantic Release:** [Workflow](./.github/workflows/semantic-release.yml)
- **Configuration:** [.releaserc.json](./.releaserc.json)
- **Changelog:** [CHANGELOG.md](./CHANGELOG.md)

## Philosophy

**Scopo prima del codice** — Every class serves a specific use case.  
**DRY prima dell'orgoglio** — Reuse patterns established in Laraxot.  
**KISS prima dell'astrazione** — Simple, verifiable code over clever frameworks.

---

**Quick links:** [Index](./docs/INDEX.md) | [Patterns](./docs/PATTERNS.md) | [Troubleshooting](./docs/TROUBLESHOOTING.md) | [Contributing](./docs/CONTRIBUTING.md)
<<<<<<< HEAD
=======
---

## Scheda tecnica verificata (2026-09-28)

| Voce | Valore |
|---|---|
| Nome dichiarato | `Media` |
| Namespace | `Modules\\Media\\` |
| File PHP (escluso vendor) | 263 |
| File PHP di test | 56 |
| Aree `app/` rilevate | Actions, Console, Contracts, Conversions, Datas, Enums, Exceptions, Filament, Http, Models, Providers, Rules, Services, Support, View, conversions |
| Migrazioni PHP | 13 |
| SSoT locale | [`docs/`](docs/) e [`docs/bmad/`](docs/bmad/) |

Questa scheda è un inventario statico, non una dichiarazione di qualità. Per ogni
modifica eseguire i gate dal progetto Laravel:

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Media
./vendor/bin/pest Modules/Media
```

La responsabilità del modulo, le decisioni architetturali e le opportunità sono
documentate negli artefatti BMAD sotto [`docs/bmad/`](docs/bmad/). I numeri vanno
rigenerati quando il modulo cambia; non copiarli in badge non verificati.
=======
>>>>>>> .merge_file_Su0kLD
=======
>>>>>>> .merge_file_GKhRUC
>>>>>>> laraxot/dev
