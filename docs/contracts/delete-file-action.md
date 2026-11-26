---
title: "Contratto — DeleteFileAction"
type: contract
action: "Modules\Media\Actions\S3\DeleteFileAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "DeleteFileAction S3 deleteObject cancellazione file errore array success delete marker"
---

# DeleteFileAction

Cancella un oggetto dal bucket e restituisce un array di esito. Non lancia. Codice: `app/Actions/S3/DeleteFileAction.php:10-58`.

## Input

- `string $key`: chiave dell'oggetto.

## Output

- Successo: `['success' => true, 'key', 'deleteMarker', 'versionId']`.
- Errore S3: `['success' => false, 'key', 'error' => messaggio, 'errorCode' => status HTTP]`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| DELETE-FILE-INV-1 | Ogni `S3Exception` diventa `success=false`: il chiamante deve leggere `success`. | — (non dimostrato) |
| DELETE-FILE-INV-2 | `deleteMarker` e `versionId` sono `false` e `null` quando il bucket non ha versioning. | — (non dimostrato) |

## Effetti collaterali

- Una richiesta DELETE su S3; sui bucket versionati aggiunge un delete marker. Log `info` o `error`.

## Errori

- `S3Exception` convertito nell'array di errore. Altre eccezioni si propagano.

## Non fa

- Non verifica che la chiave esista prima di cancellare.
- `errorCode` è lo status HTTP (intero), non il codice AWS.

## Prove

- `DELETE-FILE-INV-1`: nessun test che prova la regola: «S3 actions con Storage fake e path inesistente» (`tests/Unit/MediaCoverage100RemainingTest.php`) avvolge tutto in `try/catch (\Throwable)` e passa anche se l'Action lancia; `MediaActionsCoverageTest` verifica solo struttura.
- `DELETE-FILE-INV-2`: nessuno.
