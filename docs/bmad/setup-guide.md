---
<<<<<<< .merge_file_yNyBh4
title: "Media — setup guide"
type: note
tags: [media, setup, environment, aws, ffmpeg, s3, cloudfront]
created: 2026-09-28
updated: 2026-09-28
qmd: "Media setup ambiente ffmpeg s3 cloudfront dipendenze"
related:
  - ./README.md
  - ./quick-reference.md
  - ./architecture/module-boundary.md
  - ../composer.json
  - ../config/config.php
---

# Media — setup guide

> **SUMMARY**: guida per configurare l'ambiente di sviluppo del modulo
> `Modules\Media`. Copre composer, config, dipendenze esterne (FFmpeg, S3,
> CloudFront), migrazioni e verifica della connessione. Derivato da
> `composer.json`, `module.json`, `config/config.php` e `app/Actions/Diagnostic/`.

## Prerequisiti

| Requisito | Versione | Verifica |
|---|---|---|
| PHP | ^8.2 | `php -v` |
| FFmpeg | presente | `ffmpeg -version` |
| AWS CLI | presente | `aws --version` |
| Connessione S3 | configurata | vedi diagnostica |

## Installazione dipendenze

Da `laravel/`:

```bash
composer install
```

Dipendenze del modulo (`composer.json`):

- `pbmedia/laravel-ffmpeg` ^8.5 → `app/Actions/Ffmpeg/ResolveMediaExporterAction.php`
- `intervention/image` * → `app/Actions/Image/`
- `spatie/laravel-medialibrary` → modello `app/Models/Media.php:13`

## Configurazione

1. `.env` con variabili S3/CloudFront (rileate da
   `app/Actions/Diagnostic/Aws/GetAwsConfigSnapshotAction.php`)
2. `config/media.php` (se presente) o `config/config.php`:
   - icona: `heroicon-o-photo` (`config/config.php:6`)
   - navigazione abilitata (`config/config.php:7-9`)
   - route con middleware `['web', 'auth']` (`config/config.php:10-12`)
3. Registra i provider in `module.json`:
   - `Modules\Media\Providers\MediaServiceProvider`
   - `Modules\Media\Providers\Filament\AdminPanelProvider`

## Migrazioni

Da `laravel/` (forward-only, mai `migrate:fresh`):

```bash
php artisan module:migrate Media
```

Migrazioni in `database/migrations/`:

| File | Tabella |
|---|---|
| `2022_01_01_000000_create_media_converts_table.php` | `media_converts` |
| `2022_01_01_000011_create_medias_table.php` | `media` |
| `2023_01_01_000000_create_temporary_uploads_table.php` | `temporary_uploads` |

## Diagnostica ambiente

Eseguire prima di ogni lavoro:

| Action | File | Verifica |
|---|---|---|
| `TestS3ConnectionAction` | `app/Actions/Diagnostic/Aws/TestS3ConnectionAction.php` | connessione S3 |
| `TestCredentialsAction` | `app/Actions/Diagnostic/S3/TestCredentialsAction.php` | credenziali AWS |
| `TestCloudFrontConfigAction` | `app/Actions/Diagnostic/Aws/TestCloudFrontConfigAction.php` | CloudFront |
| `RunFullAwsDiagnosticAction` | `app/Actions/Diagnostic/Aws/RunFullAwsDiagnosticAction.php` | diagnostica completa |

## Verifica ambiente

```bash
# PHPStan su questo modulo solo
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Media
# Pest
./vendor/bin/pest Modules/Media
```

## Vedi anche

- [README](./README.md)
- [Quick reference](./quick-reference.md)
- [Architettura — module boundary](./architecture/module-boundary.md)
- [Epic roadmap](./epics/module-roadmap.md)
=======
title: "Media — BMAD Setup Guide"
description: "Setup e configurazione BMAD per il modulo Media"
module: "Media"
alias: "media"
documentation_date: "2026-09-29"
bmad_version: "6.2.0"
---

# Media — BMAD Setup Guide

