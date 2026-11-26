---
title: "Contratto — GetVideoFrameContentAction"
type: contract
action: "Modules\Media\Actions\Video\GetVideoFrameContentAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetVideoFrameContentAction fotogramma video contenuto cache file un'ora immagine placeholder fallback"
---

# GetVideoFrameContentAction

Restituisce il contenuto binario del fotogramma a un dato secondo, in cache per un'ora. Se FFmpeg fallisce restituisce un'immagine segnaposto. Codice: `app/Actions/Video/GetVideoFrameContentAction.php:17-55`.

## Input

- `string $disk_mp4`, `string $file_mp4`: video.
- `int $time`: secondo del fotogramma.

## Output

- `?string`: contenuto binario del frame; `''` se il file non esiste; contenuto di `img/video_not_exists.jpg` (disco `public_html`) se FFmpeg fallisce.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-VIDEO-FRAME-CONTENT-INV-1 | File assente → `''` senza avviare FFmpeg. | — (non dimostrato) |
| GET-VIDEO-FRAME-CONTENT-INV-2 | Il risultato, anche il placeholder, è salvato nel store `file` per 3600 secondi con chiave `Str::slug` di disco, file e secondo. | — (non dimostrato) |

## Effetti collaterali

- Scrittura nello store di cache `file`. Esecuzione FFmpeg quando la cache è vuota.

## Errori

- Qualsiasi `Exception` di FFmpeg è catturata senza log e sostituita dal placeholder.
- Se il placeholder manca sul disco, `get()` lancia.

## Non fa

- Un errore transitorio di FFmpeg viene servito come placeholder e memorizzato per un'ora: nessun log, nessun ritento.
- Due percorsi che producono lo stesso slug (es. `a/b` e `a-b`) condividono la chiave di cache (dubbio, non verificato).

## Prove

- `GET-VIDEO-FRAME-CONTENT-INV-1`: `tests/Unit/Actions/MediaActionsCoverageTest.php` (solo classe e metodo).
- `GET-VIDEO-FRAME-CONTENT-INV-2`: nessuno.
