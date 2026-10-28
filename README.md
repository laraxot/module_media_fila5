<<<<<<< HEAD
---
id: module-media-readme
title: "Media - File, Immagini, Video e Documenti"
type: module-readme
category: module-documentation
module: Media
status: active
tags: [media, files, images, video, storage]
created: 2026-09-14
updated: 2026-10-07
qmd: "media files images video ffmpeg storage cdn module documentation"
issues:
  - "https://github.com/laraxot/module_media_fila5/issues/57"
discussions:
  - "https://github.com/laraxot/module_media_fila5/discussions/58"
related:
  - "./docs/"
sources: []
---

# Media
=======
# Media: il modulo che trasforma complessita in vantaggio operativo

Media management module for the Laraxot ecosystem: images, videos, FFmpeg, and Intervention Image.
>>>>>>> ec2b884b (.)

## Perche guardarlo adesso

<<<<<<< HEAD
Upload, storage, trasformazioni e distribuzione media locale o cloud, per l'ecosistema Laraxot.
=======
- Riduce attrito operativo con convenzioni Laraxot gia pronte.
- Porta documentazione, release e changelog nello stesso flusso verificabile.
- Aiuta team e agenti AI a capire subito scopo, confini e prossime mosse.
- E pensato per crescere: semantic versioning, auto release e changelog automatico sono gia configurati.
>>>>>>> ec2b884b (.)

## Cosa promette

<<<<<<< HEAD
- **Upload**: carico sicuro di file, con upload temporanei legati alla sessione
- **Immagini**: gestione dimensioni e formati (Intervention Image)
- **Video/FFmpeg**: transcodifica e processing
- **S3/CDN**: distribuzione e caching, URL firmati CloudFront
- **Filament admin UI**: libreria media, operazioni di massa, diagnostica S3/AWS

## Perche' questo modulo

- **Gestione file unificata**: API coerente per upload, validazione e storage in tutti i moduli
- **Integrazione FFmpeg**: encoding video con preset di qualita'
- **Cloud-native**: supporto S3/CloudFront con ripiego su storage locale
- **Convenzioni Laraxot**: logica nelle `Actions`, UI admin su XotBase

## Funzionalita' chiave

### Upload e storage
- Upload temporanei con tracciamento di sessione
- Validazione automatica (MIME type, dimensione, estensioni)
- Supporto multi-disk (local, S3, Minio, CloudFront)
- Operazioni di attach atomiche
=======
Questo modulo non e solo codice: e una vetrina operativa. Mostra dove intervenire, cosa leggere, come rilasciare e come mantenere alta la confidenza tecnica.

## Release automation

- Workflow: [Semantic Release](./.github/workflows/semantic-release.yml)
- Config: [.releaserc.json](./.releaserc.json)
- Changelog: [CHANGELOG.md](./CHANGELOG.md)
>>>>>>> ec2b884b (.)


<<<<<<< HEAD
### Video
- Pipeline di conversione FFmpeg (MP4, WebM, HLS)
- Generazione ed embedding sottotitoli
- Estrazione frame per thumbnail
- Preparazione dello streaming a bitrate adattivo

### Cloud
- Supporto nativo AWS S3, URL firmati CloudFront per contenuti privati
- Compatibilita' Minio per deployment self-hosted
- Invalidazione CDN automatica

> Elenco delle funzionalita' dichiarate nella documentazione storica. Verificato nel codice
> (2026-10-07): WebM, thumbnail, sottotitoli e URL firmati CloudFront. Non trovati in `app/`:
> HLS, AVIF, invalidazione CDN, bitrate adattivo (da verificare prima di promettere queste voci).
=======
## Documentazione tecnica

- [Indice docs](./docs/README.md) — mappa knowledge base locale (wiki, audit, regole)
>>>>>>> ec2b884b (.)

## Documentazione essenziale

