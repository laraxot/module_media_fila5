---
title: "Contratto — ConvertVideoByConvertDataAction"
type: contract
action: "Modules\Media\Actions\Video\ConvertVideoByConvertDataAction"
module: Media
status: accepted
created: 2026-11-25
updated: 2026-11-26
qmd: "ConvertVideoByConvertDataAction conversione video ConvertData formato preset webm percorso"
---

# ConvertVideoByConvertDataAction

Converte un video secondo un `ConvertData` e restituisce il nome del file prodotto. Codice: `app/Actions/Video/ConvertVideoByConvertDataAction.php:16-56`;
il formato nasce in `app/Datas/ConvertData.php:53-80`. Nessun chiamante in `app/` (`rg ConvertVideoByConvertDataAction`: solo test).

## Input

- `ConvertData $data`: usa `disk`, `file`, `codec_video`, `codec_audio`, `bitrate`, `preset` e i metodi `exists()`, `getFFMpegFormat()`, `getConvertedFilename()`.

## Output

- `string`: `ConvertData::getConvertedFilename()`, cioe' `file` con l'ultimo `.mp4` sostituito da `.webm` (percorso sul disco, non URL).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| CONVERT-VIDEO-BY-CONVERT-DATA-INV-1 | Sorgente inesistente (`Storage::disk($data->disk)->exists($data->file)` falso) → `Exception('Il file non esiste')` prima di ogni elaborazione. | — (non dimostrato) |
| CONVERT-VIDEO-BY-CONVERT-DATA-INV-2 | Nome di uscita vuoto → `Exception('Il nome del file convertito non è stato specificato')`. | — (non dimostrato) |
| CONVERT-VIDEO-BY-CONVERT-DATA-INV-3 | Il formato applicato e' quello descritto da `ConvertData::getFFMpegFormat()`: WebM con codec audio, codec video e bitrate (kbps) del DTO e `-preset <ConvertData::$preset>` (non piu' un `ultrafast` fisso), passato a `inFormat()`; `save()` riceve solo il nome di uscita. | `CONVERT-VIDEO-BY-CONVERT-DATA-INV-3` |

## Effetti collaterali

1. `Storage::disk($data->disk)->exists($data->file)`.
2. FFmpeg in modo sincrono: `FFMpeg::fromDisk($data->disk)->open($data->file)->export()->inFormat($format)->save($file_new)`; scrive l'output sul disco `$data->disk`.

Nessun aggiornamento del database; la sorgente non viene cancellata.

## Errori

- `Exception` — sorgente mancante (INV-1) o nome di uscita vuoto (INV-2; dopo il controllo di esistenza e' raggiungibile solo con `file` vuoto).
- Le eccezioni di FFmpeg si propagano.

## Non fa

- Non registra progresso ne' stato (lo fa [ConvertVideoByMediaConvertAction](convert-video-by-media-convert-action.md) sul record `MediaConvert`).
- Limite noto: l'estensione di uscita e' sempre `webm` (`class_basename` del formato); se `file` non finisce in `.mp4`, `replaceLast` non cambia nulla e il nome di uscita coincide con quello della sorgente (`ConvertData.php:74-80`), senza alcun controllo.

## Prove

- `CONVERT-VIDEO-BY-CONVERT-DATA-INV-1`: nessun test; `tests/Unit/Actions/MediaActionsCoverageTest.php` verifica solo struttura.
- `CONVERT-VIDEO-BY-CONVERT-DATA-INV-2`: nessun test (stesso motivo).
- `CONVERT-VIDEO-BY-CONVERT-DATA-INV-3`: `tests/Unit/Actions/ConvertVideoFormatTest.php` («passa a inFormat() il formato con codec, bitrate e preset scelti»: FFMpeg simulato, controlla codec `libvpx-vp9`/`libvorbis`, 1000 kbps e `['-preset', 'veryfast']`).
