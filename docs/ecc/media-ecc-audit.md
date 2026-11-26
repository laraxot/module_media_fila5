---
title: "ECC audit operativo — Media"
type: ecc-audit
status: review
updated: 2026-11-16
module: Media
<<<<<<< .merge_file_7uGFUg
<<<<<<< .merge_file_VYushm
qmd: "ECC audit Media verification security testing laravel"
=======
qmd: "ECC audit Media checklist security-review clean-code verification-loop inventario misurato finding guard prunable cast id"
=======
qmd: "ECC audit Media verification security testing laravel checklist security-review clean-code verification-loop inventario misurato finding guard prunable cast id"
>>>>>>> .merge_file_buNIcn
related:
  - ./00-index.md
  - ../bmad/audits/media-audit.md
  - ../bmad/audit.md
<<<<<<< .merge_file_7uGFUg
>>>>>>> .merge_file_aZCvnf
=======
>>>>>>> .merge_file_buNIcn
---

# ECC audit operativo — Media

## Contratto PTVX

<<<<<<< .merge_file_7uGFUg
<<<<<<< .merge_file_VYushm
ECC non sostituisce AGENTS.md/BMAD. Ogni finding: story BMAD, lock, fix causa,
PHPStan + Pest, aggiornamento docs/QMD.
=======
ECC non sostituisce `AGENTS.md`/BMAD. Ogni finding: story BMAD, lock, fix alla causa, PHPStan + Pest, aggiornamento docs/QMD. Dettaglio: [audit profondo](../bmad/audits/media-audit.md).
>>>>>>> .merge_file_buNIcn

## Checklist (stato misurato 2026-11-16)

| Skill ECC | Stato | Evidenza |
|---|---|---|
| `clean-code` | **aperto** | 3 Action e 3 classi HTTP senza caller; junk (`.backup-…`, `.to_xot`); `print_r` in `ConvertVideoCommand` |
| `security-review` | **aperto — 0 P0, 3 P1** | pagine `AwsTest`/`S3Test` senza guard; `StreamVideoAction` con controllo aggirabile (latente); cancellazione fisica |
| `laravel-verification` | **aperto** | `TemporaryUpload::prunable()` commentato → `model:prune` fallisce; cast `id` ≠ schema |
| `verification-loop` | PHPStan: 0 errori — Pest: parziale (49 pass / 1 fail su `tests/Unit/Models`) | |
| `tdd-workflow` | **aperto** | 5 file «coverage» (719 r.), 2 `->todo()` vuoti |
| `context-engineering` | in uso | QMD/graphify prima; registrare il perché dopo |
| `documentation-sync` | **fatto in questo giro** | architecture riscritta, decision-log/epics gap-fill, purpose con stato; 31/512 `.md` con nome non conforme |

<<<<<<< .merge_file_7uGFUg
## Input misurato (2026-11-16)
=======
ECC non sostituisce `AGENTS.md`/BMAD. Ogni finding: story BMAD, lock, fix alla causa, PHPStan + Pest, aggiornamento docs/QMD. Dettaglio: [audit profondo](../bmad/audits/media-audit.md).

## Checklist (stato misurato 2026-11-16)

| Skill ECC | Stato | Evidenza |
|---|---|---|
| `clean-code` | **aperto** | 3 Action e 3 classi HTTP senza caller; junk (`.backup-…`, `.to_xot`); `print_r` in `ConvertVideoCommand` |
| `security-review` | **aperto — 0 P0, 3 P1** | pagine `AwsTest`/`S3Test` senza guard; `StreamVideoAction` con controllo aggirabile (latente); cancellazione fisica |
| `laravel-verification` | **aperto** | `TemporaryUpload::prunable()` commentato → `model:prune` fallisce; cast `id` ≠ schema |
| `verification-loop` | PHPStan: 0 errori — Pest: parziale (49 pass / 1 fail su `tests/Unit/Models`) | |
| `tdd-workflow` | **aperto** | 5 file «coverage» (719 r.), 2 `->todo()` vuoti |
| `documentation-sync` | **fatto in questo giro** | architecture riscritta, decision-log/epics gap-fill, purpose con stato; 31/512 `.md` con nome non conforme |

