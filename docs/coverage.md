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

## 2026-09-04 — riduzione uso di `mixed`

Contesto: task dedicato a ridurre `mixed` dove il tipo reale e' desumibile
(convenzione di progetto, "dove possibile" — non 100% coverage). Prima di
toccare qualunque file, `git status --short` su `Modules/Media` ha mostrato
**124 file gia' sporchi non committati** (documentazione, lang, Actions,
Models, Filament Resources) — lavoro esteso di un'altra sessione concorrente,
in parte gia' sulla stessa identica campagna (es. diff pre-esistente su
`GetAttachmentsSchemaAction.php`: `function ($state, ...)` → `function (mixed
$state, ...)`). Per non rischiare di sovrascrivere/collidere, ho isolato i
file con `mixed` che **non** risultavano gia' modificati (`comm` tra l'elenco
grep e l'elenco `git status`): 30 file su 51 totali nel modulo.

Dei 30 file "puliti":
- **2 fix applicati** — shape realmente stabile e evidente dal corpo del
  metodo, sostituita a `array<string, mixed>`/union con `mixed` ridondante:
  - `app/Actions/Subtitle/ParseSubtitleXmlAction.php` — `execute()` e
    `getFromXml()`: `array<int, array<string, float|int|string|mixed>>` →
    `array<int, array{sentence_i: int, item_i: int, start: int|float, end:
    int|float, time: string, text: string}>` (le 6 chiavi e i loro tipi sono
    scritti esplicitamente due righe sotto).
  - `app/Actions/Diagnostic/S3/RunS3SaveTestAction.php` — `execute()`:
    `array<string, mixed>` → `array{test_file: array{path: string,
    cloudfront_url: string, temporary_url: string}, uploaded_file:
    array{...}|null}` (verificato `GetCloudFrontSignedUrlAction::execute():
    string` e `FilesystemAdapter::temporaryUrl(): string`).
  - `app/Filament/Resources/MediaResource/Pages/ConvertMedia.php` —
    `getInfolistSchema()`: `array<string, mixed>` → `array<string,
    \Filament\Schemas\Components\Component>` (shape canonica presa da
    `XotBaseResource::getInfolistSchema()`, stesso contratto).
- **~28 occorrenze lasciate `mixed` con motivo verificato**, non per pigrizia:
  - 15 Actions diagnostiche AWS/S3 (`Diagnostic/Aws/*`, `Diagnostic/S3/*`
    tranne `RunS3SaveTestAction`) — payload `status/message/details` con
    chiavi e tipi **diversi per branch** (successo vs eccezione AWS): non e'
    uno shape stabile, e' union genuino di array eterogenei consumati in modo
    generico (renderizzati come JSON/KeyValue in Filament).
  - `app/Actions/S3/DeleteFileAction.php`, `GetFileInfoAction.php`,
    `UploadFileAction.php` — stesso pattern (successo/eccezione con chiavi
    diverse).
  - `app/Actions/Ffmpeg/ResolveMediaExporterAction.php` e
    `app/Support/Ffmpeg/MediaExporterResolver.php` — `mixed $value` e'
    voluto: la funzione esiste apposta per validare a runtime un valore
    arbitrario (risultato di chiamate fluent/`__call` su PHPFFMpeg) prima di
    restringerlo a `MediaExporter`; tipizzare il parametro romperebbe lo scopo
    della funzione.
  - `app/Filament/Actions/AddAttachmentAction.php` e l'omonimo in
    `Filament/Resources/HasMediaResource/Actions/` — `array<string, mixed>
    $data` e' il payload form Filament, genuinamente arbitrario lato utente.
  - `app/Http/Livewire/Card/Video/Clip.php` — `$data` in
    `updateDataFromModal()` viene da `$model->toArray()` di un model
    generico: tipi per colonna, non prevedibili qui.
  - `app/Datas/CloudFrontData.php` — `Config::array('services.cloudfront')`
    e' gia' tipizzato `array<array-key, mixed>` dal contratto Laravel.
  - 3 factory (`MediaFactory`, `MediaConvertFactory`,
    `TemporaryUploadFactory`) — `definition(): array<string, mixed>` e' la
    convenzione standard Eloquent Factory (colonne di tipo eterogeneo).
  - `tests/Unit/Filament/MediaDiagnosticPagesCoverageTest.php` — helper di
    test generico (`mediaInvoke`) pensato per invocare qualunque metodo con
    qualunque argomento via reflection.
  - `app/Filament/Clusters/Test/Pages/AwsTest.php` — `$testResults` e
    `getAwsConfig()` ripetono lo stesso pattern diagnostico eterogeneo delle
    Actions AWS/S3 sopra.
