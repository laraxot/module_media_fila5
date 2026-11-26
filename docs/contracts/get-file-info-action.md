---
title: "Contratto — GetFileInfoAction"
type: contract
action: "Modules\Media\Actions\S3\GetFileInfoAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetFileInfoAction S3 headObject metadati dimensione content type etag esistenza"
---

# GetFileInfoAction

Legge i metadati di un oggetto con `headObject`, senza scaricarlo. Codice: `app/Actions/S3/GetFileInfoAction.php:10-71`.

## Input

- `string $key`: chiave dell'oggetto.

## Output

- Successo: `exists=true` con `key`, `effectiveUri`, `contentLength`, `contentType`, `lastModified`, `etag`, `metadata` (valori `null` o `[]` se assenti).
- Errore S3: `exists=false` con `error` e `errorCode` (status HTTP).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-FILE-INFO-INV-1 | Il successo non scarica il corpo dell'oggetto. | — (non dimostrato) |
| GET-FILE-INFO-INV-2 | Ogni `S3Exception` diventa `exists=false`: anche un 403 risulta come «non esiste». | — (non dimostrato) |

## Effetti collaterali

- Una richiesta HEAD di sola lettura e una riga di log.

## Errori

- `S3Exception` convertito nell'array di esito.

## Non fa

- Non distingue «assente» da «negato» (vedi INV-2).

## Prove

- `GET-FILE-INFO-INV-1`: nessuno.
- `GET-FILE-INFO-INV-2`: stessa situazione di `DELETE-FILE-INV-1`: nessun test che prova la regola.
