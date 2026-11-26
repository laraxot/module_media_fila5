---
title: "Contratto — GetCloudFrontSignedUrlAction"
type: contract
action: "Modules\Media\Actions\CloudFront\GetCloudFrontSignedUrlAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetCloudFrontSignedUrlAction URL firmato CloudFront chiave privata scadenza minuti media"
---

# GetCloudFrontSignedUrlAction

Genera un URL CloudFront firmato per una chiave S3. Codice: `app/Actions/CloudFront/GetCloudFrontSignedUrlAction.php:11-38`.

Chiamanti (`rg GetCloudFrontSignedUrlAction`): `Filament/Tables/Columns/CloudFrontIconMediaColumn.php:57`, `Filament/Clusters/Test/Pages/S3Test.php:265`, `Actions/Diagnostic/S3/RunS3SaveTestAction.php:29`, `Actions/Diagnostic/S3/TestCloudFrontConnectionAction.php:42`.

## Input

- `string $key`: chiave dell'oggetto; gli slash iniziali sono rimossi (`ltrim`).
- `int $expiry = 30`: durata in **minuti** (moltiplicata per 60 in `GetCloudFrontSignedUrlAction.php:33`).

## Output

- `string`: URL firmato restituito da `CloudFrontClient::getSignedUrl()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-CLOUD-FRONT-SIGNED-URL-INV-1 | L'URL è `base_url` + `/` + chiave senza slash iniziali; la scadenza è `time() + expiry * 60`. | — (non dimostrato) |
| GET-CLOUD-FRONT-SIGNED-URL-INV-2 | Configurazione letta da `CloudFrontData::make()` (namespace `services.cloudfront`: `base_url`, `key_pair_id`, chiave privata, `region`). | — (non dimostrato) |

## Effetti collaterali

- Nessuna scrittura. Crea un `CloudFrontClient` a ogni chiamata; la firma è calcolata localmente con la chiave privata.

## Errori

- Le eccezioni del SDK AWS (chiave privata non valida, configurazione mancante) si propagano; l'Action non le gestisce.

## Non fa

- Non verifica che la chiave esista nel bucket.
- Non valida `$expiry`: valori zero o negativi producono URL senza controllo.
- Il tipo di chiave privata è gestito da `CloudFrontData::getPrivateKey()`, non qui.
- Limite noto: con la config attuale `services.cloudfront` non e' definito (`grep -rIli cloudfront config Modules/*/config` senza risultati): `CloudFrontData::make()` usa `Config::array()`, che lancia `InvalidArgumentException` prima di qualunque firma.

## Prove

- `GET-CLOUD-FRONT-SIGNED-URL-INV-1`: nessuno sul comportamento; `tests/Unit/Actions/MediaActionsCoverageTest.php` verifica solo classe e metodo `execute`.
- `GET-CLOUD-FRONT-SIGNED-URL-INV-2`: nessuno.
