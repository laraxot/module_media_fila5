---
title: "Contratto — GenerateTemporaryUploadPathAction"
type: contract
action: "Modules\Media\Actions\GenerateTemporaryUploadPathAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "contract GenerateTemporaryUploadPathAction media upload temporaneo percorso tmp MEDIA-PATH-INV"
---

# GenerateTemporaryUploadPathAction

Genera il percorso di storage sotto `tmp/` per originale, conversioni e immagini responsive di un `Media`. Decisione di fondo: [ADR 0001](../adr/0001-upload-temporanei-con-percorso-scopato-e-policy.md).
Codice: `app/Actions/GenerateTemporaryUploadPathAction.php:11-55`. Espone gli stessi tre metodi di [PathGenerator](path-generator.md) (`getPath()`, `getPathForConversions()`, `getPathForResponsiveImages()`) senza dichiararne `implements`.

Nessun chiamante in `app/` (`rg GenerateTemporaryUploadPathAction`): la usano solo i test (`tests/Unit/Support/TemporaryUploadPathGeneratorTest.php`, `tests/Unit/MediaFilamentAndActionsTest.php`, `tests/Unit/MediaGapCloserCoverageTest.php`).

## Input

- `Media $media`: servono solo `id` (chiave) e `uuid`.
- `string $purpose`: `original` (default), `conversion`, `responsive`; qualsiasi altro valore e' trattato come `original`.

## Output

- `string`: `tmp/<md5(uuid+id)>/<md5(id+uuid+suffisso)>`; per `original` il percorso termina con `/`, per gli altri no.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| MEDIA-PATH-INV-1 | Il percorso dipende solo da `uuid` e `id` del media, mai dal nome file fornito dal client. | — (non dimostrato) |
| MEDIA-PATH-INV-2 | Originale, conversione e responsive dello stesso media hanno tre percorsi distinti e condividono la stessa cartella base. | `MEDIA-PATH-INV-2` |
| MEDIA-PATH-INV-3 | Il percorso originale termina con `/`. | `MEDIA-PATH-INV-3` |
| MEDIA-PATH-INV-4 | Una chiave primaria intera e' accettata (`Assert::scalar`). | `MEDIA-PATH-INV-4` |

## Effetti collaterali

- Nessuno: non scrive su disco ne' su database.

## Errori

- `InvalidArgumentException` di Webmozart Assert se la chiave del media non e' scalare.

## Non fa

- Non e' un controllo di accesso e non offusca in modo sicuro: usa `md5`, voce elencata come debito `security` in `tests/Arch/debt.php`. L'accesso e' governato da `MediaPolicy` / `TemporaryUploadPolicy`.
- Non crea cartelle ne' pulisce i temporanei (la pulizia resta esplicita, come da ADR).
- Divergenza nota: `Actions/TemporaryUpload/GetTemporaryUploadPathAction.php` calcola lo stesso percorso con `Assert::string($media->getKey())`; per `Modules\Media\Models\Media` non si manifesta, perche' `casts()` (`Media.php:144`) restituisce `id` come stringa.

## Prove

- `MEDIA-PATH-INV-1`: parziale: `tests/Unit/Support/TemporaryUploadPathGeneratorTest.php` («separates two media that share the uuid but not the key») prova la dipendenza da `id`; nessun test varia il nome file per mostrare che non conta.
- `MEDIA-PATH-INV-2`: stesso file: «keeps the three paths distinct for the same media», «shares the base path across the three variants of the same media».
- `MEDIA-PATH-INV-3`: stesso file: «closes the original path with a slash».
- `MEDIA-PATH-INV-4`: stesso file: «accepts the integer primary key the model actually declares».
