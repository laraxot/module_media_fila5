---
title: "Contratto — AttachMediaAction"
type: contract
action: "Modules\Media\Actions\AttachMediaAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "AttachMediaAction stub vuoto nessun execute media allegato trait QueueableAction"
---

# AttachMediaAction

Classe vuota che usa solo il trait `QueueableAction`. Codice: `app/Actions/AttachMediaAction.php:12-20`.

## Input

- Nessuno: la classe non dichiara `execute()`.

## Output

- Nessuno.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ATTACH-MEDIA-INV-1 | La classe non espone `execute()`: una chiamata diretta fallisce con `Call to undefined method`, perché il trait definisce `execute()` solo sul proxy restituito da `onQueue()`. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `Error` di PHP (metodo inesistente) alla chiamata diretta di `execute()`.

## Non fa

- Non allega nulla a un modello. L'associazione reale tra file e record avviene in `SaveAttachmentsAction` (`addMedia()`).
- Nessun chiamante in `app/`, `Modules/` o `config/` (verificato con grep).
- Il docblock di file rimanda a laravel-ffmpeg, ma la classe non usa FFmpeg.

## Prove

- `ATTACH-MEDIA-INV-1`: nessun test: `tests/Unit/Actions/AttachMediaActionTest.php` istanzia la classe e verifica il trait, non l'assenza di `execute()`.
