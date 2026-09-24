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
- [Architettura](./docs/architecture.md) · [Pattern](./docs/patterns.md) · [Troubleshooting](./docs/troubleshooting.md)
- [FFmpeg](./docs/ffmpeg-usage.md) · [Performance](./docs/PERFORMANCE-OPTIMIZATION.md) · [Migrazioni](./docs/MIGRATIONS.md) · [Testing](./docs/testing-guidelines.md)
- [Changelog](./CHANGELOG.md) · [Semantic release config](./.releaserc.json)
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Qualità e manutenzione

Maintain `declare(strict_types=1);` in PHP, adhere to project PHPStan config, and update docs when contracts evolve.

---

**Modulo** `media` · **Laraxot ecosystem** · **Project-agnostic**
