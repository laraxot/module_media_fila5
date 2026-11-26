---
title: "Contratto — GetTemporaryUploadResponsivePathAction"
type: contract
action: "Modules\Media\Actions\TemporaryUpload\GetTemporaryUploadResponsivePathAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetTemporaryUploadResponsivePathAction percorso immagini responsive upload temporaneo tmp md5 chiave intera Assert"
---

# GetTemporaryUploadResponsivePathAction

Calcola il percorso `tmp/` delle immagini responsive di un upload temporaneo. Codice: `app/Actions/TemporaryUpload/GetTemporaryUploadResponsivePathAction.php:11-29`.

## Input

- `Media $media`: servono `uuid` e chiave.

## Output

- `string`: `tmp/<md5(uuid+id)>/<md5(id+uuid+'responsive')>`, senza slash finale.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-TEMPORARY-UPLOAD-RESPONSIVE-PATH-INV-1 | Con chiave stringa il risultato è identico a `GenerateTemporaryUploadPathAction::execute($media, 'responsive')`. | — (non dimostrato) |
| GET-TEMPORARY-UPLOAD-RESPONSIVE-PATH-INV-2 | Se `getKey()` non e' una stringa `Assert::string` lancia; per `Modules\Media\Models\Media` non accade (`Media.php:144`, `id` come stringa). | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `Webmozart\Assert` per chiave non stringa.

## Non fa

- Duplica il calcolo di `GenerateTemporaryUploadPathAction`.
- `md5` è nel debito `security` di `tests/Arch/debt.php`.

## Prove

- `GET-TEMPORARY-UPLOAD-RESPONSIVE-PATH-INV-1`: nessuno esplicito.
- `GET-TEMPORARY-UPLOAD-RESPONSIVE-PATH-INV-2`: nessuno.
