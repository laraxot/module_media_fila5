---
title: "Contratto — TestIamPoliciesAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\Aws\TestIamPoliciesAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "TestIamPoliciesAction diagnostica policy IAM accesso S3 headBucket listObjects"
---

# TestIamPoliciesAction

Verifica indirettamente le policy IAM provando `headBucket` e `listObjectsV2` sul bucket. Codice: `app/Actions/Diagnostic/Aws/TestIamPoliciesAction.php:10-53`.

## Input

- Nessuno. Usa `CreateFilesystemS3ClientAction` (client e bucket).

## Output

- Successo: `status=success` con `S3 Access`, `List Objects`, `Bucket Access` sempre `OK`.
- `AwsException`: `status=error`, `message` = `IAM policies error: <codice>`, `Solution` fissa.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TEST-IAM-POLICIES-INV-1 | Il successo richiede entrambe le chiamate (HEAD bucket e list con `MaxKeys=1`) senza eccezioni. | — (non dimostrato) |

## Effetti collaterali

- Due richieste di sola lettura ad AWS S3.

## Errori

- `AwsException` convertito in `status=error`.

## Non fa

- Non legge alcuna policy IAM: il nome è fuorviante, la verifica è solo operativa.
- I dettagli di successo sono costanti, non risultati di una verifica separata.

## Prove

- `TEST-IAM-POLICIES-INV-1`: nessuno.
