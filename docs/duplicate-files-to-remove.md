<<<<<<< HEAD
=======
---
title: "File Duplicati da Eliminare - Modulo Media"
module: "Media"
type: concept
tags: [duplicate, files, remove]
created: 2026-07-14
updated: 2026-07-14
qmd: "duplicate files to remove"
related:
  - "./webm.md"
---
>>>>>>> 9b998103 (.)
# File Duplicati da Eliminare - Modulo Media

## 🗑️ File da Eliminare (Case Sensitivity)

```bash
# Elimina file lowercase (duplicato)
rm Modules/Media/tests/Filament/Resources/mediaconvertresourcetest.php
```

## ✅ File da Mantenere

```bash
# Mantieni file UpperCamelCase (corretto PSR-4)
Modules/Media/tests/Filament/Resources/MediaConvertResourceTest.php
```

## 📜 Regola

**File PHP con classi DEVONO usare UpperCamelCase (PascalCase) identico al nome della classe (PSR-4).**

<<<<<<< HEAD
Vedi documentazione completa: [Xot/docs/file-naming-case-sensitivity.md](../../Xot/docs/file-naming-case-sensitivity.md)
=======
Vedi documentazione completa: [Xot/docs/file-naming-case-sensitivity.md](../../xot/docs/file-naming-case-sensitivity.md)
>>>>>>> 9b998103 (.)

## 🔧 Comando Cleanup

### Manuale
```bash
<<<<<<< HEAD
cd /var/www/_bases/base_ptvx_fila4_mono/laravel
=======
cd laravel
>>>>>>> 9b998103 (.)
rm Modules/Media/tests/Filament/Resources/mediaconvertresourcetest.php
git add -A
git commit -m "fix: remove lowercase duplicate test file (PSR-4 compliance)"
```

### Automatico (Tutti i Moduli)
```bash
# Script automatico (include anche altri moduli)
<<<<<<< HEAD
/var/www/_bases/base_ptvx_fila4_mono/bashscripts/fix/cleanup-case-duplicates.sh
=======
bashscripts/fix/cleanup-case-duplicates.sh
>>>>>>> 9b998103 (.)
```

---

<<<<<<< HEAD
**Riferimenti**: 
- [Xot File Naming Rules](../../Xot/docs/file-naming-case-sensitivity.md)
- [Bashscripts Location Policy](../../Xot/docs/bashscripts-location-policy.md)

=======
**Riferimenti**:
- [Xot File Naming Rules](../../xot/docs/file-naming-case-sensitivity.md)
- [Bashscripts Location Policy](../../xot/docs/bashscripts-location-policy.md)
>>>>>>> 9b998103 (.)
