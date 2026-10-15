---
title: "Media: 00 INDEX (indice operativo canonico)"
type: index
status: active
module: Media
tags: [documentation, index]
created: 2026-09-26
updated: 2026-10-14
qmd: "media 00 INDEX indice canonico directory famiglie radice stories"
issues: []
discussions: []
---

# MEDIA Module - Documentation Index

**Path**: `laravel/Modules/Media/docs/`
**Modulo**: @Modules/Media
**Ultimo aggiornamento**: 2026-10-14

Indice completo per categoria: [INDEX.md](./index.md). Punto di ingresso: [README.md](./README.md).

## Stato verificato (2026-10-14)

- Codice: 124 file PHP in `app/`, 49 Action in `app/Actions`, 3 Resource Filament (`MediaResource`, `MediaConvertResource`, `TemporaryUploadResource`) piu' `HasMediaResource` (schemi e relation manager riusabili), 5 file di migrazione, lang `it`/`en`/`de`, 40 file di test.
- Rotte: `routes/web.php` e `routes/api.php` sono vuoti; esistono 19 rotte del pannello Filament `media/admin` (`php artisan route:list --name=media`).
- PHPStan: `vendor/bin/phpstan analyse Modules/Media` da `laravel/` esce con 0 senza errori.
- Docs: 548 file `.md` (275 nella radice, 94 in `wiki/`, 68 in `bmad/`, 29 in `roadmap/`, 22 in `stories/`). Ingresso: [README.md](./README.md).

## Documenti canonici

Titolo letto, contenuto non verificato riga per riga salvo dove indicato.

| File | Cosa contiene |
|------|---------------|
| [README.md](./README.md) | Scopo, linkage, quick start e limiti, verificati sul codice il 2026-10-14 |
| [architecture.md](./architecture.md) | Architettura del modulo; corretta il 2026-10-14 su Tenant, Services, HLS/DASH, watermark; la seconda metà è una copia di `architecture.md` (stale) |
| [INDEX.md](./index.md) | Panoramica per categoria con conteggi del codice |
| [ffmpeg-usage.md](./ffmpeg-usage.md) | Utilizzo di Laravel-FFMpeg nel modulo |
| [queueable-actions.md](./queueable-actions.md) | Dottrina delle Queueable Action nel modulo |
| [translations.md](./translations.md) | Traduzioni del modulo |
| [testing.md](./testing.md) | Documentazione di testing |
| [MIGRATIONS.md](./migrations.md) | Migrazioni del modulo e parità con i modelli |
| [phpstan-level10-fixes.md](./phpstan-level10-fixes.md) | Correzioni PHPStan livello 10 |
| [decision-log.md](./decision-log.md) | Decisioni locali, voci più recenti in alto |
| [dependency-intelligence.md](./dependency-intelligence.md) | Dipendenze Composer del modulo, da `composer show` del 2026-03-02 (non riallineate) |

Prodotto e pianificazione (nomi dei file in maiuscolo, contenuto di tipo BMAD non verificato): [PRD.md](./prd.md), [PRODUCT_ROADMAP.md](./product-roadmap.md), [PRODUCT_STRATEGY.md](./product-strategy.md), [PRODUCT_LAUNCH_PLAN.md](./product-launch-plan.md), [SPRINT_PLANNING.md](./sprint-planning.md), [USER_RESEARCH.md](./user-research.md).

Da non usare come riferimento: [ARCHITECTURE.md](./architecture.md) (`status: stale`, cita Action e modelli inesistenti) e `00-index.md` (copia per sola differenza di maiuscole di questo file, marcata superseded il 2026-10-14).

## Mappa delle directory

La classificazione è del 2026-10-14; i conteggi sono file `.md` per directory. Nulla è stato spostato o cancellato.