## Inventario misurato
>>>>>>> .merge_file_aZCvnf
=======
## Inventario misurato
>>>>>>> .merge_file_buNIcn

| Voce | N |
|---|---:|
| app PHP | 127 |
<<<<<<< .merge_file_7uGFUg
<<<<<<< .merge_file_VYushm
| test | 47 |
| resources | 3 |
| actions | 51 |
| services | 0 |
| policies (files approx) | 8 |
=======
| test PHP / `*Test.php` | 47 / 41 |
| Models / Policy / Resource | 4 / 4 / 3 |
| Pagine Resource / pagine cluster `Test` / Widget | 15 / 2 / 1 |
| Actions / Services | 51 / 0 |
| Migration | 5 |
| Lang IT | 24 |
| `return true` in Policy | 2 (`before()`) |
| `@phpstan-ignore` | 2 |
| Marker conflitto | 0 |
>>>>>>> .merge_file_buNIcn

## Gate osservati

- PHPStan `Modules/Media` (`--no-progress`): **0 errori**.
- Pest `Modules/Media/tests/Unit/Models` su scratch DB: **49 pass, 1 fail** (cast `id`, [P1-3](../bmad/audits/media-audit.md#p1-3--mediaid-è-cast-a-string-ma-la-chiave-è-bigint)).
- `php artisan model:prune --pretend --model='Modules\Media\Models\TemporaryUpload'`: `LogicException` (sola lettura).

## Anti-pattern vietati (stato)

<<<<<<< .merge_file_7uGFUg
- baseline/`@phpstan-ignore` senza motivazione
- test svuotati per silenziare errori
- migrate:fresh / RefreshDatabase / --force
- docs con date nel nome file
- comportamento o screenshot inventati
=======
| test PHP / `*Test.php` | 47 / 41 |
| Models / Policy / Resource | 4 / 4 / 3 |
| Pagine Resource / pagine cluster `Test` / Widget | 15 / 2 / 1 |
| Actions / Services | 51 / 0 |
| Migration | 5 |
| Lang IT | 24 |
| `return true` in Policy | 2 (`before()`) |
| `@phpstan-ignore` | 2 |
| Marker conflitto | 0 |

## Gate osservati

- PHPStan `Modules/Media` (`--no-progress`): **0 errori**.
- Pest `Modules/Media/tests/Unit/Models` su scratch DB: **49 pass, 1 fail** (cast `id`, [P1-3](../bmad/audits/media-audit.md#p1-3--mediaid-è-cast-a-string-ma-la-chiave-è-bigint)).
- `php artisan model:prune --pretend --model='Modules\Media\Models\TemporaryUpload'`: `LogicException` (sola lettura).

## Anti-pattern vietati (stato)

`migrate:fresh`: 0; `RefreshDatabase`: 0; `@phpstan-ignore`: 2; `dd()`: 0; `->label()`/titoli letterali: ≥ 12 in `AwsTest`, 1 in `ConvertAction`; `$guarded = []`: 1 (`TemporaryUpload.php:99`).
>>>>>>> .merge_file_aZCvnf
=======
`migrate:fresh`: 0; `RefreshDatabase`: 0; `@phpstan-ignore`: 2; `dd()`: 0; `->label()`/titoli letterali: ≥ 12 in `AwsTest`, 1 in `ConvertAction`; `$guarded = []`: 1 (`TemporaryUpload.php:99`).

Regole sempre valide: niente baseline/`@phpstan-ignore` senza motivazione, niente test svuotati per silenziare errori,
mai `migrate:fresh` / `RefreshDatabase` / `--force`, niente date nel nome dei file docs, niente comportamento o
screenshot inventati.
>>>>>>> .merge_file_buNIcn

## Riferimenti

- [00-index](./00-index.md)
- [BMAD audit](../bmad/audit.md)
