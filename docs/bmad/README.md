<<<<<<< HEAD
# Modulo Media — Documentazione Bridge

Documentazione canonica per il modulo Media: gestione multimediale (immagini, video, documenti, audio) in Laraxot.

## File Canonici

1. **[README.md](README.md)** — questo file, punto di ingresso
2. **[architecture.md](architecture.md)** — architettura, namespace, dipendenze, struttura, funzionalità
3. **[index.md](index.md)** — bridge per discovery (legacy)

## Scopo Modulo

- Memorizzazione, elaborazione, distribuzione file multimediali
- Supporto multi-format (immagini, video, documenti, audio)
- Integrazione CDN e streaming video
- Isolamento tenant
- Conversione automatica (FFmpeg, immagini)

## Linkage

- Dipende da: Xot (base), Tenant, User, UI
- Utilizzato da: temi e moduli applicativi
- Standard di documentazione: vedi `/docs/` root

Per dettagli architetturali, vedi **architecture.md**.
=======
<<<<<<< .merge_file_bKomSY
<<<<<<< .merge_file_ovm4Zu
---
title: "Media — BMAD"
type: note
tags: [bmad, index, architecture, media, ffmpeg]
created: 2026-09-28
updated: 2026-09-28
qmd: "Media BMAD indice documentazione modulo architettura"
related:
  - ./architecture.md
  - ./brainstorming.md
  - ./epics/module-roadmap.md
  - ./quick-reference.md
  - ./setup-guide.md
  - ./architecture/module-boundary.md
  - ./brainstorming/module-opportunities.md
---

# Media — BMAD

> **SUMMARY**: indice dei documenti BMAD per il modulo `Modules\Media`
> (`laravel/Modules/Media/`), con collegamenti verificati a shard, epiche,
> story e guide esistenti. Vedi `laravel/Modules/Xot/docs/bmad-method.md` per
> il metodo BMAD usato nel progetto Laraxot.

## Namespace e providers

- Namespace principale: `Modules\Media`
- Providers dichiarati in `module.json`:
  - `Modules\Media\Providers\MediaServiceProvider`
  - `Modules\Media\Providers\Filament\AdminPanelProvider`
- Estende `Modules\Xot\Models\XotBaseModel` (in `app/Models/BaseModel.php`)

## Documenti canonici BMAD

| Documento | Stato | Note |
|---|---|---|
| [README.md](./README.md) | indice | questo file |
| [architecture.md](./architecture.md) | indice root | punta a `architecture/module-boundary.md` |
| [brainstorming.md](./brainstorming.md) | indice root | punta a `brainstorming/module-opportunities.md` |
| [epics/module-roadmap.md](./epics/module-roadmap.md) | epic roadmap | Epica A/B/C/D con DoD |
| [epics/architecture-boundary.epic.md](./epics/architecture-boundary.epic.md) | epic | archivio contratto e dipendenze |
| [quick-reference.md](./quick-reference.md) | note | comandi, path, pattern rapidi |
| [setup-guide.md](./setup-guide.md) | note | ambiente di sviluppo |

## Shard architettura

- [architecture/module-boundary.md](./architecture/module-boundary.md) —
  inventario `app/` (126 PHP), `tests/` (56), aree e confini verificati.

## Shard brainstorming

- [brainstorming/module-opportunities.md](./brainstorming/module-opportunities.md) —
  domande ad alto valore, ipotesi, rischi.

## Epic

- [epics/module-roadmap.md](./epics/module-roadmap.md) — roadmap epica A/B/C/D.
- [epics/architecture-boundary.epic.md](./epics/architecture-boundary.epic.md) —
  epic concreta sucontratto API pubblica e dipendenze (`module.json`,
  `composer.json`, `app/Contracts`).

## Stories esistenti

- [stories/module-bmad-audit-20260928.story.md](./stories/module-bmad-audit-20260928.story.md)
- [stories/git-status-fleet-merge-markers-media.story.md](./stories/git-status-fleet-merge-markers-media.story.md)
- [stories/quality-gates-phpstan-swarm-2026-09-23.story.md](./stories/quality-gates-phpstan-swarm-2026-09-23.story.md)
- [stories/cleanup-media-2026-09-22.story.md](./stories/cleanup-media-2026-09-22.story.md)
- [stories/readme-changelog-conflict-markers.story.md](./stories/readme-changelog-conflict-markers.story.md)

