---
title: "Contratto — BuildConfigDebugDataAction"
type: contract
action: "Modules\Media\Actions\Diagnostic\S3\BuildConfigDebugDataAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "BuildConfigDebugDataAction diagnostica S3 configurazione debug segreto mascherato presenza CloudFront"
---

# BuildConfigDebugDataAction

Compone il blocco «Configurazione» della diagnostica S3, mostrando i valori senza esporre i segreti. Codice: `app/Actions/Diagnostic/S3/BuildConfigDebugDataAction.php:9-44`.

## Input

- Nessuno. Legge `filesystems.disks.s3.*` e `services.cloudfront.*`.

## Output

- `array<string, mixed>`: `title` (`📋 Configuration`), `status=info`, `data` con chiave AWS troncata, presenza (✅/❌) di secret e chiave privata CloudFront, region, bucket, `AWS_USE_PATH_STYLE_ENDPOINT` (default `'false'`), URL e key pair CloudFront.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| BUILD-CONFIG-DEBUG-DATA-INV-1 | Il segreto AWS e la chiave privata CloudFront compaiono solo come presenza, mai come valore. | — (non dimostrato) |
| BUILD-CONFIG-DEBUG-DATA-INV-2 | La chiave di accesso è troncata a 8 caratteri più `...`. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- Nessuno.

## Non fa

- Non valida la configurazione.
- Legge CloudFront da `services.cloudfront`, mentre `Aws/GetAwsConfigSnapshotAction` e `Aws/TestCloudFrontConfigAction` leggono `filesystems.cloudfront` (non definito): le due diagnostiche danno risultati diversi.
- Limite noto: `services.cloudfront` non e' definito in `config/`: `CLOUDFRONT_*` risultano `null` e la chiave privata «❌ Missing».

## Prove

- `BUILD-CONFIG-DEBUG-DATA-INV-1`: nessuno.
- `BUILD-CONFIG-DEBUG-DATA-INV-2`: nessuno.
