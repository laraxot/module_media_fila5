---
created: 2026-09-26
updated: 2026-10-07
qmd: "INDEX"
issues: []
discussions: []
title: "Documentation Index - Media Module"
module: "Media"
type: documentation
tags: [index, navigation]
last_updated: 2026-10-07
---

# Documentation Index - Media Module

**Last updated:** 2026-10-07  
**Module Status:** ✅ PHPStan Level 10 Compliant

## Quick Navigation

- **[Overview & README](./README.md)** — Use cases, features, dependencies
- **[Architecture](./ARCHITECTURE.md)** — System design and core patterns
- **[API integration](./api-integration.md)** - Actions, Models, Contracts
- **[FFmpeg usage](./ffmpeg-usage.md)** - FFmpeg, Intervention Image, Storage
- **[BMAD stories](#story-bmad)** - Development workflow, open followups

---

## Module Content Overview

| Category | Count | Notes |
|----------|-------|-------|
| **Actions** | 49 | File upload, processing, S3, FFmpeg, video/image transforms |
| **Models** | 8 | Media, MediaConvert, TemporaryUpload, BaseModel |
| **Controllers** | 2 | HTTP request handling |
| **Migrations** | 3 | Database schema (medias, media_converts, temporary_uploads) |
| **Filament Resources** | 30 | Admin UI components, tables, forms |
| **Services** | 2 | SubtitleService, VideoStream utilities |
| **Conversions** | 2 | ImageGenerators, VideoGenerators |
| **Contracts** | 2 | PathGeneratorContract, custom interfaces |
| **Commands** | 1 | Artisan console commands |
| **Data Objects** | 4 | AttachmentToSaveData, ConvertData, SaveAttachmentsData, CloudFrontData |

**Total:** 101+ PHP classes

---

## Recently Updated Files

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
| [media-services-to-actions](./stories/media-services-to-actions.story.md) | done | residuo verificato: `SubtitleService` ancora duplicato in `Services/` e `Actions/Stream/` |
| [01 PHPStan fix](./stories/01.Media-phpstan-fix.story.md) | done | `method.staticCall` su `Schemas/*Form` e `*Infolist` |

Followups aperti (dettaglio in [02](./stories/02.Media-merge-conflict-resolution.story.md#followups-aperti)):
`ConvertVideoAction` salva due volte; chiavi lang `media::attachments.*` senza file;
`SubtitleService` duplicato; `MediasTable` accanto a `MediaTable`; directory case-variant
residue; placeholder lang (`navigation.icon`, `Missing Label`).

---

## Documentation Categories

### Core Documentation
- [README.md](./README.md) — Module overview, features, use cases
- [ARCHITECTURE.md](./ARCHITECTURE.md) — System design, component structure
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