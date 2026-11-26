---
title: "Contratto — GetVideoScreenshotAction"
type: contract
action: "Modules\Media\Actions\Video\GetVideoScreenshotAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetVideoScreenshotAction screenshot video stub backoff nessun execute non implementata"
---

# GetVideoScreenshotAction

Classe senza logica: dichiara solo la proprietà `$backoff = 3` e usa il trait `QueueableAction`. Codice: `app/Actions/Video/GetVideoScreenshotAction.php:12-27`.

## Input

- Nessuno.

## Output

- Nessuno.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-VIDEO-SCREENSHOT-INV-1 | La classe non espone `execute()`: una chiamata diretta fallisce con `Call to undefined method`. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `Error` di PHP alla chiamata di `execute()`.

## Non fa

- Non genera screenshot. Nessun chiamante in `app/`, `Modules/` o `config/` (verificato con grep): è uno stub.

## Prove

- `GET-VIDEO-SCREENSHOT-INV-1`: `tests/Unit/Actions/MediaActionsCoverageTest.php` verifica solo la proprietà `backoff`.