## Scopo

Rendere ripetibile e verificabile l'uso del BMAD Method per il modulo Media.

## Passi di Setup

```bash
# 1. Dipendenze (da laravel/)
composer install

# 2. Storage
#    filesystem: local, s3 (via env)
#    link simbolico pubblico: php artisan storage:link

# 3. FFmpeg
ffmpeg -version          # binario di sistema richiesto
export FFMPEG_PATH=/usr/bin/ffmpeg

# 4. Conversione
php artisan media:convert-video {disk} {file}

# 5. Provider (da composer.json extra.laravel.providers)
#    Modules\Media\Providers\MediaServiceProvider
#    Modules\Media\Providers\RouteServiceProvider
#    Modules\Media\Providers\Filament\AdminPanelProvider

# 6. Cache e asset
composer clear
composer fix-storage
```

Dipendenze runtime: `pbmedia/laravel-ffmpeg` `^8.5`, `intervention/image`, PHP `^8.2`.

> **Dati sacri**: mai `migrate:fresh`, mai `--force`, mai `RefreshDatabase`.
> Solo migrate additivi. Su host `10.100.200.15` non si lanciano test Pest.

## Cosa è "BMAD" qui (Business Logic)

In questo modulo, BMAD serve a:
- **Garantire la riproducibilità**: la conversione video è asincrona e deve poter essere ritentata
- **Tracciare ogni decisione**: path, disk, formato di uscita sono scelte documentate
- **Supportare il code review**: ogni Action tocca un solo dominio (Video, Image, Stream, …)
- **Governare la sicurezza**: nessun file pubblico oltre ai link firmati

## Best Practices (Pratiche Giuste)

- Documentare prima di implementare: PRD prima di codice
- Estendere XotBase: modelli da `BaseModel`
- Actions, non Services: un dominio per cartella sotto `Actions/`
- PHPStan Level max: nessun `ignoreErrors`
- Traduzioni dai file: mai label hardcoded
- Array PHP: una chiave per riga
- Tipizzare su `PathGeneratorContract`, mai sulla classe concreta

## Bad Practices (Pratiche Sbagliate — Mai Fare)

- Mai estendere Filament direttamente
- Mai silenziare PHPStan
- Mai hardcode label
- Mai creare Services
- Mai modificare `phpstan.neon`
- Mai hardcodare un path di storage
- Mai esporre file su disco pubblico: usare signed URL

## False Friends (Falsi Amici)

| Termine | Sembra Significare | In Realtà Significa |
|---|---|---|
| **Media** | File generico | Record con metadati, path e relazione al modello host |
| **MediaConvert** | Conversione | Coda/processo di conversione con stato, non il risultato |
| **TemporaryUpload** | Upload definitivo | File orfano in attesa di attach, con cleanup |
| **PathGenerator** | Generico | Implementazione di `PathGeneratorContract` |
| **Service** | Servizio generico | **Vietato** in Xot — usare `Actions` |

## Struttura Directory (Canonical)

- **`app/Actions/`**: `Image/`, `Video/`, `Ffmpeg/`, `Stream/`, `Subtitle/`, `S3/`,
  `CloudFront/`, `TemporaryUpload/`, `Diagnostic/` + 3 Action root
- **`app/Contracts/`**: `PathGenerator`, `PathGeneratorContract`
- **`app/Enums/AttachmentTypeEnum.php`**: `image` / `video` / `document` / `manual`
- **`app/Models/`**: `Media`, `MediaConvert`, `TemporaryUpload`
- **`app/Filament/`**: 4 Resource + `Clusters/`, `RelationManagers/`, `Infolists/`
- **`app/Conversions/`**: generatori immagine/video (i `conversions/` in minuscolo sono residui)
- **`app/Support/Ffmpeg/`, `app/Exceptions/`**: supporto runtime
- **`docs/bmad/`**: questa documentazione

---

*Media · BMAD Setup Guide · data 2026-09-29*
>>>>>>> .merge_file_W2hGip
