---
<<<<<<< .merge_file_IejSEG
issues: []
discussions: []
title: "PathGenerator e PathGeneratorContract (interfacce)"
module: "Media"
type: concept
tags: [path, generator, contracts, interface]
created: 2026-07-14
updated: 2026-11-24
qmd: "path generator"
=======
title: "Contratto — PathGenerator e PathGeneratorContract (interfacce)"
type: contract
action: "Modules\Media\Contracts\PathGenerator"
module: Media
status: accepted
created: 2026-07-14
updated: 2026-11-26
qmd: "path generator interfaccia PathGeneratorContract Spatie DefaultPathGenerator"
>>>>>>> .merge_file_4Xlolr
---

# PathGenerator e PathGeneratorContract

<<<<<<< .merge_file_IejSEG
Interfacce in `app/Contracts/PathGenerator.php` e `app/Contracts/PathGeneratorContract.php`: firme identiche, tre metodi
che restituiscono la cartella di un `Modules\Media\Models\Media`.

| Metodo | Restituisce |
|---|---|
| `getPath(Media $media): string` | cartella del file originale |
| `getPathForConversions(Media $media): string` | cartella delle conversioni |
| `getPathForResponsiveImages(Media $media): string` | cartella delle immagini responsive |

Stato verificato (2026-11-24): nessuna classe del repo implementa o usa nessuna delle due interfacce. Il generatore di percorso
effettivo e' quello di Spatie configurato in `config/media-library.php` (`path_generator` =
`Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator`).

Per chi scrive codice nuovo: implementare l'interfaccia di Spatie; le due interfacce del modulo sono doppioni da eliminare,
non un modello da seguire. Un percorso generato non deve dipendere da input dell'utente (niente path traversal).
=======
Interfacce in `app/Contracts/PathGenerator.php` e `app/Contracts/PathGeneratorContract.php`: tre metodi che restituiscono la cartella di un
`Modules\Media\Models\Media`. Non sono un'Action: il contratto descrive cosa promettono le interfacce e dice che oggi nessuno le usa.

## Input

- `Media $media`: l'istanza del modello Media, per `getPath()`, `getPathForConversions()`, `getPathForResponsiveImages()`.

## Output

- `string`: cartella del file originale, delle conversioni, delle immagini responsive.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PATH-GENERATOR-INV-1 | `PathGenerator` e `PathGeneratorContract` dichiarano gli stessi tre metodi con la stessa firma `(Media): string`. | — (non dimostrato) |
| PATH-GENERATOR-INV-2 | Nessuna classe del repo implementa o usa le due interfacce (da `laravel/`: `rg -n 'Media\\Contracts\\' Modules Themes --glob '*.php'` senza risultati; le sole altre occorrenze del nome sono commenti di config e titoli di test): il generatore effettivo e' `Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator` (`config/media-library.php:106`, `config/local/fixcity/media-library.php:99`, percorsi da `laravel/`). | — (non dimostrato) |

## Effetti collaterali

- Nessuno: sono interfacce.

## Errori

- Nessuno.

## Non fa

- Non e' implementata da `GenerateTemporaryUploadPathAction`, che espone gli stessi tre metodi senza `implements` (vedi [generate-temporary-upload-path-action](generate-temporary-upload-path-action.md)).
- Le due interfacce sono doppioni da eliminare, non un modello per codice nuovo: chi scrive un generatore implementa quello di Spatie. Un percorso generato non deve dipendere da input dell'utente (niente path traversal).
- Una versione precedente della pagina citava `TemporaryUploadPathGenerator` e una pagina `support/temporary_upload_path_generator.md`: ne' la classe ne' la pagina esistono.

## Prove

- `PATH-GENERATOR-INV-1`, `-2`: nessun test; verifica per lettura di `app/Contracts/*.php` e con il comando `rg` indicato.
>>>>>>> .merge_file_4Xlolr