<<<<<<< HEAD
- `pbmedia/laravel-ffmpeg` e `intervention/image` (vedi `composer.json` per i vincoli correnti)
- `spatie/laravel-medialibrary` (model `Media`, `TemporaryUpload`)
- `spatie/laravel-queueable-action` (Actions asincrone)
- Pacchetti di sistema: `ffmpeg`, `imagemagick` o `gd`
=======
- [Second brain locale](./docs/wiki/index.md)
- [Audit ridondanza](./docs/code-redundancy-audit.md)
- [Protocollo confidenza](./docs/agent-confidence-protocol.md)
- [Disciplina agenti](./docs/agent-edit-discipline.md)
- [  Stream](./docs/--stream.md)
- [ Competitors](./docs/-competitors.md)
- [00 Index](./docs/00-INDEX.md)
- [00 Index](./docs/00-index.md)
- [Bad Practices](./docs/BAD_PRACTICES.md)
- [Changelog](./docs/CHANGELOG.md)
>>>>>>> ec2b884b (.)

## Filosofia

<<<<<<< HEAD
Questo modulo pubblica contratti usabili da altri moduli. La logica vive in `Actions`; la UI admin segue Laraxot/XotBase.

## Integrazione rapida

```bash
cd laravel
php artisan module:list
./vendor/bin/phpstan analyse Modules/Media
```

Per i pattern di integrazione vedi la documentazione locale.

## Documentazione

La mappa tecnica e' in [docs/README.md](./docs/README.md); l'indice completo in [docs/INDEX.md](./docs/INDEX.md).

- [Story BMAD del modulo](./docs/stories/)
- [Architettura](./docs/architecture.md) · [Pattern](./docs/patterns.md) · [Troubleshooting](./docs/troubleshooting.md)
- [FFmpeg](./docs/ffmpeg-usage.md) · [Performance](./docs/PERFORMANCE-OPTIMIZATION.md) · [Migrazioni](./docs/MIGRATIONS.md) · [Testing](./docs/testing-guidelines.md)
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Rilascio e automazione

- **Semantic release**: configurazione in [.releaserc.json](./.releaserc.json)
- **Changelog**: [CHANGELOG.md](./CHANGELOG.md)

## Filosofia

- **Scopo prima del codice**: ogni classe serve un caso d'uso specifico.
- **DRY prima dell'orgoglio**: riusare i pattern gia' stabiliti in Laraxot.
- **KISS prima dell'astrazione**: codice semplice e verificabile, non framework astuti.

## Qualita' e manutenzione

Mantenere `declare(strict_types=1);` in PHP, rispettare la configurazione PHPStan del progetto e aggiornare i docs quando i contratti evolvono.

## Scheda tecnica verificata (2026-10-07)

| Voce | Valore |
|---|---|
| Nome dichiarato | `Media` |
| Namespace | `Modules\Media\` |
| File PHP in `app/` | 127 |
| File PHP di test | 46 |
| Aree `app/` rilevate | Actions, Console, Contracts, Conversions, Datas, Enums, Exceptions, Filament, Http, Models, Providers, Rules, Services, Support, View, conversions |
| Migrazioni PHP | 6 |
| SSoT locale | [`docs/`](docs/) e [`docs/bmad/`](docs/bmad/) |

Questa scheda e' un inventario statico, non una dichiarazione di qualita'. Per ogni
modifica eseguire i gate dal progetto Laravel:

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Media
./vendor/bin/pest Modules/Media
```

La responsabilita' del modulo, le decisioni architetturali e le opportunita' sono
documentate negli artefatti BMAD sotto [`docs/bmad/`](docs/bmad/). I numeri vanno
rigenerati quando il modulo cambia; non copiarli in badge non verificati.

---

**Modulo** `media` · **Laraxot ecosystem** · **Project-agnostic**
=======
Scopo prima del codice. DRY prima dell'orgoglio. KISS prima dell'astrazione. La release automatica non sostituisce il giudizio: lo rende tracciabile.
>>>>>>> ec2b884b (.)