- **21 file NON toccati** (gia' modificati da un'altra sessione, stesso task
  o task di pulizia PHPStan in corso): `app/Models/Media.php`,
  `app/Models/MediaConvert.php`, `app/Models/TemporaryUpload.php`,
  `app/Actions/Diagnostic/S3/FormatDebugOutputAction.php`,
  `TestCloudFrontConnectionAction.php`, `GetAttachmentsSchemaAction.php`,
  `app/Actions/Image/Merge.php`, `app/Actions/Stream/SubtitleService.php`,
  `app/Actions/Video/ConvertVideoAction.php`,
  `ConvertVideoByConvertDataAction.php`, `ConvertVideoByMediaConvertAction.php`,
  `app/Console/Commands/ConvertVideoCommand.php`,
  `app/Datas/SaveAttachmentsData.php`, varie Filament Resources/Tables/Widgets
  di `MediaResource`/`MediaConvertResource`/`TemporaryUploadResource`,
  `app/Rules/FileExtensionRule.php`, `app/Services/VideoStream.php`,
  `app/Support/TemporaryUploadPathGenerator.php` — vedi elenco completo in
  `docs/chat/` e collisione segnalata sotto.

**PHPStan**: `./vendor/bin/phpstan analyse Modules/Media --no-progress
--error-format=table` → baseline `[OK] No errors`, dopo i 3 edit ancora `[OK]
No errors` (nessuna regressione, nessun nuovo errore introdotto).

**PHPMD**: `./tools/phpmd.sh Modules/Media text ../docs/phpmd.ruleset.xml`
va in crash sull'intero modulo (`No node to visit provided for
visitAnonymousClass` — noto, vedi second brain). Rilanciato scoped sui 3 file
toccati: pulito su `ConvertMedia.php` e `RunS3SaveTestAction.php`; su
`ParseSubtitleXmlAction.php` segnala 3 warning di stile pre-esistenti
(`$sentence_i`/`$item_i` non camelCase, `$ms` troppo corto) non legati al
mio diff (variabili invariate).

**Pest**: `./vendor/bin/pest Modules/Media/tests -c Modules/Media/phpunit.xml
--no-coverage` lanciato in background con timeout di 180s: nessun output
prodotto, terminato per timeout (`exit 143`) senza risultati utilizzabili.
Non ritentato (una sola prova prevista dal task, vedi memoria
`env-sqlite-manca-suite-non-eseguibile` sui problemi noti di bootstrap della
suite). Gate primario resta PHPStan, verde prima e dopo.

**Collisione con altra sessione**: confermata — `git status --short` su
`Modules/Media` mostrava 124 file gia' modificati e non committati prima di
qualunque mio edit, inclusi `app/Models/Media.php` e diverse Actions con
esattamente lo stesso tipo di modifica che stavo per fare (`mixed $state` gia'
aggiunto in `GetAttachmentsSchemaAction.php`). Non toccati, non committati da
me. Segnalazione incrociata lasciata per il coordinatore in
`docs/chat/` (fuori dal mio scope diretto per istruzione esplicita).
