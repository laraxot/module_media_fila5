---
title: "Contratto — TestCloudFrontConnectionAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\S3\TestCloudFrontConnectionAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "TestCloudFrontConnectionAction diagnostica connessione CloudFront URL firmato configurazione incompleta"
---

# TestCloudFrontConnectionAction

Controlla che la config CloudFront sia completa e genera un URL firmato di prova. Codice: `app/Actions/Diagnostic/S3/TestCloudFrontConnectionAction.php:11-83`.

## Input

- `string $testFile = 'test-file.txt'`: chiave usata per il URL di prova.

## Output

- Config incompleta: `status=error`, `Configuration = ❌ Incomplete`, `Missing` con i nomi dei valori assenti.
- Config completa e firma riuscita: `status=success`, `Sample URL` (primi 100 caratteri + `...`).
- Eccezione: `status=error` con `Error`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TEST-CLOUD-FRONT-CONNECTION-INV-1 | Senza `base_url`, `key_pair_id` o chiave privata non viene tentata nessuna firma. | — (non dimostrato) |
| TEST-CLOUD-FRONT-CONNECTION-INV-2 | Con config completa l'URL di prova è generato da `GetCloudFrontSignedUrlAction` con scadenza 5 minuti. | — (non dimostrato) |

## Effetti collaterali

- Nessuno: la firma è locale, nessuna richiesta HTTP a CloudFront.

## Errori

- Eccezioni catturate e restituite come `status=error`.

## Non fa

- Non apre alcuna connessione a CloudFront: l'URL non viene richiesto.
- Limite noto: con `services.cloudfront` non definito in `config/` risponde sempre «❌ Incomplete».

## Prove

- `TEST-CLOUD-FRONT-CONNECTION-INV-1`: nessuno.
- `TEST-CLOUD-FRONT-CONNECTION-INV-2`: nessuno.
