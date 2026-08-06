<<<<<<< HEAD
---
title: "Codex Configuration Error Fixes"
module: "Media"
type: concept
tags: [codex, error, fix]
created: 2026-07-14
updated: 2026-07-14
qmd: "codex error fix"
related:
  - "./webm.md"
---
# Codex Configuration Error Fixes

Questo documento descrive le correzioni applicate agli errori riscontrati durante l'avvio di `codex`.

## 1. Errori YAML negli SKILL.md

### Sintomo
`invalid YAML: mapping values are not allowed in this context` o `invalid YAML: name: invalid type: map`.

### Causa
Caratteri speciali come `:` o `{}` all'interno di valori non racchiusi tra virgolette nel frontmatter YAML.

### Soluzione
Racchiudere sempre i valori di `name` e `description` tra virgolette doppie nel frontmatter.

**Esempio Errato:**
```yaml
=======
>>>>>>> 33a3006 (.)
---
module: theme
topic: codex-error-fix
canonical: ../../../Themes/docs/shared-components/codex-error-fix.md
---

See canonical documentation: ../../../Themes/docs/shared-components/codex-error-fix.md