| Ruolo | Directory (file .md) | Note |
|-------|----------------------|------|
| Canonica | `stories/` (22), `wiki/` (94), `html2pdf/` (7) | Story BMAD del modulo; wiki con regole e concetti (`wiki/concepts` 17); `html2pdf/` è l'owner della documentazione Html2Pdf (voce del 2026-05-21 in [wiki/log.md](./wiki/log.md)) |
| Evidence | `bmad/` (68), `roadmap/` (29), `_integration/` (13), `raw/` (6), `performance/` (5), `investigation/` (1), `epics/` (1), `outputs/` (1) | Artefatti BMAD ([bmad/00-INDEX.md](./bmad/00-INDEX.md)), piani ([roadmap/00-INDEX.md](./roadmap/00-INDEX.md)), sorgenti immutabili ([raw/README.md](./raw/README.md)) |
| Legacy, non ri-verificata | `llm-wiki/` (7), `actions/` (4), `filament/` (3), `relation_managers/` (2), `contracts/` (2), `support/` (2), `development/` (2), `resources/`, `architecture/`, `concepts/`, `prompts/` (1 ciascuna) | Documenti per componente, con copie `-1`; da riesaminare in DOC-004 |
| Senza `.md` | `superseded/`, `archived/`, `logs/`, `screenshots/`, `schema/` | Nessun file `.md` |

## Famiglie della radice

La radice ha 275 file `.md`. Classificazione per nome del file (regole in ordine, prima corrispondenza), non per contenuto:

| Famiglia | File | Esempi |
|----------|------|--------|
| PHPStan, qualità, test, buone e cattive pratiche | 54 | `phpstan-level10-fixes.md`, `quality-report.md`, `bad-practices.md` |
| Altro (ingressi, performance, changelog, correzioni, lang) | 46 | `changelog.md`, `translations.md`, `bottlenecks.md` |
| Prodotto, roadmap, strategia, scopo | 33 | `prd.md`, `product-roadmap.md`, `scopo.md` |
| Conflitti di merge e relative risoluzioni | 33 | `conflict-resolution-ffmpeg.md`, `conflitti-merge-risolti.md` |
| Architettura, moduli, schema, API, dipendenze | 27 | `architecture.md`, `module-overview.md`, `schema.md` |
| Duplicati e ridondanza | 20 | `duplicate-methods-analysis.md`, `redundancy-audit.md` |
| MCP, agenti, second brain, on-demand | 19 | `mcp-configuration.md`, `second-brain.md` |
| FFmpeg, video, stream, conversioni | 18 | `ffmpeg-usage.md`, `stream.md`, `conversione-media.md` |
| Filament e migrazioni | 15 | `filament-table-actions.md`, `migration-filament.md` |
| S3, AWS, storage, file | 10 | `aws.md`, `file-management.md` |

Varianti: 45 gruppi di nomi che differiscono solo per maiuscole, `-` e `_` (103 file su 217 nomi distinti); nessun file della radice è marcato `superseded`. Il consolidamento richiede una migration map (DOC-004, DOC-006).

## Story BMAD

- [2026-10-14 Ingressi docs del modulo Media](./stories/docs-ingressi-media.story.md): verifica di README, indici e architecture sul codice
- [02 Risoluzione dei marker di merge (e7e667b11)](./stories/02.Media-merge-conflict-resolution.story.md) e i suoi [followups aperti](./stories/02.Media-merge-conflict-resolution.story.md#followups-aperti)
- [2026-10-06 PHPStan cleanup](./stories/phpstan-cleanup-media.story.md)
- [2026-10-08 Services -> Actions (residui VideoStream, SubtitleService)](./stories/services-to-actions-media.story.md)
- [16-4 Consolidamento case-variant](./stories/16-4-media-case-variant-consolidation.md)
- Elenco completo: [`stories/`](./stories/) e [INDEX.md](./index.md#story-bmad)

## Dependency Intelligence

- [Dependency intelligence](dependency-intelligence.md)

## Riferimenti

- [Xot Module](../../Xot/docs/00-INDEX.md) - Base classes
- [AGENTS.md](../../../../AGENTS.md) - Project guidelines
