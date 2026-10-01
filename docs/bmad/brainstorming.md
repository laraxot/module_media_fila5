<<<<<<< .merge_file_lGnsNL
<<<<<<< .merge_file_7vADzj
---
title: "Media — brainstorming"
type: brainstorming
tags: [media, brainstorming, risks, open-questions, decisions]
created: 2026-09-28
updated: 2026-09-28
qmd: "Media brainstorming decisioni aperte scartate rischi validazione"
related:
  - ./README.md
  - ./architecture.md
  - ./brainstorming/module-opportunities.md
  - ./epics/module-roadmap.md
---

# Media — brainstorming

> **SUMMARY**: indice dei contenuti di brainstorming per `Modules\Media`.
> Le domande ad alto valore, ipotesi, rischi e output attesi sono nei **shard**
> sottostanti (non sovrascritti). Questo file root fuunge da indice.

## Shard brainstorming

| Shard | Descrizione |
|---|---|
| [brainstorming/module-opportunities.md](./brainstorming/module-opportunities.md) | domande ad alto valore, ipotesi da validare, rischi |

## Decisioni prese

| Decisione | Stato | Riferimento |
|---|---|---|
| Connessione DB `media` separata da `BaseModel` | approvata | `app/Models/BaseModel.php:24` |
| `Media` estende `SpatieMedia` | approvata | `app/Models/Media.php:97` |
| `TemporaryUpload` implementa `HasMedia` | approvata | `app/Models/TemporaryUpload.php:69` |
| Conversioni FFmpeg orchestrate da `ResolveMediaExporterAction` | approvata | `app/Actions/Ffmpeg/ResolveMediaExporterAction.php` |
| Diagnostica AWS in `app/Actions/Diagnostic/` | approvata | `app/Actions/Diagnostic/` |

## Domande aperte

| Domanda | Fonte | Priorità |
|---|---|---|
| API pubblica e invarianti del modulo | `architecture/module-boundary.md` sezione "Decisioni da confermare" | alta |
| Flussi con transazioni, autorizzazione e audit | `architecture/module-boundary.md` sezione "Decisioni da confermare" | alta |
| Copertura Pest rappresentativa (56 test) | `tests/` | media |
| Integrazioni esterne obbligatorie vs opzionali | `composer.json`, `app/Actions/` | media |

## Rischi

| Rischio | Evidenza |
|---|---|
| Duplicazione tra Form/Table | `app/Filament/Resources/MediaResource/Tables/MediaTable.php` vs `MediasTable.php` |
| Contratti impliciti Eloquent | `app/Models/Media.php` relazioni via `@property` |
| Drift docs / codice / stories | `docs/bmad/stories/` multipli |
| WIP concorrente e marker merge | `stories/git-status-fleet-merge-markers-media.story.md` |
| Directory duplicate (`app/conversions` vs `app/Conversions`) | `app/conversions/`, `app/Conversions/` |
| Directory duplicate (`tests/unit` vs `tests/Unit`) | `tests/unit/`, `tests/Unit/` |

## Elementi non approvati (scartati o fuori scope)

| Elemento | Motivo |
|---|---|
| Clone annidato `Activity/Activity/` | fuori scope (vedi story 5.249) |
| Refactor proposto in architettura | da marcare esplicitamente come proposta non applicata |

## Vedi anche

- [README](./README.md)
- [Architecture](./architecture.md)
- [Epic roadmap](./epics/module-roadmap.md)
- [Module opportunities (shard)](./brainstorming/module-opportunities.md)
=======
=======
>>>>>>> .merge_file_degadm
# Brainstorming - Modulo Media

## Idee iniziali

- [IDEA 1]
- [IDEA 2]
- [IDEA 3]

## Problemi da risolvere

- [PROBLEMA 1]
- [PROBLEMA 2]

## Soluzioni proposte

- [SOLUZIONE 1]
- [SOLUZIONE 2]

## Domande aperte

- [DOMANDA 1]
- [DOMANDA 2]
<<<<<<< .merge_file_lGnsNL
>>>>>>> .merge_file_kuFgpX
=======
>>>>>>> .merge_file_degadm
