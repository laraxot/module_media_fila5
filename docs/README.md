---
title: "Media Module - Documentation Index"
type: documentation
bmad_id: MEDIA-DOCS-INDEX
domain: media-module
module: Media
version: 1.1.0
status: active
audience: [developer, maintainer]
tags: [media, docs, index, bmad, documentation]
created: 2026-09-26
updated: 2026-10-07
qmd: "README"
issues: []
discussions: []
related: [bmad/00-INDEX.md, bmad/readme.md, INDEX.md]
---

# Media Module - Documentation Index

Path: `laravel/Modules/Media/docs/`
Module: @Modules/Media
Scope: punto di ingresso della documentazione del modulo Media (gestione multimediale in Laraxot). Il wiki legacy e' in `docs-archive-2026/`.

## File canonici

1. **[README.md](README.md)** - questo file, punto di ingresso
2. **[architecture.md](architecture.md)** - architettura, namespace, dipendenze, struttura, funzionalita'
3. **[INDEX.md](INDEX.md)** - indice completo per categoria, con le story BMAD
4. **[index.md](index.md)** - bridge per discovery (legacy)

Nota: `readme.md` (minuscolo) e' un bridge legacy con la stessa sezione "Scopo" e "Linkage"; la coppia case-variant e' un duplicato da consolidare (vedi [16-4](./stories/16-4-media-case-variant-consolidation.md) per lo stesso problema nei test).

## Scopo del modulo

- Memorizzazione, elaborazione, distribuzione file multimediali
- Supporto multi-format (immagini, video, documenti, audio)
- Integrazione CDN e streaming video
- Isolamento tenant
- Conversione automatica (FFmpeg, immagini)

## Linkage

- Dipende da: Xot (base), Tenant, User, UI
- Utilizzato da: temi e moduli applicativi
- Standard di documentazione: vedi `/docs/` root

## Struttura della documentazione

- **architecture.md**: architettura del modulo e pattern di design
- **README.md**: questo file
- **stories/**: story BMAD del modulo (elenco in [INDEX.md](INDEX.md#story-bmad))
- **bmad/**: artefatti BMAD (indice in [bmad/00-INDEX.md](./bmad/00-INDEX.md))

Linee guida: documenti chiari e concisi, ricchi di esempi, aggiornati insieme al codice, in formato Markdown (`.md`).

## Story recenti

- [2026-10-06 PHPStan cleanup - Media](./stories/2026-10-06-phpstan-cleanup-media.story.md) · [dev](./stories/2026-10-06-phpstan-cleanup-media.dev.md)
- [02 Risoluzione dei marker di merge del commit e7e667b11](./stories/02.Media-merge-conflict-resolution.story.md)
