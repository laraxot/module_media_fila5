---
title: "Contratto — TestCloudFrontSignedUrlsAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\Aws\TestCloudFrontSignedUrlsAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "TestCloudFrontSignedUrlsAction diagnostica URL firmati CloudFront chiave privata configurazione"
---

# TestCloudFrontSignedUrlsAction

Controlla che siano presenti URL base, key pair e chiave privata CloudFront. Non firma alcun URL. Codice: `app/Actions/Diagnostic/Aws/TestCloudFrontSignedUrlsAction.php:10-53`.

## Input

- Nessuno. Legge `filesystems.cloudfront.{private_key,key_pair_id,url}`.

## Output

- `array`: `status`, `message`, `details`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TEST-CLOUD-FRONT-SIGNED-URLS-INV-1 | `success` solo se i tre valori sono truthy; altrimenti `error` con messaggio «Missing CloudFront configuration» (eccezione interna, catturata). | — (non dimostrato) |
| TEST-CLOUD-FRONT-SIGNED-URLS-INV-2 | La chiave privata non viene letta né validata: il dettaglio è la stringa fissa `Configured`. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- Eccezioni catturate e restituite come `status=error`.

## Non fa

- Nonostante il nome, non genera né verifica un URL firmato.
- Legge `filesystems.cloudfront`, che non è definito: il risultato è sempre `error` con la configurazione attuale. `services.cloudfront` (letta da `CloudFrontData`) non e' definito in `config/` (`grep -rIli cloudfront config Modules/*/config` senza risultati).

## Prove

- `TEST-CLOUD-FRONT-SIGNED-URLS-INV-1`: nessuno.
- `TEST-CLOUD-FRONT-SIGNED-URLS-INV-2`: nessuno.
