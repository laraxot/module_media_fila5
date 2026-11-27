---
title: "Contratto — FormatDebugOutputAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\S3\FormatDebugOutputAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "FormatDebugOutputAction formatta output diagnostica testo blocchi title status data"
---

# FormatDebugOutputAction

Trasforma i blocchi di diagnostica in testo leggibile. Codice: `app/Actions/Diagnostic/S3/FormatDebugOutputAction.php:11-108`.

## Input

- `array<string, mixed> $debugResults`: lista di blocchi con `title`, `status`, `data`.
- `string $emptyMessage`: testo restituito se la lista è vuota.

## Output

- `string`: blocchi uniti con `\n`. Ogni blocco ha intestazione `=== title ===`, riga `Status:`, righe `chiave: valore` (array in JSON indentato) e una linea di 50 trattini.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| FORMAT-DEBUG-OUTPUT-INV-1 | Lista vuota → `$emptyMessage` invariato. | `FORMAT-DEBUG-OUTPUT-INV-1` |
| FORMAT-DEBUG-OUTPUT-INV-2 | Un valore che non e' un array, o un blocco a cui manca `title`, `status` o `data`, viene ignorato in silenzio (`isset`: anche un `data` presente ma `null`). | `FORMAT-DEBUG-OUTPUT-INV-2` |
| FORMAT-DEBUG-OUTPUT-INV-3 | Valori non stringa né scalari né `Stringable` diventano stringa vuota. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- Nessuno dichiarato. `Safe\json_encode` lancia se la codifica fallisce.

## Non fa

- Non applica escape: il testo è destinato a un blocco preformattato, non a HTML.

## Prove

- `FORMAT-DEBUG-OUTPUT-INV-1`: `tests/Unit/Actions/Diagnostic/FormatDebugOutputActionTest.php` («empty results fall back to the given message»).
- `FORMAT-DEBUG-OUTPUT-INV-2`: stesso file: «entries that are not arrays or lack the required keys are skipped» (un valore scalare e un blocco con solo `title`); nessun test usa un `data` `null`.
- `FORMAT-DEBUG-OUTPUT-INV-3`: nessun test.
