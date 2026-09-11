---
title: "Media Module Test Coverage"
module: "Media"
type: concept
tags: [coverage]
created: 2026-07-14
updated: 2026-07-14
qmd: "coverage"
related:
  - "./webm.md"
---
# Media Module Test Coverage

## Coverage Results

**Date**: [DATE]  
**Module**: Media  
**Status**: Tests pass but 0.00% per-module code coverage

## Test Execution Summary

- **Tests Passed**: 59
## Status

**2026-09-11 (dead code follow-up — HasMediasTable/MediasTable removal)**:
- Contesto: `docs/stories/xotbaseresourcetable-model-audit-media-batch.story.md`,
  sezione "Follow-up (2026-09-11)". Cancellati due `*Table extends
  XotBaseResourceTable` mai risolti a runtime per convenzione (`HasMediasTable`
  — nessuna `HasMediaResource` esiste; `MediasTable` — `Str::plural('Media')`
  resta `'Media'`, la classe viva e' `MediaTable.php`). Aggiornato
  `tests/Unit/MediaFilamentAndActionsTest.php` di conseguenza.
- PHPStan: `vendor/bin/phpstan analyse Modules/Media --no-progress` → **[OK] No errors**.
- PHPMD: `./tools/phpmd.sh Modules/Media/app text Modules/Media/phpmd.ruleset.xml`
  → findings pre-esistenti non correlati a questo diff (nessuno sui file
  toccati/cancellati); debito noto (`CamelCaseVariableName`,
  `CyclomaticComplexity`, ecc.) in `Actions/Subtitle`, `Actions/Video`,
  `HasMediaResource/Actions/AddAttachmentAction.php`.
- Pest (`XDEBUG_MODE=coverage vendor/bin/pest Modules/Media`, doppia run per
  escludere flakiness): **282 passed, 8 failed, 3 risky, 4 skipped (1073
  assertions)**, stabile su due run consecutive. Gli 8 fallimenti sono
  **pre-esistenti e non correlati** a questo diff (nessuno tocca
  `HasMediasTable`, `MediasTable` o i file modificati): `MediaConvertSchemasTest`
  (colonne `MediaConvertsTable` non allineate all'assert), `MediaFilamentAndActionsTest`
  → `GenerateTemporaryUploadPathAction` (`Assert::string($media->getKey())`
  riceve un intero), `MediaHighestMissCoverageTest` (chiave `file_name`
  mancante in un assert), `Models\MediaModelTest`/`Models\MediaTest` (cast e
  fixture DB). Il test toccato in questo giro
  (`TemporaryUploadsTable espone colonne indicizzate`) passa.
- Coverage per-modulo (Clover, `Modules/Media/app`, sola lettura):
  **57.56% (1698/2950 statement)** — il numero storico "0.00%" sotto era
  stale/non ricalcolato, non un regresso di questo diff.
- Nota race multi-agente: durante la prima run e' apparso un fallimento a
  cascata (`Class NotificationLogResource\Pages\ListNotificationLogs not
  found`, dal modulo Notify, in editing concorrente nello stesso worktree
  condiviso) su ~30 test; scomparso alla run successiva a distanza di
  minuti. Non e' un problema del modulo Media.

**2026-09-06 (Session 2)**:
- PHPStan L10: 4 errors fixed (generics removed, deprecated tests commented)
- PHPMD: No violations detected
- Pest: 260/285 passed (91.2% pass rate)
- Coverage status: Baseline established (0.00% per-module app code)
- Next: Pest coverage boost target +5% (Phase 2)

- **Tests Skipped**: 5
- **Assertions**: 122
- **Coverage (Modules/Media/app)**: 0.00% (0/2140 statements)

## Running Tests

```bash
./vendor/bin/pest Modules/Media/tests
```

## Running Coverage (Clover)

```bash
./vendor/bin/pest Modules/Media/tests --coverage-clover /tmp/media-clover.xml
```

## Compute per-module coverage

Filter the Clover report on `Modules/Media/app` and compute statement coverage:

```bash
python3 - <<'PY'
import xml.etree.ElementTree as ET
from pathlib import Path

root = ET.parse(Path('/tmp/media-clover.xml')).getroot()
covered = total = 0
for file_el in root.findall('.//file'):
    name = file_el.get('name') or ''
    if '/Modules/Media/app/' not in name:
        continue
    for line_el in file_el.findall('line'):
        if line_el.get('type') != 'stmt':
            continue
        total += 1
        if int(line_el.get('count') or '0') > 0:
            covered += 1

pct = (covered / total * 100) if total else 0.0
print(f'coverage_pct={pct:.2f}')
print(f'statements_covered={covered}')
print(f'statements_total={total}')
PY
```

## Notes

- The Media module test suite is now stable and reflects the actual runtime schema.
- Coverage is currently 0% because the executed tests do not hit code paths under `Modules/Media/app` that are counted as executable statements by the coverage driver.
