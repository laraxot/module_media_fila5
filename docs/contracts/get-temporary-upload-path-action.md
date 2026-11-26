---
title: "Contratto — GetTemporaryUploadPathAction"
type: contract
action: "Modules\Media\Actions\TemporaryUpload\GetTemporaryUploadPathAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetTemporaryUploadPathAction percorso upload temporaneo originale tmp md5 chiave intera Assert"
---

# GetTemporaryUploadPathAction

Calcola il percorso `tmp/` dell'upload originale di un media. Codice: `app/Actions/TemporaryUpload/GetTemporaryUploadPathAction.php:11-29`.

## Input

- `Media $media`: servono `uuid` e la chiave primaria.

## Output

- `string`: `tmp/<md5(uuid+id)>/<md5(id+uuid+'original')>/`, con slash finale.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-TEMPORARY-UPLOAD-PATH-INV-1 | Per una chiave stringa il risultato è identico a `GenerateTemporaryUploadPathAction::execute($media, 'original')`. | — (non dimostrato) |
| GET-TEMPORARY-UPLOAD-PATH-INV-2 | Se `getKey()` non e' una stringa `Assert::string` lancia `InvalidArgumentException`; per `Modules\Media\Models\Media` non accade, perche' `casts()` (`Media.php:144`) restituisce `id` come stringa. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `Webmozart\Assert` per chiave non stringa (vedi INV-2).

## Non fa

- Non crea cartelle né pulisce i temporanei.
- `md5` non è una funzione di sicurezza: l'Action è nel debito `security` di `tests/Arch/debt.php`.

## Prove

- `GET-TEMPORARY-UPLOAD-PATH-INV-1`: nessuno esplicito.
- `GET-TEMPORARY-UPLOAD-PATH-INV-2`: nessuno. Divergenza documentata in `generate-temporary-upload-path-action.md`.
