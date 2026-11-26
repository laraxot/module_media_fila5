---
title: "Contratto — ExtractSubtitlePlainTextAction"
type: contract
action: "Modules\Media\Actions\Subtitle\ExtractSubtitlePlainTextAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "ExtractSubtitlePlainTextAction estrae testo semplice sottotitoli XML sentence item"
---

# ExtractSubtitlePlainTextAction

Estrae il testo di un file di sottotitoli XML concatenando gli `item` di ogni `sentence`. Codice: `app/Actions/Subtitle/ExtractSubtitlePlainTextAction.php:13-44`.

## Input

- `string $filePath`: percorso del file XML.

## Output

- `string`: testo degli item in ordine, ognuno seguito da uno spazio (nessun `trim`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| EXTRACT-SUBTITLE-PLAIN-TEXT-INV-1 | Si leggono solo i percorsi `annotation/type/sentence/item`; altre strutture danno stringa vuota. | — (non dimostrato) |
| EXTRACT-SUBTITLE-PLAIN-TEXT-INV-2 | Il testo e' la concatenazione degli `item` nell'ordine del file, ciascuno seguito da uno spazio (nessun `trim`). | `EXTRACT-SUBTITLE-PLAIN-TEXT-INV-2` |

## Effetti collaterali

- Nessuno: lettura del file.

## Errori

- `Safe\realpath` e `Safe\simplexml_load_string` lanciano se il file non esiste o l'XML non è valido.

## Non fa

- Non usa i tempi dei sottotitoli.
- Non rimuove lo spazio finale.

## Prove

- `EXTRACT-SUBTITLE-PLAIN-TEXT-INV-1`: nessun test sul caso di struttura XML diversa.
- `EXTRACT-SUBTITLE-PLAIN-TEXT-INV-2`: `tests/Unit/Actions/Subtitle/SubtitleTextActionsTest.php` («plain text joins every item of the subtitle file»: `'Buongiorno a tutti Arrivederci '`).
