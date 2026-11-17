---
title: "Audit approfondito modulo Media"
type: audit
status: review
updated: 2026-11-16
module: Media
qmd: "audit approfondito Media inventario PHPStan Pest policy Filament Actions"
---

# Audit approfondito — Media

## Metodo

Source-first (2026-11-16): inventario filesystem, `rg` su policy/marker/label,
lettura purpose esistente, PHPStan globale Modules già a 0 errori. Nessuna UI
inventata. Pest dichiarato solo se eseguito.

## Inventario misurato

| Area | Conteggio |
|---|---:|
| PHP in `app/` | 127 |
| Test PHP | 47 |
| Models (`app/Models/*.php`) | 4 |
| Policy files (approx) | 8 |
| Resource Filament | 3 |
| Actions | 51 |
| Services | 0 |
| Migration | 5 |
| Lang IT files | 48 |
| Marker conflitto | 0 |
| Occorrenze `return true` in Policy | 2 |
| Ratio test/app | 0.37 |

## Scopo (da docs esistenti / codice)

## Lo scopo in una frase **Media custodisce i file che fanno da prova a una decisione, e li rende utilizzabili nei formati che servono senza che il dominio sappia nulla di dischi e conversioni.**

## Finding preliminari (da inventario)

- Nessun finding automatico critico dall'inventario; completare review sicurezza/runtime con story dedicate.

## Finding approfonditi (codice)

- **P0** `StreamVideoAction`: auth solo se media non null; possibile path senza check; `echo`/`exit` nello stream.
- **P1** `TemporaryUpload::$guarded = []` (mass assignment aperto).
- Resources su XotBase (ok).

## Gate

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Media
# Pest solo fuori da 10.100.200.15 e con DB testing raggiungibile
./vendor/bin/pest Modules/Media/tests --no-coverage
```

PHPStan `Modules` (2026-11-16): **0 errori** sul tree completo.

## Piano

Vedi [piano-miglioramento.md](../piano-miglioramento.md).

## Riferimenti

- [audit.md](../audit.md)
- [ECC](../../ecc/media-ecc-audit.md)
- [Story](../stories/module-bmad-audit.story.md)
