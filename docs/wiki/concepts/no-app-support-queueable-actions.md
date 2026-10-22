---
<<<<<<< .merge_file_5usMSl
title: "no app/Support — business logic in QueueableAction"
type: concept
tags: [media, actions, queueable-action, support, refactor]
created: 2026-07-12
updated: 2026-10-22
=======
title: "app/Support — adapters and primitives only"
type: concept
tags: [media, actions, queueable-action, support, refactor]
created: 2026-07-12
updated: 2026-10-20
>>>>>>> .merge_file_SGkBSO
qmd: "Media module no app Support TemporaryUploadPathGenerator MediaExporter QueueableAction"
issues:
  - "https://github.com/laraxot/platform/issues/372"
discussions:
  - "https://github.com/laraxot/platform/discussions/273"
related:
  - ../../../../../../docs/second-brain/process/no-app-support-queueable-actions.md
<<<<<<< .merge_file_5usMSl
  - ../../../../docs/wiki/rules/queueable-action-trait-mandatory.md
---

# no `app/Support/` — business logic in QueueableAction

## Scopo

Nel modulo Media **non** esiste più `app/Support/`.

## Migrazione (2026-07-12)

| Legacy `app/Support/` | Action |
|-----------------------|--------|
| `TemporaryUploadPathGenerator` (`TemporaryUploadPathGeneratorContract`) | `GenerateTemporaryUploadPathAction` (`purpose`: `original`, `conversion`, `responsive`) |
| `Ffmpeg/MediaExporterResolver` | `Ffmpeg/ResolveMediaExporterAction` (`from()` → `execute()`) |

## Note

- Nessun consumer PHP attivo al momento della migrazione; path generator pronto per binding Spatie MediaLibrary.
- `ResolveMediaExporterAction` normalizza il ritorno della fluent API FFmpeg.

## Collegamenti

- [queueable-action-trait-mandatory](../../../../docs/wiki/rules/queueable-action-trait-mandatory.md)
=======
  - ../../../../../../docs/wiki/rules/queueable-action-trait-mandatory.md
---

# `app/Support/` solo per adapter e primitive infrastrutturali

## Scopo

Nel modulo Media le use-case stanno in `app/Actions/` e usano
`Spatie\QueueableAction\QueueableAction`. `app/Support/` non contiene business
logic: ospita solo primitive infrastrutturali che non sono use-case.

## Migrazione (2026-07-12)

| Concern | Queueable Action |
|-----------------------|--------|
| Use-case di path temporanei | `GenerateTemporaryUploadPathAction` (`purpose`: `original`, `conversion`, `responsive`) |
| Use-case di risoluzione FFmpeg | `Ffmpeg/ResolveMediaExporterAction` (`from()` → `execute()`) |

## Note

- `TemporaryUploadPathGenerator` resta un path generator infrastrutturale richiesto dal contratto MediaLibrary; non è un use-case.
- `MediaExporterResolver` resta un adapter/runtime type guard della fluent API FFmpeg; non è un use-case.
- `StreamVideoAction` resta un’Action: range headers e gestione dello stream HTTP sono parte dell’operazione invocabile e non un servizio separato.

## Collegamenti

- [queueable-action-trait-mandatory](../../../../../../docs/wiki/rules/queueable-action-trait-mandatory.md)
>>>>>>> .merge_file_SGkBSO

## Wave 2026-10-22

| Legacy | Action |
|--------|--------|
| `TemporaryUploadPathGenerator` | `GenerateTemporaryUploadPathAction` |
| `MediaExporterResolver` | `Actions/Ffmpeg/ResolveMediaExporterAction` |
| Diagnostic AWS Support/* | `Actions/Diagnostic/Aws/*Action` |
