---
title: "Contratto — ConvertSrtToVttAction"
type: contract
action: "Modules\Media\Actions\Subtitle\ConvertSrtToVttAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "ConvertSrtToVttAction converte sottotitoli SRT in WebVTT virgola punto timestamp file public_path"
---

# ConvertSrtToVttAction

Converte un file SRT in WebVTT: aggiunge l'intestazione `WEBVTT` e cambia la virgola in punto nei timestamp. Codice: `app/Actions/Subtitle/ConvertSrtToVttAction.php:14-50`.

## Input

- `string $srtFile`: percorso relativo a `public_path()`.
- `string $webVttFile`: percorso di destinazione relativo a `public_path()`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| CONVERT-SRT-TO-VTT-INV-1 | Il file di output inizia con `WEBVTT` e una riga vuota. | `CONVERT-SRT-TO-VTT-INV-1` |
| CONVERT-SRT-TO-VTT-INV-2 | La virgola è sostituita con il punto solo nella riga dei timestamp: la riga a indice 1 e ogni riga che segue una riga vuota più un'altra riga. | `CONVERT-SRT-TO-VTT-INV-2` |

## Effetti collaterali

- Sovrascrive il file di destinazione senza controllo di esistenza.

## Errori

- `Safe\fopen` lancia se il sorgente non esiste.
- `RuntimeException` se `fgets` fallisce prima della fine del file.

## Non fa

- Non valida la struttura SRT.
- L'indice 0 non è mai convertito: un file che inizia direttamente con un timestamp (senza numero di cue) non viene corretto nella prima riga (dubbio, non verificato).
- Non rimuove i numeri di cue: restano validi in WebVTT.

## Prove

- `CONVERT-SRT-TO-VTT-INV-1`: `tests/Unit/Actions/Subtitle/ConvertSrtToVttActionTest.php` («timing lines get a dot, cue text keeps its commas»: confronta l'intero file prodotto).
- `CONVERT-SRT-TO-VTT-INV-2`: stesso test: la virgola resta nel testo della cue («Ciao, mondo») e diventa punto nelle righe dei tempi.
