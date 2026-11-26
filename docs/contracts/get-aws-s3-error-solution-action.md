---
title: "Contratto — GetAwsS3ErrorSolutionAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\Aws\GetAwsS3ErrorSolutionAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "ResolveAwsS3ErrorSolutionAction codice errore AWS S3 soluzione suggerita diagnostica"
---

# GetAwsS3ErrorSolutionAction

Traduce un codice di errore AWS S3 in un suggerimento testuale. Codice: `app/Actions/Diagnostic/Aws/GetAwsS3ErrorSolutionAction.php:9-34`.

Era `ResolveAwsS3ErrorSolutionAction`: rinominata in `Get*` dall'[ADR Xot 0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md); gli ID `RESOLVE-*` restano invariati (ID stabili). Il vecchio file `Diagnostic/Aws/ResolveAwsS3ErrorSolutionAction.php` e' un doppione senza chiamanti, da eliminare.

## Input

- `?string $errorCode`: codice AWS, oppure `null`.

## Output

- `string`: suggerimento. Mappa fissa di cinque codici (`SignatureDoesNotMatch`, `AccessDenied`, `NoSuchBucket`, `InvalidAccessKeyId`, `BucketRegionError`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| RESOLVE-AWS-S3-ERROR-SOLUTION-INV-1 | `null` restituisce il messaggio fisso «Unknown error - check AWS credentials and configuration». | `RESOLVE-AWS-S3-ERROR-SOLUTION-INV-1` |
| RESOLVE-AWS-S3-ERROR-SOLUTION-INV-2 | Un codice fuori mappa produce «Consult AWS documentation for error: <codice>». | `RESOLVE-AWS-S3-ERROR-SOLUTION-INV-2` |

## Effetti collaterali

- Nessuno.

## Errori

- Nessuno.

## Non fa

- Non chiama AWS e non verifica che il codice sia reale.

## Prove

- `RESOLVE-AWS-S3-ERROR-SOLUTION-INV-1`: `tests/Unit/Actions/DiagnosticActionsTest.php` («keeps AWS S3 error solution behavior»).
- `RESOLVE-AWS-S3-ERROR-SOLUTION-INV-2`: stesso test (codice `UnknownCode`; la mappa dei cinque codici e' provata solo per `AccessDenied`).
