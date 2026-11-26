---
title: "Contratto — ConvertVideoByMediaConvertAction"
type: contract
action: "Modules\Media\Actions\Video\ConvertVideoByMediaConvertAction"
module: Media
status: accepted
created: 2026-11-25
updated: 2026-11-26
qmd: "ConvertVideoByMediaConvertAction conversione video MediaConvert progresso percentuale record"
---

# ConvertVideoByMediaConvertAction

Converte un video secondo `ConvertData`, aggiorna il record `MediaConvert` con il progresso e ne registra la fine con `percentage = 100`.
Codice: `app/Actions/Video/ConvertVideoByMediaConvertAction.php:18-68`.

Chiamante: `Filament/Resources/MediaConvertResource/Tables/MediaConvertsTable.php:76` (azione di tabella `convert`, accodata con `dispatch(new ActionJob(...))`).

## Input

- `ConvertData $data`: come in [ConvertVideoByConvertDataAction](convert-video-by-convert-data-action.md).
- `MediaConvert $record`: il record da aggiornare. Il percorso di uscita e' `$record->converted_file`, un accessor calcolato da `MediaConvertMutator::getConvertedFile()`
  (`app/Models/Traits/MediaConvertMutator.php`): `<media.path>/conversions/<nome senza estensione>_<id>.<format>`, `null` se manca la relazione `media`.

## Output

- `string`: `$record->converted_file`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-1 | Ad ogni avanzamento riportato da FFmpeg (`onProgress`) il record riceve `percentage`, `remaining`, `rate` con un `update()` per tick. | — (non dimostrato) |
| CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-2 | A conversione riuscita (dopo `save()`) il record riceve un solo `update(['percentage' => 100])`: `onProgress` non scatta a 100 e la tabella `media_converts` non ha una colonna `status`. | `CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-2` |
| CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-3 | Sorgente inesistente o `converted_file` vuoto → `Exception` prima di avviare FFmpeg. | — (non dimostrato) |
| CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-4 | Il formato applicato e' `ConvertData::getFFMpegFormat()` (codec, bitrate e `-preset` da `ConvertData::$preset`), passato a `inFormat()`; `save()` riceve solo il percorso. | `CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-4` |

## Effetti collaterali

1. `Storage::disk($data->disk)->exists($data->file)`.
2. FFmpeg in modo sincrono su `FFMpeg::fromDisk($data->disk)`: per ogni tick `UPDATE media_converts SET percentage, remaining, rate`.
3. Scrive il file convertito sul disco.
4. `UPDATE media_converts SET percentage = 100`.

## Errori

- `Exception` — sorgente mancante o `converted_file` vuoto (INV-3).
- Le eccezioni di FFmpeg si propagano: il record resta all'ultimo `percentage` salvato (ne' 100 ne' un marcatore di errore).

## Non fa

- Non scrive uno stato di errore e non usa transazioni.
- `percentage = 100` e' l'unico segnale di fine; nessuna colonna `status` (colonne di progresso: `database/migrations/2022_01_01_000000_create_media_converts_table.php`).
- Limite noto, non verificato in esecuzione: la tabella costruisce `ConvertData::from(['file' => ..., 'disk' => ...])` (`MediaConvertsTable.php:69-72`) senza `format`, `codec_video`, `codec_audio`,
  `preset`, `bitrate`, che sono `string` non nullable senza default (`ConvertData.php:24-36`); nessun test copre quel percorso.

## Prove

- `CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-1`: nessun test; «passa a inFormat()…» simula `onProgress` ma non invoca mai la callback.
- `CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-2`: `tests/Unit/Actions/ConvertVideoFormatTest.php` («passa a inFormat() il formato con codec, bitrate e preset scelti»: `update` atteso una volta con `['percentage' => 100]`;
  il mock non impone l'ordine rispetto a `save()`, che si legge in `ConvertVideoByMediaConvertAction.php:60-64`).
- `CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-3`: nessun test; `MediaActionsCoverageTest` verifica solo struttura.
- `CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-4`: stesso test di INV-2 (controlla bitrate 1000 e `['-preset', 'veryfast']`; i codec sono controllati dal test gemello di `ConvertVideoByConvertDataAction`, stesso `getFFMpegFormat()`).
