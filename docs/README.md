---
<<<<<<< HEAD
title: "README"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "README"
issues: []
discussions: []
---

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
---
title: "README"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "README"
issues: []
discussions: []
# Documentation

This directory contains documentation for the module.

## Structure

- **architecture.md** - Module architecture and design patterns
- **README.md** - This file

## Guidelines

Documentation should be:
- Clear and concise
- Example-driven
- Updated with code changes
- Use Markdown format (.md)
=======
bmad_id: MEDIA-DOCS-INDEX
domain: media-module
version: 1.0.0
status: active
audience: [developer, maintainer]
tags: [media, docs, index, bmad]
created: 2026-10-06
updated: 2026-10-06
author: agent-org
related: [docs/bmad/00-INDEX.md, docs/bmad/readme.md]
---
# Media Module — Documentation Index

Path: `laravel/Modules/Media/docs/`
Module: @Modules/Media
Scope: Consolidated docs after archive (docs-archive-2026/ holds legacy wiki).

## Stories PHPStan

- [2026-10-06 PHPStan cleanup — Media](./stories/2026-10-06-phpstan-cleanup-media.story.md) · [dev](./stories/2026-10-06-phpstan-cleanup-media.dev.md)
>>>>>>> laraxot/dev
