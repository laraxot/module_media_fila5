---
title: "Media Wiki Index"
module: "Media"
type: index
status: draft
updated: 2026-10-14
tags: [docs, media, wiki]
qmd: "media module wiki media"
---

# Media Module Wiki

Ingresso del modulo: [../README.md](../README.md). Indice operativo canonico: [../00-INDEX.md](../00-INDEX.md).

## Contenuto verificato (2026-10-14)

`docs/wiki/` ha 94 file `.md`: 35 nel primo livello e 59 in 13 sottocartelle.

| Sottocartella | File | Contenuto |
|---------------|------|-----------|
| `concepts/` | 17 | Regole e concetti del modulo, tra cui `temporary-uploads-migration-consolidation.md`, `psr4-path-case.md`, `no-services-no-support-queueable-actions.md`, `xotbase-table-columns-enforcement.md` |
| `_integration/` | 12 | Contenuto non ri-verificato |
| `troubleshooting/` | 5 | Errori noti (redeclare di classi, conflitti di merge, correzioni PHPStan su ConvertVideo) |
| `integrations/` | 4 | FFmpeg, API, aggiornamento Laravel 13 |
| `actions/` | 4 | Documenti sulle Action di conversione video (con copie `-1`) |
| `rules/` | 3 | `module-commit-push-after-change.md` piu' `INDEX.md` e `index.md` |
| `redundancy/`, `_templates/` | 3 + 3 | Analisi di ridondanza e modelli |
| `skills/`, `memories/`, `commands/` | 2 + 2 + 2 | Solo `INDEX.md` e `index.md` (nessuna voce reale) |
| `overviews/`, `how-to/` | 1 + 1 | Una pagina ciascuna |

Primo livello: 29 file su 35 hanno lo stesso nome (senza distinguere le maiuscole) di un file nella radice di `docs/` e solo 1 e' identico byte per byte; non sono stati riconciliati (DOC-004). Esistono solo qui `AGENTS.md`, `agents.md`, `bmad-method.md`, `log.md`, `overview.md`, `resource-table-columns.md`. Registro delle attivita': [log.md](./log.md).

`index.md` di questa cartella e' una copia per variante di maiuscole di questo file ed e' marcata superseded.

## Indices
- [Rules](rules/INDEX.md)
- [Skills](skills/INDEX.md)
- [Commands](commands/INDEX.md)
- [Memories](memories/INDEX.md)
- [Concepts](concepts/INDEX.md)

## On-Demand Workflow

```bash
qmd search "Media <topic>" --limit 5
```

---
*Updated: 2026-05-11*

## Composer / nwidart

- [composer-root-minimal-nwidart](concepts/composer-root-minimal-nwidart.md) — root skeleton nwidart (modello laraxot)
