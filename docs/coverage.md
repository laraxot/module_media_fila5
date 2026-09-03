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

## 2026-09-03 — phpstan-zero + case-variant dirs cleanup

Contesto: `phpstan analyse` (root, tutto il monorepo) era a 40 errori; 34 vivevano
in `Modules/Media/tests/feature/MediaBusinessLogicTest.php` (funzioni helper
inesistenti — `assertMediaTableHas`, `mediaTableColumns`, `mediaPayloadSet`,
`function.notFound`), le altre 2 erano `@phpstan-ignore generics.notGeneric`
in `Media.php`/`TemporaryUpload.php`. **Verificato con `git show HEAD:...`**:
questi ultimi 2 non esistono nel commit — il codice committato ha gia' la
forma corretta (`/** @use HasXotFactory<MediaFactory> */`); l'ignore era una
regressione introdotta da una sessione concorrente, ancora in corso e non
committata al momento di questa nota (vedi `docs/chat/`). **Non committato
qui**: `Media.php`/`TemporaryUpload.php` restano intrecciati con un lavoro
esteso e non revisionato di quella sessione (100+ file del modulo modificati,
non miei); toccarli avrebbe significato committare lavoro altrui non
verificato. Il fix (2 righe) resta applicato solo nel working tree, a
disposizione di chi finira' quel lavoro.

- Confermato via diff riga-per-riga: `tests/feature/` (lowercase) era il
  gemello case-variant **pre-fix** di `tests/Feature/MediaBusinessLogicTest.php`
  (PascalCase) — stessi 2 `it()`, stessa storia (`quaeris-bulk-invite-job-resilience`
  non c'entra, e' un modulo diverso; qui la storia locale era gia' risolta in
  `Feature/` con `XotBasePest::assertTableHas()`/`TestCase::mediaTableColumns()`
  al posto delle funzioni globali inesistenti). Rimossa `tests/feature/`
  interamente (solo quel file + `.gitkeep`).
- Verifica richiesta dalla story `16-2-case-variant-dirs-guard.md`: conteggio
  file analizzati da PHPStan **8627 -> 8626**, esattamente -1 — nessuna perdita
  di codice referenziato, solo il duplicato.
- I 2 `@phpstan-ignore generics.notGeneric` (uno duplicato due volte su
  `TemporaryUpload.php`) sono spariti dal working tree rimuovendoli a mano,
  **non committato** — vedi nota sopra, appartengono al lavoro non finito di
  un'altra sessione.
- Creato `bashscripts/tools/check-case-variant-dirs.sh` (Parte 1 della story),
  richiesto dalla stessa story: trova **26 altre coppie** di directory
  case-variant nel resto del monorepo (incluso `Modules/Media/tests/Fixtures`
  vs `tests/fixtures`, menzionata nel titolo della story ma non nelle sue AC —
  non toccata qui, fuori scope).

**Gate**: `./vendor/bin/phpstan analyse` (root, no path arg — il comando che
certifica, non `analyse Modules`) → `[OK] No errors` sull'intero monorepo,
misurato col fix dei 2 ignore applicato (non committato). `tools/phpinsights.sh`
non eseguibile: `vendor/bin/phpinsights` assente dal progetto (rimosso per
incompatibilita' con Pest 5, vedi second brain). Pest/phpmd non eseguibili in
modo affidabile su questo giro: `Modules/Xot/app/Actions/Blade/RegisterBladeComponentsAction.php`
e' modificato e non committato da un'altra sessione in questo momento
(`git status` lo conferma `M`, non mio), e in quello stato intermedio fa
fallire il bootstrap dell'intera app Laravel (`ComponentFileData::$name must
not be accessed before initialization`) — intermittente, dipende da quale
stato ha il loro file quando gira il comando. Non nella mia traccia, non
qualcosa che posso o devo risolvere: e' lavoro altrui in corso. Segnalato in
`docs/chat/` per visibilita' incrociata.
