<<<<<<< .merge_file_C0qWQq
---
id: module-media-readme
title: "Media — File, Immagini, Video e Documenti"
type: module-readme
category: module-documentation
module: Media
status: active
tags: [media, files, images, video, storage]
created: 2026-09-14
updated: 2026-09-14
qmd: "media files images video ffmpeg storage cdn module documentation"
issues:
  - "https://github.com/laraxot/module_media_fila5/issues/57"
discussions:
  - "https://github.com/laraxot/module_media_fila5/discussions/58"
related:
  - "./docs/"
sources: []
=======
<<<<<<< HEAD
# Media Module — File Storage & Transformation

[![PHP](https://img.shields.io/badge/PHP-%5E8.3-777BB4.svg)](composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-13.30-FF2D20.svg)](../../composer.lock)
[![Filament](https://img.shields.io/badge/Filament-5.7-FDAB3D.svg)](../../composer.lock)
[![PHPStan](https://img.shields.io/badge/PHPStan-0%20errori-brightgreen.svg)](../../phpstan.neon)
[![strict_types](https://img.shields.io/badge/declare-strict__types%3D1-informational.svg)](#)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
**Last updated:** 2026-07-28

Complete media management for the Laraxot ecosystem: image optimization, video encoding, FFmpeg integration, and cloud storage (S3/CloudFront).

## Why This Module

- **Unified file handling** — Consistent API for uploads, validation, and storage across all modules
- **FFmpeg integration** — Professional-grade video encoding with automatic quality presets
- **Image optimization** — Intervention Image transforms with smart caching strategy
- **Cloud-native** — Built-in S3/CloudFront support with fallback to local storage
- **Filament admin UI** — Media library, bulk operations, batch processing
- **Battle-tested conventions** — Laraxot best practices embedded from day one

## Scopo e confini

Media custodisce il **percorso di un file**, dall'upload temporaneo alla consegna: dove si
posa, in quale formato si converte, con quale URL si serve. È l'unico dei tre servizi
trasversali che possiede uno schema, e lo possiede bene: 3 modelli, 3 migrazioni, una per
modello, tutte sulla connection `media`. Sette moduli lo consumano, quasi sempre per
composizione (`InteractsWithMedia`, `SpatieMediaLibraryFileUpload`) più che per import.

Il confine da non superare: **Media non sa cosa trasporta.** Allegato di scheda, avatar e
video di formazione sono lo stesso oggetto polimorfico; chi può vederli lo decide il
modulo proprietario del `model_type`. Da guardare oggi: `Storage::disk('public_html')` in
`GetVideoFrameContentAction:47` punta a un disco non dichiarato in `filesystems.php` (il
fallback dell'errore è l'errore), `SubtitleService` esiste identico in `app/Services/` e
`app/Actions/Stream/`, e 21 delle 49 Action sono diagnostica AWS.

Scopo esteso, misure e mosse: [docs/scopo.md](docs/scopo.md).

>>>>>>> .merge_file_WhOPsG
---

# 🖼️ Media

> **File, immagini, video e documenti.**

Upload, storage, trasformazioni e distribuzione media locale o cloud.

## Cosa offre

- **Upload** – carico sicuro di file
- **Immagini** – gestione dimensioni e formati
- **Video/FFmpeg** – transcodifica e processing
- **S3/CDN** – distribuzione e caching

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
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Qualità e manutenzione

Maintain `declare(strict_types=1);` in PHP, adhere to project PHPStan config, and update docs when contracts evolve.

---

<<<<<<< .merge_file_C0qWQq
**Modulo** `media` · **Laraxot ecosystem** · **Project-agnostic**
=======
## Scopo del modulo

Perche' esiste, come raggiungere meglio il suo scopo e cosa **non** gli appartiene:
[`docs/purpose.md`](./docs/purpose.md).
**Quick links:** [Index](./docs/index.md) | [Patterns](./docs/PATTERNS.md) | [Troubleshooting](./docs/troubleshooting.md) | [Contributing](./docs/CONTRIBUTING.md)
=======
---
id: module-media-readme
title: "Media — File, Immagini, Video e Documenti"
type: module-readme
category: module-documentation
module: Media
status: active
tags: [media, files, images, video, storage]
created: 2026-09-14
updated: 2026-09-14
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
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Qualità e manutenzione

Maintain `declare(strict_types=1);` in PHP, adhere to project PHPStan config, and update docs when contracts evolve.

---

**Modulo** `media` · **Laraxot ecosystem** · **Project-agnostic**
>>>>>>> laraxot/dev
>>>>>>> .merge_file_WhOPsG
