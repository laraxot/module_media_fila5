---
title: "Epics — Media"
type: epics
status: active
tags: [media, docs]
created: 2026-10-06
updated: 2026-10-06
---

# Epics — Media

## Epics

## E2 — Pulizia dei caricamenti temporanei (P1-2, D-1)

- AC1: `TemporaryUpload::prunable()` implementato (scadenza dichiarata, scope `old()` corretto).
- AC2: `php artisan model:prune --pretend --model='Modules\Media\Models\TemporaryUpload'` non solleva eccezioni; Pest sul prune.
- AC3: conteggio dei record rimossi registrato (log).

## E3 — `Media::id` coerente con lo schema (P1-3, D-2)

- AC1: decisione D-2 presa; cast e test allineati.
- AC2: `Modules/Media/tests/Unit/Models` → 0 fail.

## E4 — Allegati-prova non cancellabili (P1-4, D-3)

- AC1: D-3 decisa dal committente.
- AC2: Pest: la cancellazione fisica di un media «documentale» è negata; ammessa su un rigenerabile.

## E5 — Codice senza caller (P1-5, D-5)

- AC1: `StreamVideoAction`, `ConvertController`, Request S3 cancellati o cablati con policy.
- AC2: se cablato, Pest: utente non autenticato → 401/403 sullo streaming.

**Task:**
- [ ] Task 1
- [ ] Task 2
