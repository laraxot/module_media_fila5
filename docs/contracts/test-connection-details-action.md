---
title: "Contratto — TestConnectionDetailsAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\S3\TestConnectionDetailsAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "TestConnectionDetailsAction diagnostica connessione S3 region bucket getBucketLocation mismatch"
---

# TestConnectionDetailsAction

Verifica il bucket con `headBucket`, legge la sua region con `getBucketLocation` e la confronta con la config. Codice: `app/Actions/Diagnostic/S3/TestConnectionDetailsAction.php:12-59`.

## Input

- Nessuno. Usa `CreateFilesystemS3ClientAction`.

## Output

- Successo: `status=success`, `data` con `Bucket Accessible`, `Bucket Region`, `Config Region`, `Region Match` (✅ o ⚠️).
- `AwsException`: `status=error` con `Error Code`, `Message`, `Solution`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TEST-CONNECTION-DETAILS-INV-1 | Una `LocationConstraint` vuota è letta come `us-east-1`. | — (non dimostrato) |
| TEST-CONNECTION-DETAILS-INV-2 | Un mismatch di region non cambia lo `status`: resta `success` con l'avviso nel `Region Match`. | — (non dimostrato) |

## Effetti collaterali

- Due richieste di sola lettura (`headBucket`, `getBucketLocation`).

## Errori

- `AwsException` convertito in `status=error`.

## Non fa

- Non confronta le credenziali né le policy.

## Prove

- `TEST-CONNECTION-DETAILS-INV-1`: nessuno.
- `TEST-CONNECTION-DETAILS-INV-2`: nessuno.
