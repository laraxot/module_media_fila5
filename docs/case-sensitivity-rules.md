<<<<<<< HEAD
=======
---
title: "Case Sensitivity Rules - Media Module"
module: "Media"
type: rule
tags: [case, sensitivity, rules]
created: 2026-07-14
updated: 2026-07-14
qmd: "case sensitivity rules"
related:
  - "./webm.md"
---
>>>>>>> be7d0c3 (.)
# Case Sensitivity Rules - Media Module

## Problema / Problem

**NON possono esistere file con lo stesso nome che differiscono solo per maiuscole/minuscole nella stessa directory.**

Riferimento completo: [Xot Module Case Sensitivity Rules](../../xot/docs/case-sensitivity-rules.md)

## File Rimossi da Media Module

I seguenti file sono stati eliminati perché violavano le regole:

```
✗ Removed: tests/Filament/Resources/mediaconvertresourcetest.php
✓ Kept:    tests/Filament/Resources/MediaConvertResourceTest.php
```

## Convenzioni

### Test Files (Filament Resources)
- **Formato**: PascalCase
- **Esempio**: `MediaConvertResourceTest.php`
- ❌ **Errato**: `mediaconvertresourcetest.php`

## Update Log

<<<<<<< HEAD
- **[DATE]**: Removed `mediaconvertresourcetest.php` duplicate
=======
- **[DATE]**: Removed `mediaconvertresourcetest.php` duplicate
>>>>>>> be7d0c3 (.)
