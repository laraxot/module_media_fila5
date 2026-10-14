---
created: 2026-09-26
updated: 2026-10-14
qmd: "INDEX"
issues: []
discussions: []
title: "Documentation Index - Media Module"
module: "Media"
type: documentation
tags: [index, navigation]
last_updated: 2026-10-14
status: draft
---

# Documentation Index - Media Module

**Last updated:** 2026-10-14  
**Module Status:** PHPStan (`vendor/bin/phpstan analyse Modules/Media` da `laravel/`) exit 0, verificato 2026-10-14. Indice canonico: [00-INDEX.md](./00-INDEX.md)

## Quick Navigation

- **[Overview & README](./README.md)** — Use cases, features, dependencies
- **[Architecture](./architecture.md)** - System design and core patterns (`ARCHITECTURE.md` è `stale`)
- **[API integration](./api-integration.md)** - Actions, Models, Contracts
- **[FFmpeg usage](./ffmpeg-usage.md)** - FFmpeg, Intervention Image, Storage
- **[BMAD stories](#story-bmad)** - Development workflow, open followups

---

## Module Content Overview

| Category | Count | Notes |
|----------|-------|-------|
| **Actions** | 49 | File upload, processing, S3, FFmpeg, video/image transforms |
| **Models** | 4 | Media, MediaConvert, TemporaryUpload, BaseModel (più 4 Policy in `Models/Policies`) |
| **Controllers** | 2 | BaseController, ConvertController (nessuna rotta: `routes/*.php` vuoti) |
| **Migrations** | 5 file | 3 modelli (medias, media_converts, temporary_uploads); due file di create per `medias` e due per `temporary_uploads` |
| **Filament** | 41 file PHP | 3 Resource (MediaResource, MediaConvertResource, TemporaryUploadResource) con Pages, Schemas, Tables; HasMediaResource; cluster Test (AwsTest, S3Test); colonne tabella; VideoEntry |
| **Services** | 0 | `app/Services` non esiste (rimosso, story 2026-10-08); sottotitoli e stream sono in `Actions/Subtitle` e `Actions/Stream` |
| **Conversions** | 2 | `ImageGenerators/PowerPoint`, `VideoGenerators/Webm` (più una copia in `app/conversions` per variante di maiuscole) |
| **Contracts** | 2 | PathGeneratorContract, PathGenerator |
| **Commands** | 1 | ConvertVideoCommand (`media:convert-video {disk} {file}`) |
| **Data Objects** | 4 | AttachmentToSaveData, ConvertData, SaveAttachmentsData, CloudFrontData |

**Total:** 124 file PHP in `app/` (misurato 2026-10-14, comprese 2 copie in `app/conversions` e 1 file vuoto sotto `Filament/Clusters/`)

---

## Recently Updated Files (tabella storica, date di luglio 2026, non rigenerata)

| File | Last Modified | Type |
|------|---|------|
| ffmpeg-usage.md | 2026-07-14 | Concept |
| FILE_MANAGEMENT_ARCHITECTURE.md | 2026-07-28 | Architecture |
| PRODUCT_STRATEGY.md | 2026-07-28 | Strategy |
| PRODUCT_ROADMAP.md | 2026-07-28 | Roadmap |
| 00-INDEX.md | 2026-07-14 | Index |
| BAD_PRACTICES.md | 2026-07-28 | Quality |
| MIGRATIONS.md | 2026-07-21 | Reference |
| PRODUCT_LAUNCH_PLAN.md | 2026-07-28 | Launch |
| PERFORMANCE-OPTIMIZATION.md | 2026-07-21 | Performance |
| PROJECT-STRUCTURE.md | 2026-07-21 | Architecture |

---

## Story BMAD

Le story vivono in [`stories/`](./stories/). Le piu' recenti:

| Story | Stato | Note |
|---|---|---|
| [02 Risoluzione dei marker di merge (e7e667b11)](./stories/02.Media-merge-conflict-resolution.story.md) | done | 92 file PHP + 6 file docs; contiene i followups aperti |
| [2026-10-06 PHPStan cleanup](./stories/2026-10-06-phpstan-cleanup-media.story.md) | done | [dev](./stories/2026-10-06-phpstan-cleanup-media.dev.md) |
| [16-4 Consolidamento case-variant](./stories/16-4-media-case-variant-consolidation.md) | ready-for-dev | restano `tests/filament` vs `tests/Filament`, `app/conversions` |
| [2026-10-08 Services -> Actions](./stories/2026-10-08-services-to-actions-media.story.md) | done | `app/Services` rimosso; in `Actions/Stream` resta solo `StreamVideoAction` |
| [2026-10-14 Ingressi docs Media](./stories/2026-10-14-docs-ingressi-media.story.md) | done | README, 00-INDEX, INDEX, architecture verificati sul codice; `ARCHITECTURE.md` marcato stale |
| [media-services-to-actions](./stories/media-services-to-actions.story.md) | done | il residuo `SubtitleService` descritto qui è stato chiuso dalla story del 2026-10-08 (`app/Services` non esiste più) |
| [01 PHPStan fix](./stories/01.Media-phpstan-fix.story.md) | done | `method.staticCall` su `Schemas/*Form` e `*Infolist` |

Followups aperti (dettaglio in [02](./stories/02.Media-merge-conflict-resolution.story.md#followups-aperti)):
`ConvertVideoAction` salva due volte; chiavi lang `media::attachments.*` senza file;
`MediasTable` accanto a `MediaTable` (entrambe in `Filament/Resources/MediaResource/Tables`); directory case-variant
residue; placeholder lang (`navigation.icon`, `Missing Label`).

---

## Documentation Categories

### Core Documentation
- [README.md](./README.md) — Module overview, features, use cases
- [architecture.md](./architecture.md) - System design, component structure (verificata il 2026-10-14)
- [ffmpeg-usage.md](./ffmpeg-usage.md) - FFmpeg, Intervention Image, Cloud Storage

### API & Development
- [api-integration.md](./api-integration.md) - Action signatures, model methods, contracts
- [PATTERNS.md](./PATTERNS.md) — Architectural patterns, best practices
- [bmad/setup-guide.md](./bmad/setup-guide.md) - Environment setup and BMAD conventions
- [bmad/quick-reference.md](./bmad/quick-reference.md) - Quick reference (classes, commands, BMAD)

### Operations & Troubleshooting
- [TROUBLESHOOTING.md](./TROUBLESHOOTING.md) — Error resolution, common issues
- [PERFORMANCE-OPTIMIZATION.md](./PERFORMANCE-OPTIMIZATION.md) — Performance tuning
- [MIGRATIONS.md](./MIGRATIONS.md) — Database schema, upgrades

### Quality & Standards
- [BAD_PRACTICES.md](./BAD_PRACTICES.md) — Anti-patterns to avoid
- [testing-guidelines.md](./testing-guidelines.md) — Unit & integration tests

### Strategy & Planning
- [PRODUCT_STRATEGY.md](./PRODUCT_STRATEGY.md) — Strategic vision
- [PRODUCT_ROADMAP.md](./PRODUCT_ROADMAP.md) — Feature roadmap
- [PRODUCT_LAUNCH_PLAN.md](./PRODUCT_LAUNCH_PLAN.md) — Launch timeline

---

## Quick Start

1. **Read first:** [README.md](./README.md)
2. **Understand patterns:** [PATTERNS.md](./PATTERNS.md)
3. **Use the API:** [api-integration.md](./api-integration.md)
4. **Deploy safely:** [TROUBLESHOOTING.md](./TROUBLESHOOTING.md)

---

## Key External Links

- **[Laravel-FFMpeg Documentation](https://github.com/protonemedia/laravel-ffmpeg)** — Video processing library
- **[Intervention Image](https://image.intervention.io/)** — Image manipulation
- **[AWS S3 Integration](./s3test-corrections.md)** — Cloud storage setup

---

## Dependencies

### Composer Packages
- `pbmedia/laravel-ffmpeg` - Video/audio encoding (constraint in `composer.json`)
- `intervention/image` - Image transformation
- `spatie/laravel-medialibrary` - Media models
- `spatie/laravel-queueable-action` - Queueable actions

### Required System Packages
- `ffmpeg` — Video encoding engine
- `imagemagick` or `gd` — Image processing

---

## Related Modules

- **[Xot](../../Xot/docs/README.md)** — Framework base, HasMedia trait
- **[Cms](../../Cms/docs/README.md)** — Content media integration
- **[UI](../../UI/docs/README.md)** - Admin UI framework

---

**Navigation:** [Home](../README.md) | [BMAD stories](#story-bmad) | [Troubleshooting](./TROUBLESHOOTING.md)