---
title: "Contratto — TestBucketPermissionsAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\S3\TestBucketPermissionsAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "TestBucketPermissionsAction diagnostica permessi bucket S3 list put get delete oggetto test"
---

# TestBucketPermissionsAction

Prova in sequenza i permessi del bucket: list, put, get, delete di un oggetto di prova. Codice: `app/Actions/Diagnostic/S3/TestBucketPermissionsAction.php:13-118`.

Chiamante: `Filament/Clusters/Test/Pages/S3Test.php:407`.

## Input

- `string $testKeyPrefix = 'test-permissions-'`: prefisso della chiave di prova (aggiunge `time()` e `.txt`).

## Output

- `array`: `title` (`🔒 S3 Permissions`), `status`, `data` con `ListBucket`, `PutObject`, `GetObject`, `DeleteObject` (✅ OK o ❌ codice). Se la put fallisce, get e delete sono `Skipped`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TEST-BUCKET-PERMISSIONS-INV-1 | Se nessuna eccezione esce, lo `status` è sempre `success`, anche quando una probe fallisce: `success` indica solo che la diagnostica è stata completata. | — (non dimostrato) |
| TEST-BUCKET-PERMISSIONS-INV-2 | Se la put fallisce, get e delete non vengono provate. | — (non dimostrato) |

## Effetti collaterali

- Scrive un oggetto reale (`ACL private`) nel bucket, poi prova get e delete. Se la delete fallisce l'oggetto resta.

## Errori

- Qualsiasi `Exception` è catturata e restituita come `status=error` con il messaggio in `data.Error`.

## Non fa

- Non legge policy o IAM: prova solo le operazioni.
- Duplica la logica di `Aws/TestS3PermissionsAction` e `Aws/TestS3FileOperationsAction` con un'altra forma di output.

## Prove

- `TEST-BUCKET-PERMISSIONS-INV-1`: nessuno.
- `TEST-BUCKET-PERMISSIONS-INV-2`: nessuno.
