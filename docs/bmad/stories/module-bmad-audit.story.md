---
title: "Module BMAD audit — Media"
<<<<<<< .merge_file_WBsgy9
=======
<<<<<<< .merge_file_wDDAGb
=======
type: story
>>>>>>> .merge_file_UGFQog
>>>>>>> .merge_file_hTgDet
status: review
updated: 2026-11-16
module: Media
bmad: true
<<<<<<< .merge_file_WBsgy9
qmd: "story BMAD audit modulo Media inventario gate"
---

# Story: audit BMAD del modulo Media

## Acceptance

- [x] Inventario source-first (2026-11-16).
- [x] Audit + piano in `docs/bmad/`.
- [x] Pack ECC in `docs/ecc/`.
- [ ] Pest modulo eseguito in ambiente testing stabile.
- [ ] Finding P0/P1 chiusi con regressione.

## Riferimenti

- [audit](../audit.md)
- [piano](../piano-miglioramento.md)
- [ECC](../../ecc/media-ecc-audit.md)

## Esito

Baseline audit aggiornata. PHPStan tree `Modules` a 0. Pest e chiusura P0/P1 aperti.
=======
<<<<<<< .merge_file_wDDAGb
qmd: "story BMAD audit modulo Media inventario gate"
---

# Story: audit BMAD del modulo Media

## Acceptance

- [x] Inventario source-first (2026-11-16).
- [x] Audit + piano in `docs/bmad/`.
- [x] Pack ECC in `docs/ecc/`.
- [ ] Pest modulo eseguito in ambiente testing stabile.
- [ ] Finding P0/P1 chiusi con regressione.
=======
qmd: "story BMAD audit modulo Media inventario gate pest phpstan finding guard prunable cast id"
related:
  - ../audits/media-audit.md
  - ../epics.md
  - ../piano-miglioramento.md
---

# Story: audit BMAD profondo del modulo Media

## Contesto

Audit source-first del modulo che custodisce i file-prova e le loro conversioni ([purpose](../purpose.md)).

## Acceptance

- [x] Inventario misurato e finding con `path:line` ([audit profondo](../audits/media-audit.md)).
- [x] Sintesi + gate ([audit](../audit.md)), checklist ([ECC](../../ecc/media-ecc-audit.md)).
- [x] Gap-fill: [architecture](../architecture.md) (riscritta), [decision-log](../decision-log.md), [epics](../epics.md), [brainstorming](../brainstorming.md), [purpose](../purpose.md) (stato del codice).
- [x] PHPStan `Modules/Media`: 0 errori.
- [ ] Pest `Modules/Media`: `tests/Unit/Models` 49 pass / 1 fail (`MediaTest.php:369`, E3); resto non eseguito.
- [ ] E1–E6 chiuse con test di regressione.
>>>>>>> .merge_file_UGFQog

## Riferimenti

<<<<<<< .merge_file_wDDAGb
- [audit](../audit.md)
- [piano](../piano-miglioramento.md)
- [ECC](../../ecc/media-ecc-audit.md)

## Esito

Baseline audit aggiornata. PHPStan tree `Modules` a 0. Pest e chiusura P0/P1 aperti.
=======
1. Lock dei file di `docs/` del modulo (`bashscripts/lock/`), unlock a fine lavoro.
2. Audit codice → docs; nessun PHP toccato.
3. Pack ECC e indici aggiornati; `qmd update`.

## Esito

Baseline consegnata: 0 P0 dimostrati, 6 P1, P2 elencati. Il primo da chiudere è E1 (guard sulle pagine di diagnostica S3), poi E2 (prune).
>>>>>>> .merge_file_UGFQog
>>>>>>> .merge_file_hTgDet
