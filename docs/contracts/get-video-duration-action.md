---
title: "Contratto — GetVideoDurationAction"
type: contract
action: "Modules\Media\Actions\Video\GetVideoDurationAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetVideoDurationAction durata video secondi FFprobe disco file mancante null"
---

# GetVideoDurationAction

Restituisce la durata in secondi di un video sul disco. Codice: `app/Actions/Video/GetVideoDurationAction.php:14-31`.

## Input

- `string $disk`, `string $file`.

## Output

- `?int`: `null` se il file non esiste; altrimenti la durata restituita da `getDurationInSeconds()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-VIDEO-DURATION-INV-1 | File assente → `null`, senza avviare FFmpeg. | — (non dimostrato) |

## Effetti collaterali

- Lettura del file tramite FFprobe. Nessuna scrittura.

## Errori

- Le eccezioni di FFmpeg su file corrotto si propagano.

## Non fa

- Non cachea il risultato.

## Prove

- `GET-VIDEO-DURATION-INV-1`: nessuno sul comportamento; `tests/Unit/Actions/MediaActionsCoverageTest.php` verifica solo classe e metodo.
