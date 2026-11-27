---
title: "Contratto — ParseSubtitleXmlAction"
type: contract
action: "Modules\Media\Actions\Subtitle\ParseSubtitleXmlAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "ParseSubtitleXmlAction parsing sottotitoli XML timing start end millisecondi righe sentence item"
---

# ParseSubtitleXmlAction

Legge un file di sottotitoli XML e produce una riga per ogni `item`, con inizio, fine, intervallo `HH:MM:SS,mmm` e testo. Codice: `app/Actions/Subtitle/ParseSubtitleXmlAction.php:16-102`.

## Input

- `string $filePath`: percorso del file. Solo l'estensione `xml` (minuscola o no) viene elaborata.

## Output

- `list<SubtitleRow>`: `sentence_i`, `item_i`, `start` e `end` in secondi (`ms / 1000`), `time`, `text`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PARSE-SUBTITLE-XML-INV-1 | Un file senza estensione o con estensione diversa da `xml` produce `[]` senza errore. | `PARSE-SUBTITLE-XML-INV-1` |
| PARSE-SUBTITLE-XML-INV-2 | Gli indici `sentence_i` e `item_i` partono da 0 e si resettano per ogni sentence. | `PARSE-SUBTITLE-XML-INV-2` |
| PARSE-SUBTITLE-XML-INV-3 | Il campo `time` ha la forma `HH:MM:SS,mmm,HH:MM:SS,mmm` e `start`/`end` sono in secondi (millisecondi / 1000). | `PARSE-SUBTITLE-XML-INV-3` |

## Effetti collaterali

- Lettura del file. Nessuna scrittura.

## Errori

- Un `item` senza attributi lancia `Exception` con un messaggio che contiene riga e classe.
- `Safe` lancia se il file non esiste o l'XML non è valido.

## Non fa

- Non legge SRT né altri formati: restituisce `[]`.
- Il `time` è calcolato dai secondi arrotondati al millisecondo.

## Prove

- `PARSE-SUBTITLE-XML-INV-1`: `tests/Unit/Actions/Subtitle/ParseSubtitleXmlActionTest.php` («a non xml extension yields no rows», «a path without extension yields no rows»).
- `PARSE-SUBTITLE-XML-INV-2`: stesso file: «every item becomes a row with normalised timings» (indici su `tests/Fixtures/subtitle.xml`).
- `PARSE-SUBTITLE-XML-INV-3`: stesso file: «every item becomes a row with normalised timings», «timecodes carry hours, minutes and milliseconds».
