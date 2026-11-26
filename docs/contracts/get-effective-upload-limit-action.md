---
title: "Contratto — GetEffectiveUploadLimitAction"
type: contract
action: "Modules\Media\Actions\Upload\GetEffectiveUploadLimitAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetEffectiveUploadLimitAction limite upload effettivo byte PHP upload_max_filesize Livewire max campo"
---

# GetEffectiveUploadLimitAction

Calcola il numero massimo di byte che un upload temporaneo Livewire può davvero portare nella richiesta web. Codice: `app/Actions/Upload/GetEffectiveUploadLimitAction.php:10-61`.

Chiamanti: `Filament/Pages/SettingPage.php:30` (`maxValue` della dimensione massima degli allegati) e `Modules/Fixcity/resources/views/filament/forms/components/dc-file-upload.blade.php:25`. Perche': [ADR 0003](../adr/0003-effective-upload-limit-in-web-request.md).

## Input

- `?int $fieldMaxKb = null`: limite del campo, in kilobyte; `null` non lo applica.

## Output

- `int`: il minimo tra tre limiti in byte: 90% di `UploadedFile::getMaxFilesize()` (PHP), `livewire.temporary_file_upload.rules` (regola `max:` in kilobyte, default 12288) e il limite del campo.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-EFFECTIVE-UPLOAD-LIMIT-INV-1 | Il risultato non supera mai il limite PHP ridotto del 10% per il multipart. | `GET-EFFECTIVE-UPLOAD-LIMIT-INV-1` |
| GET-EFFECTIVE-UPLOAD-LIMIT-INV-2 | Senza regola `max:` in Livewire il default è 12288 KB. | — (non dimostrato) |
| GET-EFFECTIVE-UPLOAD-LIMIT-INV-3 | Un limite di campo piu' piccolo di quello di runtime vince (`execute(1)` = 1024 byte); uno piu' grande e' ignorato. | `GET-EFFECTIVE-UPLOAD-LIMIT-INV-3` |
| GET-EFFECTIVE-UPLOAD-LIMIT-INV-4 | La regola `max:` di `livewire.temporary_file_upload.rules` (array o stringa con `\|`) vince quando e' la piu' piccola. | `GET-EFFECTIVE-UPLOAD-LIMIT-INV-4` |

## Effetti collaterali

- Nessuno.

## Errori

- Nessuno.

## Non fa

- Non legge il limite di nginx (`client_max_body_size`): PHP non lo vede.
- Una regola `max:` con valore non numerico diventa `0` e il limite risultante è `0` (dubbio: nessun test lo copre).
- Va valutato dentro la richiesta web: la CLI può leggere un `php.ini` diverso.

## Prove

- `GET-EFFECTIVE-UPLOAD-LIMIT-INV-1`: `tests/Unit/Actions/Upload/GetEffectiveUploadLimitActionTest.php` («never promises more than the PHP runtime accepts», «keeps headroom for the multipart envelope»).
- `GET-EFFECTIVE-UPLOAD-LIMIT-INV-2`: nessuna prova esatta: «falls back to the Livewire default of 12 MB» asserisce solo `<= 12288 KB` (il limite PHP puo' essere piu' basso), quindi non dimostra il default.
- `GET-EFFECTIVE-UPLOAD-LIMIT-INV-3`: stesso file: «honours a field limit smaller than the runtime», «ignores a field limit larger than the runtime».
- `GET-EFFECTIVE-UPLOAD-LIMIT-INV-4`: stesso file: «honours the Livewire temporary upload rule» (due casi: array e stringa).
