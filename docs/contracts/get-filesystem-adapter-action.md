---
title: "Contratto — GetFilesystemAdapterAction"
type: contract
action: "Modules\Media\Actions\Storage\GetFilesystemAdapterAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetFilesystemAdapterAction FilesystemAdapter disco Storage cast tipo mimeType url temporaryUrl"
---

# GetFilesystemAdapterAction

Restituisce un disco come `FilesystemAdapter`, il tipo che espone `mimeType()`, `url()` e `temporaryUrl()`. Codice: `app/Actions/Storage/GetFilesystemAdapterAction.php:12-35`.

Chiamanti: `Actions/Video/ConvertVideoAction.php:45`, `Actions/Stream/StreamVideoAction.php:81`, `Console/Commands/ConvertVideoCommand.php:50`, `Filament/Clusters/Test/Pages/S3Test.php:272`.

## Input

- `string $disk`: nome del disco.

## Output

- `FilesystemAdapter`: il disco richiesto.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-FILESYSTEM-ADAPTER-INV-1 | Un disco che non è `FilesystemAdapter` lancia `RuntimeException`; un adapter valido è restituito così com'è. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `RuntimeException`: «Il disco [...] non e' un FilesystemAdapter.»
- Un nome di disco non configurato fa lanciare `Storage::disk()` prima del controllo di tipo.

## Non fa

- Non crea dischi né verifica che il disco sia raggiungibile.

## Prove

- `GET-FILESYSTEM-ADAPTER-INV-1`: nessuno.
