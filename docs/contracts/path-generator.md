---
issues: []
discussions: []
title: "PathGenerator Interface"
module: "Media"
type: concept
tags: [path, generator]
created: 2026-07-14
updated: 2026-07-14
qmd: "path generator"
related:
  - "./webm.md"
<<<<<<< .merge_file_Y3ZBRN
=======
status: draft
>>>>>>> .merge_file_UMw10J
---
# PathGenerator Interface

## Descrizione
Questa interfaccia definisce il contratto per la generazione dei percorsi dei file media nel sistema, seguendo le best practices di Laraxot.

## Metodi Richiesti

### getPath(Media $media): string
- Genera il percorso per il file originale
- Parametri:
  - `$media`: L'istanza del modello Media
- Ritorna: Il percorso come stringa

### getPathForConversions(Media $media): string
- Genera il percorso per le conversioni del file
- Parametri:
  - `$media`: L'istanza del modello Media
- Ritorna: Il percorso come stringa

### getPathForResponsiveImages(Media $media): string
- Genera il percorso per le immagini responsive
- Parametri:
  - `$media`: L'istanza del modello Media
- Ritorna: Il percorso come stringa

## Implementazioni
<<<<<<< .merge_file_Y3ZBRN
- [TemporaryUploadPathGenerator](../support/temporary_upload_path_generator.md)
=======
- [TemporaryUploadPathGenerator](../support/temporary-upload-path-generator.md)
>>>>>>> .merge_file_UMw10J

## Best Practices
- Utilizzare tipizzazione stretta
- Documentare tutti i metodi con PHPDoc
- Mantenere i percorsi coerenti tra le implementazioni
- Garantire l'unicità dei percorsi generati

## Note di Sicurezza
- Validare sempre gli input
- Evitare path traversal
- Gestire correttamente i caratteri speciali

## Collegamenti
<<<<<<< .merge_file_Y3ZBRN
- [Documentazione Media Module](../module_media.md)
- [Gestione File](../file_management.md)
=======
- [Documentazione Media Module](../module-media.md)
- [Gestione File](../file-management.md)
>>>>>>> .merge_file_UMw10J

## Note di Manutenzione
- Aggiornare la documentazione quando si modificano i metodi
- Verificare che tutte le implementazioni rispettino il contratto
- Testare la generazione dei percorsi in diverse condizioni