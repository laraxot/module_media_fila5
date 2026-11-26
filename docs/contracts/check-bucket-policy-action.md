---
title: "Contratto — CheckBucketPolicyAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\S3\CheckBucketPolicyAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "CheckBucketPolicyAction diagnostica policy bucket S3 NoSuchBucketPolicy JSON"
---

# CheckBucketPolicyAction

Legge la policy del bucket e la mostra formattata. Codice: `app/Actions/Diagnostic/S3/CheckBucketPolicyAction.php:14-63`.

## Input

- Nessuno. Usa `CreateFilesystemS3ClientAction`.

## Output

- Policy presente: `status=info`, `data` con `Policy Exists` e la policy in JSON indentato.
- `NoSuchBucketPolicy`: `status=info`, `Policy Exists = ℹ️ No (This is usually OK)`.
- Altro `AwsException`: `status=error`, `Error` (codice) e `Message`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| CHECK-BUCKET-POLICY-INV-1 | L'assenza di policy (`NoSuchBucketPolicy`) non è un errore. | — (non dimostrato) |
| CHECK-BUCKET-POLICY-INV-2 | Il JSON della policy viene decodificato e ricodificato con indentazione. | — (non dimostrato) |

## Effetti collaterali

- Una richiesta di sola lettura (`getBucketPolicy`).

## Errori

- `AwsException` convertito in `status=error`.
- JSON non valido: `Safe\json_decode` lancia un'eccezione che non viene catturata e si propaga.

## Non fa

- Non valuta la policy (nessun controllo di permessi effettivi).

## Prove

- `CHECK-BUCKET-POLICY-INV-1`: nessuno.
- `CHECK-BUCKET-POLICY-INV-2`: nessuno.
