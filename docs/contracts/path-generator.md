---
issues: []
discussions: []
title: "PathGenerator e PathGeneratorContract (interfacce)"
module: "Media"
type: concept
tags: [path, generator, contracts, interface]
created: 2026-07-14
updated: 2026-11-24
qmd: "path generator"
---

# PathGenerator e PathGeneratorContract

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
