---
title: "Contratto — UpdateModelSubtitleFieldAction"
type: contract
action: "Modules\Media\Actions\Subtitle\UpdateModelSubtitleFieldAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "UpdateModelSubtitleFieldAction salva testo sottotitoli su campo modello update fillable"
---

# UpdateModelSubtitleFieldAction

Estrae il testo di un sottotitolo e lo salva in un campo del modello. Codice: `app/Actions/Subtitle/UpdateModelSubtitleFieldAction.php:10-29`.

## Input

- `Model $model`: il modello da aggiornare.
- `string $filePath`: file XML di sottotitoli.
- `string $fieldName = 'txt'`: campo di destinazione.

## Output

- `Model`: lo stesso modello dopo `update()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| UPDATE-MODEL-SUBTITLE-FIELD-INV-1 | Il valore salvato è quello restituito da `ExtractSubtitlePlainTextAction`. | `UPDATE-MODEL-SUBTITLE-FIELD-INV-1` |

## Effetti collaterali

- Un `UPDATE` sul modello tramite `update()` (eventi Eloquent inclusi).

## Errori

- Le eccezioni di `ExtractSubtitlePlainTextAction` si propagano.

## Non fa

- Se `$fieldName` non è `$fillable` il valore è scartato in silenzio, oppure lancia se `preventSilentlyDiscardingAttributes` è attivo (dipende dal modello, non verificato qui).
- Non controlla `$fieldName`.

## Prove

- `UPDATE-MODEL-SUBTITLE-FIELD-INV-1`: `tests/Unit/Actions/Subtitle/SubtitleTextActionsTest.php` («the plain text is stored on the requested model field»).
