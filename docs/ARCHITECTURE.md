---
<<<<<<< HEAD
<<<<<<< .merge_file_hwGdsT
=======
<<<<<<< .merge_file_O62LyX
title: "Architecture: Media Module (bridge)"
type: architecture
tags: [module, architecture, media, storage, bridge]
created: 2026-08-04
updated: 2026-09-17
---
# Media Module — Architecture (bridge)

Questo file è un bridge. La documentazione architetturale canonica è **[architecture.md](architecture.md)**.

La versione precedente di questo file descriveva classi (`MediaCollections`, `MediaItem`,
`UploadMediaAction`, `ProcessMediaAction`, `DeleteMediaAction`, `CollectionResource`) che non
esistono in `Modules/Media/app/` — verificato durante l'audit documentazione del 2026-09-17.
Il contenuto reale, verificato contro il codice, vive in `architecture.md`.
=======
>>>>>>> .merge_file_Ig3mqL
=======
>>>>>>> laraxot/dev
title: "Architecture: Media Module"
type: architecture
tags: [module, architecture, media, storage]
created: 2026-08-04
updated: 2026-08-04
---
# Media Module — Architecture

## Purpose
Media module provides file handling, storage, and processing infrastructure for the Laraxot ecosystem. Manages uploads, transformations, and media metadata.

## Core Components

**Models:**
- `Media` — Primary media model (spatie/laravel-medialibrary)
- `MediaCollections` — Collection definitions
- `MediaItem` — Extended media metadata

**Actions:**
- `UploadMediaAction` — Primary entrypoint for file uploads
- `ProcessMediaAction` — Image/video processing pipeline
- `DeleteMediaAction` — Cleanup associated files

**Filament Resources:**
- `MediaResource` — Browse and manage media library
- `CollectionResource` — Manage media collections

## Database Schema
- `media` table: id, model_type, model_id, collection_name, name, file_name, mime_type, size, url, custom_properties

## Design Decisions
| Decision | Rationale |
|----------|-----------|
| Spatie MediaLibrary | Battle-tested, handles transformations |
| Custom collections | Separate by media type/use case |
| Lazy loading | Optimize performance for large libraries |

## Integration Points
**Depends On:** Xot module (BaseModel), Laravel Storage
**Depended On By:** Activity, Lang, PDF generation

## Quality Gates
- **PHPStan L10**: Pending verification
- **Storage**: Tested with local/S3 drivers
<<<<<<< HEAD
<<<<<<< .merge_file_hwGdsT
=======
>>>>>>> .merge_file_Ckojel
>>>>>>> .merge_file_Ig3mqL
=======
>>>>>>> laraxot/dev
