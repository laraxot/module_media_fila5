---
title: "metodi duplicati analisi"
type: note
created: 2026-09-26
updated: 2026-09-26
qmd: "metodi duplicati analisi"
issues: []
discussions: []
module: Media
topic: METODI_DUPLICATI_ANALISI
tags: [metodi-duplicati, refactoring]
canonical: ../../../Themes/One/docs/shared-components/METODI_DUPLICATI_ANALISI.md
---

# Metodi Duplicati — Analisi Media

Elenco dei metodi duplicati (cross-file e cross-modulo) che coinvolgono il modulo **Media**, estratti dal report globale generato da `/tmp/metodi_duplicati_domain_report.md`.

## Metodo: `getFormActions` (14 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Media, Pdnd, Ptv, Sigma, User, Xot

**File in Media:**

- `./laravel/Modules/Media/app/Filament/Clusters/Test/Pages/S3Test.php`

[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]

---

## Metodo: `before` (14 occorrenze)

**Moduli coinvolti:** Activity, Gdpr, Job, Lang, Media, Performance, Progressioni, Setting, Sigma, Tenant, UI, User, Xot

- `./laravel/Modules/Media/app/Models/Policies/MediaBasePolicy.php`

[Riflessione: Presente in 13 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]

---

## Metodo: `__invoke` (14 occorrenze)

**Moduli coinvolti:** Media, User

- `./laravel/Modules/Media/app/Http/Controllers/ConvertController.php`

[Riflessione: Presente in 3 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]

---

## Metodo: `getModel` (13 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Media, Notify, Ptv, User, Xot

- `./laravel/Modules/Media/app/Services/SubtitleService.php`

---

## Metodo: `getHeaderWidgets` (13 occorrenze)

**Moduli coinvolti:** Job, Media, Notify, Ptv, UI, User, Xot

- `./laravel/Modules/Media/app/Filament/Resources/MediaConvertResource/Pages/ListMediaConverts.php`
- `./laravel/Modules/Media/app/Filament/Resources/MediaResource/Pages/ViewMedia.php`

---

## Metodo: `get` (11 occorrenze)

**Moduli coinvolti:** Lang, Media, Notify, Seo, Xot

---

## Metodo: `trans` (8 occorrenze)

**Moduli coinvolti:** Lang, Media, Tenant, Xot

- `./laravel/Modules/Media/app/Filament/Actions/AddAttachmentAction.php`
- `./laravel/Modules/Media/app/Filament/Resources/HasMediaResource/Actions/AddAttachmentAction.php`

[Riflessione: Presente in 4 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]

---

## Metodo: `sendEmail` (7 occorrenze)

**Moduli coinvolti:** Media, Notify

[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]

---

## Metodo: `rules` (6 occorrenze)

**Moduli coinvolti:** Job, Media, Performance, Progressioni, Sigma

- `./laravel/Modules/Media/app/Http/Requests/CreateTemporaryUploadFromDirectS3UploadRequest.php`

[Riflessione: Presente in 5 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]

---

## Metodo: `getInstance` (6 occorrenze)

**Moduli coinvolti:** Media, Notify, Xot

---

## Metodo: `messages` (5 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Job, Media, Progressioni

---

## Metodo: `message` (4 occorrenze)

**Moduli coinvolti:** Media, Performance, User, Xot

- `./laravel/Modules/Media/app/Rules/FileExtensionRule.php`

---

## Metodo: `getPath` (4 occorrenze)

- `./laravel/Modules/Media/app/Contracts/PathGenerator.php`
- `./laravel/Modules/Media/app/Support/TemporaryUploadPathGenerator.php`

---

## Metodo: `begin` (4 occorrenze)

**Moduli coinvolti:** Job, Media, Xot

- `./laravel/Modules/Media/app/Filament/Resources/MediaResource/Widgets/ConvertWidget.php`

---

## Metodo: `passes` (3 occorrenze)

**Moduli coinvolti:** Media, Performance, Xot

---

## Metodo: `getContent` (3 occorrenze)

---

## Metodo: `creator` (3 occorrenze)

**Moduli coinvolti:** Media, Xot

- `./laravel/Modules/Media/app/Models/Media.php`

---

## Metodo: `test_s3_permissions` (2 occorrenze)

**Moduli coinvolti:** Media

- `./laravel/Modules/Media/app/Filament/Clusters/Test/Pages/AwsTest.php`
- `./laravel/Modules/Media/app/Filament/Clusters/Test/Pages/S3Test.php`

[Riflessione: Duplicato interno al modulo Media — valutare estrazione in trait di modulo o classe base]

---

## Metodo: `test_s3_connection` (2 occorrenze)

---

## Metodo: `supportedMimeTypes` (2 occorrenze)

- `./laravel/Modules/Media/app/Conversions/ImageGenerators/PowerPoint.php`
- `./laravel/Modules/Media/app/Conversions/VideoGenerators/Webm.php`

---

## Metodo: `supportedExtensions` (2 occorrenze)

---

## Metodo: `requirementsAreInstalled` (2 occorrenze)

---

## Metodo: `registerMediaConversions` (2 occorrenze)

**Moduli coinvolti:** Media, Rating

- `./laravel/Modules/Media/app/Models/TemporaryUpload.php`

---

## Metodo: `image` (2 occorrenze)

- `./laravel/Modules/Media/database/factories/MediaFactory.php`

---

## Metodo: `getPathForResponsiveImages` (2 occorrenze)

---

## Metodo: `getPathForConversions` (2 occorrenze)

---

## Metodo: `getHeight` (2 occorrenze)

- `./laravel/Modules/Media/app/Filament/Infolists/VideoEntry.php`

---

## Metodo: `getDiskName` (2 occorrenze)

- `./laravel/Modules/Media/app/Filament/Infolists/VideoEntry.php`
- `./laravel/Modules/Media/app/Models/TemporaryUpload.php`

---

## Metodo: `from` (2 occorrenze)

- `./laravel/Modules/Media/app/Support/Ffmpeg/MediaExporterResolver.php`

---

## Metodo: `formHandlerCallback` (2 occorrenze)

---

## Metodo: `convert` (2 occorrenze)

---

## Metodo: `clearResults` (2 occorrenze)

**Moduli coinvolti:** Media, Pdnd

---

## Riflessioni per Media

- **Totale metodi duplicati che coinvolgono Media:** 32
- **Di cui cross-modulo:** 22
- **Di cui interni al modulo:** 10

### Pattern di riflessione

- **refactoring in trait/classe base/helper:** 26 metodi
- **altro:** 6 metodi

### Moduli con maggiori duplicazioni incrociate

- **Xot:** 28 metodi in comune
- **User:** 25 metodi in comune
- **Notify:** 14 metodi in comune
- **Job:** 8 metodi in comune
- **Ptv:** 6 metodi in comune
- **Performance:** 6 metodi in comune
- **Lang:** 5 metodi in comune
- **IndennitaResponsabilita:** 4 metodi in comune
- **Sigma:** 3 metodi in comune
- **Progressioni:** 3 metodi in comune

---
_Report generato automaticamente — fonte: `/tmp/metodi_duplicati_domain_report.md`_
