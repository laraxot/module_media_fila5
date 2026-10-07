---
title: "PHPStan zero-error — modulo Media"
type: concept
tags: [phpstan, testing, pest]
created: 2026-06-10
updated: 2026-09-24
qmd: "media phpstan pest assert database helper case-sensitive duplicates"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/330"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/331"
related:
  - "phpstan.md"
  - "../../../../docs/wiki/troubleshooting/phpstan-test-assertion-chaining.md"
---

# PHPStan zero-error — modulo Media

## Verifica

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Media
```

0 errori **codice** (eventuale warning ignore pattern in `phpstan.neon` → solo utente).

## Pattern test

| Anti-pattern | Fix |
|--------------|-----|
| `expect()->toBe()` | `Assert::assertSame()` |
| `$this->assertDatabaseHas` in closure Pest | `assertMediaTableHas()` / `XotBasePest::assertTableHas` |
| `pest()->uses()` in `Pest.php` | `uses(TestCase::class)` per file; `Pest.php` solo helper |
| `MediaCollection` fantasma | Rimosso da `Pest.php` |
| `method_exists` triviali | `ReflectionClass::hasMethod` o assert su API reale |
| Alberi duplicati `tests/unit` vs `tests/Unit` (Linux case-sensitive) | Tenere solo `Unit`/`Feature`/`Filament` PascalCase; eliminare lowercase stub |
| `expect($typed)->toBeInstanceOf(Same::class)` | Redundant (pest-plugin-phpstan); usare `Assert::assertInstanceOf` o asserire comportamento |
| Cast `(int)` su `mixed` / `mediaIntKey` ricorsivo | `SafeIntCastAction::cast()` + `getKey()` corretto |

## Pest.php

Solo helper `createMedia()` / `makeMedia()` con `MediaFactory::new()`.

## Tooling condiviso

```bash
php scripts/phpstan/fix-pest-tests.php Modules/Media/tests
```

## Story

STORY-304 · issue [#330](https://github.com/laraxot/base_fixcity_fila5/issues/330)
