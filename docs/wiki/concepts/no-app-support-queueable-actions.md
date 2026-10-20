---
title: "app/Support — adapters and primitives only"
type: concept
tags: [media, actions, queueable-action, support, refactor]
created: 2026-07-12
updated: 2026-10-20
qmd: "Media module no app Support TemporaryUploadPathGenerator MediaExporter QueueableAction"
issues:
  - "https://github.com/laraxot/platform/issues/372"
discussions:
  - "https://github.com/laraxot/platform/discussions/273"
related:
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
