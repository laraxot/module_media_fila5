---
issues: []
discussions: []
title: "Conflict Resolution — Module Media"
module: "Media"
type: concept
tags: [conflict, resolution]
created: 2026-07-14
updated: 2026-11-26
qmd: "conflict resolution"
related:
  - "./webm.md"
  - "./stories/02.Media-merge-conflict-resolution.story.md"
  - "./migrations.md"
---
# Conflict Resolution — Module Media

## Summary

- **Strategy**: merge semantico (scopo di ogni lato), mai scelta cieca di HEAD o theirs.
- **Root cause ricorrente**: daemon di auto-commit che fonde un remote divergente e
  lascia i marker `<<<<<<<` / `=======` / `>>>>>>>` nel working tree.
- Dettaglio batch e decisioni: [02.Media-merge-conflict-resolution.story.md](./stories/02.Media-merge-conflict-resolution.story.md).

## Regola operativa (DRY + KISS)

1. Capire cosa promette ogni lato (bugfix FFmpeg, Action `Get*` vs `Resolve*`, tipi
   senza `mixed`, fixture di test).
2. Tenere il comportamento voluto con il simbolo che esiste davvero nel modulo.
3. Preferire `Get*Action` dove c'e' gia' il contratto / naming sibling; `inFormat()` per
   le conversioni video; niente `mixed` se basta un array tipizzato.
4. Dopo ogni file: `php -l` deve passare; a fine batch `rg '<<<<<<<' Modules/Media --glob '*.php'` a zero.

## Ondata 2026-11-26

19 file PHP in `app/`, `database/`, `tests/` (nessun marker in `routes/`). Esito:
marker a zero, `php -l` ok. Decisioni riassunte nella story § «Ondata 2026-11-26».

## Ondata storica (2026-07 / 2026-10)

- Prima passata locale: 9 file (strategie miste).
- Batch e7e667b11: 92 PHP + 6 docs (vedi story).

## Backlinks

- [Story merge conflict resolution](./stories/02.Media-merge-conflict-resolution.story.md)
- [Migrations index](./migrations.md)