## Struttura moduliare (file -> responsabilità)

| Area | Path | Responsabilità |
|---|---|---|
| Config | `config/config.php` | icona, navigazione, provider, route |
| Model | `app/Models/Media.php` | estende `SpatieMedia`, rel. `mediaConverts`, `temporaryUpload` |
| Model | `app/Models/MediaConvert.php` | conversioni video/immagine, tabella `media_converts` |
| Model | `app/Models/TemporaryUpload.php` | upload temporanei, interfaccia `HasMedia` |
| Model | `app/Models/BaseModel.php` | base con connessione `media` |
| Resource | `app/Filament/Resources/MediaResource` | gestione media (form, infolist, table) |
| Resource | `app/Filament/Resources/MediaConvertResource` | gestione conversioni |
| Resource | `app/Filament/Resources/TemporaryUploadResource` | gestione upload temporanei |
| Resource | `app/Filament/Resources/HasMediaResource` | trait per modelli con media |
| Console | `app/Console/Commands/ConvertVideoCommand.php` | comando conversione video |
| Action | `app/Actions/ConvertVideoAction.php` | orchestrazione conversione video |
| Action | `app/Actions/AttachMediaAction.php` | allega media a model |
| Action | `app/Actions/S3/` | operazioni S3 (upload, delete, check) |
| Action | `app/Actions/CloudFront/` | URL firmate CloudFront |
| Action | `app/Actions/Diagnostic/` | diagnostica AWS/S3/CloudFront |
| Action | `app/Actions/Subtitle/` | sottotitoli (SRT→VTT, XML, estrai testo) |
| Action | `app/Actions/Ffmpeg/` | risoluzione exporter FFmpeg |
| Enum | `app/Enums/AttachmentTypeEnum.php` | tipo allegato |
| Services | `app/Services/SubtitleService.php` | streaming sottotitoli |
| Services | `app/Services/VideoStream.php` | streaming video |
| Contracts | `app/Contracts/PathGeneratorContract.php` | interfaccia path generator |
| Contracts | `app/Contracts/PathGenerator.php` | interfaccia path generator |
| Migrations | `database/migrations/` | 6 migration (media_converts, medias, temporary_uploads) |
| Lang | `lang/en/`, `lang/it/`, `lang/de/` | chiavi: `media`, `media_convert`, `temporary_upload`, `attachment` |
| Test | `tests/` | 56 file (Unit + Feature + Filament) |

## Dipendenze esterne (da `composer.json`)

- `spatie/laravel-medialibrary` (SpatieMedia) — gestione media
- `pbmedia/laravel-ffmpeg` — conversione video
- `intervention/image` — elaborazione immagini

## Vedi anche

- [BMAD method (Xot)](../../Xot/docs/bmad-method.md)
- [Story 5.249 — BMAD docs fleet](../Xot/docs/bmad/stories/5.249-bmad-docs-fleet-completion.story.md)
=======
=======
>>>>>>> .merge_file_GoLw13
# Media Module

Modulo del sistema PTVX per la gestione delle risorse umane e valutazione delle performance nelle pubbliche amministrazioni.

## Descrizione

Il modulo Media si occupa di [DESCRIZIONE DA COMPLETARE].

## Dipendenze

- Xot (core)
- User (gestione utenti)
- Lang (internazionalizzazione)

## Come contribuire

1. Fork del repository
2. Creare un branch per la feature/fix
3. Seguire le convenzioni di codifica (PSR-12, array una chiave per riga)
4. Eseguire i test: 
5. Aprire una pull request

## Struttura

- `app/`: Codice sorgente (azioni, risorse, widget, ecc.)
- `database/`: Migrazioni e seeders
- `resources/`: Viste, lang, assets
- `docs/`: Documentazione (questo file)
- `tests/`: Test unitari e di integrazione

## Licenza

Proprietario - Laraxot
<<<<<<< .merge_file_bKomSY
>>>>>>> .merge_file_MJDPz2
=======
>>>>>>> .merge_file_GoLw13
>>>>>>> laraxot/dev
