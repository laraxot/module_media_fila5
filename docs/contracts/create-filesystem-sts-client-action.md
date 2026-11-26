---
title: "Contratto — CreateFilesystemStsClientAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\Aws\CreateFilesystemStsClientAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "CreateFilesystemStsClientAction diagnostica AWS STS client credenziali filesystems config"
---

# CreateFilesystemStsClientAction

Costruisce il client STS con le stesse credenziali e region del disco `s3`. Codice: `app/Actions/Diagnostic/Aws/CreateFilesystemStsClientAction.php:10-32`.

## Input

- Nessuno. Legge `filesystems.disks.s3.{region,key,secret}`.

## Output

- `StsClient` (versione `latest`, region default `eu-west-1`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| CREATE-FILESYSTEM-STS-CLIENT-INV-1 | Il client usa le stesse credenziali e la stessa region del client S3 costruito da `CreateFilesystemS3ClientAction`. | — (non dimostrato) |

## Effetti collaterali

- Nessuno: nessuna chiamata di rete alla costruzione.

## Errori

- Nessuno gestito.

## Non fa

- Non chiama `getCallerIdentity()`: lo fanno `Diagnostic/Aws/TestIamCredentialsAction` e `Diagnostic/S3/TestCredentialsAction`.

## Prove

- `CREATE-FILESYSTEM-STS-CLIENT-INV-1`: `tests/Unit/Actions/DiagnosticActionsTest.php` (solo tipo di ritorno).
