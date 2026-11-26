---
title: "Contratto — TestS3FileOperationsAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\Aws\TestS3FileOperationsAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "TestS3FileOperationsAction diagnostica upload download delete oggetto test S3 bucket"
---

# TestS3FileOperationsAction

Prova su S3 un ciclo completo: scrittura di un file di test, lettura, cancellazione. Codice: `app/Actions/Diagnostic/Aws/TestS3FileOperationsAction.php:10-63`.

## Input

- Nessuno. Il nome del file è `test-file-<timestamp>.txt`, il contenuto una stringa fissa.

## Output

- Successo: `status=success` con `Upload`, `Download`, `Delete` sempre `OK` e il nome del file di test.
- `AwsException`: `status=error`, `message` = `S3 file operations error: <codice>`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TEST-S3-FILE-OPERATIONS-INV-1 | Il successo richiede `putObject`, `getObject` e `deleteObject` senza eccezioni. | — (non dimostrato) |
| TEST-S3-FILE-OPERATIONS-INV-2 | Il contenuto letto non viene confrontato con quello scritto. | — (non dimostrato) |

## Effetti collaterali

- Scrive, legge ed elimina un oggetto nel bucket configurato. Nessun `try/finally`: se `getObject` o `deleteObject` falliscono dopo la scrittura, l'oggetto di test resta nel bucket.

## Errori

- `AwsException` convertito in array di errore.

## Non fa

- Non pulisce il file residuo in caso di errore parziale.
- Non valida il contenuto letto.

## Prove

- `TEST-S3-FILE-OPERATIONS-INV-1`: nessuno.
- `TEST-S3-FILE-OPERATIONS-INV-2`: nessuno.
