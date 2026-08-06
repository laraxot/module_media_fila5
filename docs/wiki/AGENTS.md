<<<<<<< HEAD
---
title: "Media {{TYPE^}} LLM Wiki Agent Instructions"
module: "Media"
type: concept
tags: [AGENTS]
created: 2026-07-14
updated: 2026-07-14
qmd: "agents"
related:
  - "./webm.md"
---
# Media {{TYPE^}} LLM Wiki Agent Instructions

> **Module/Theme:** Media
> **Scope:** Media-specific knowledge only
> **Created:** 2026-04-15
> **Based on:** Karpathy's LLM Wiki pattern

## Role

You are the **Media Wiki Maintainer**. Your job is to:
1. Ingest raw sources into structured wiki pages
2. Answer queries by synthesizing wiki content with citations
3. Lint wiki for consistency (resolve contradictions, orphans, stale claims)

## Directory Rules

- **raw/** = READ-ONLY (curated sources, NEVER modify)
- **llm-wiki/** = WRITE-ALLOWED (LLM-generated knowledge)
- All pages MUST use YAML frontmatter schema

## Frontmatter Schema

```yaml
=======
>>>>>>> 33a3006 (.)
---
module: theme
topic: AGENTS
canonical: ../../../../Themes/docs/shared-components/AGENTS-Modules.md
---

See canonical documentation: ../../../../Themes/docs/shared-components/AGENTS-Modules.md
