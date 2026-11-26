---
title: "Contratto — GetTemporaryUploadConversionPathAction"
type: contract
action: "Modules\Media\Actions\TemporaryUpload\GetTemporaryUploadConversionPathAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetTemporaryUploadConversionPathAction percorso conversioni upload temporaneo tmp md5 chiave intera Assert"
---

# GetTemporaryUploadConversionPathAction

Calcola il percorso `tmp/` delle conversioni di un upload temporaneo. Codice: `app/Actions/TemporaryUpload/GetTemporaryUploadConversionPathAction.php:11-29`.

## Input

- `Media $media`: servono `uuid` e chiave.

## Output

- `string`: `tmp/<md5(uuid+id)>/<md5(id+uuid+'conversion')>`, senza slash finale.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-TEMPORARY-UPLOAD-CONVERSION-PATH-INV-1 | Con chiave stringa il risultato è identico a `GenerateTemporaryUploadPathAction::execute($media, 'conversion')`. | — (non dimostrato) |
| GET-TEMPORARY-UPLOAD-CONVERSION-PATH-INV-2 | Se `getKey()` non e' una stringa `Assert::string` lancia (il fratello `GenerateTemporaryUploadPathAction` usa `Assert::scalar`); per `Modules\Media\Models\Media` non accade, perche' `casts()` (`Media.php:144`) restituisce `id` come stringa. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `Webmozart\Assert` per chiave non stringa.

## Non fa

- Duplica il calcolo di `GenerateTemporaryUploadPathAction`; la versione corretta è quella.
- `md5` è nel debito `security` di `tests/Arch/debt.php`.

## Prove

- `GET-TEMPORARY-UPLOAD-CONVERSION-PATH-INV-1`: nessuno esplicito.
- `GET-TEMPORARY-UPLOAD-CONVERSION-PATH-INV-2`: nessuno.
