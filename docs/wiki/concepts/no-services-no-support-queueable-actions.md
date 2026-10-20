---
issues: []
discussions: []
title: "No Services — QueueableAction for use-cases"
type: concept
module: Media
tags: [media, services, support, actions, queueable-action, migration]
created: 2026-07-13
updated: 2026-07-13
qmd: "Media module Services and Support banned use app Actions QueueableAction policy"
related:
  - no-app-support-queueable-actions.md
  - ../../../Xot/docs/wiki/concepts/queueable-action-trait-mandatory.md
status: draft
---

# Media — Services vietati: use-case in QueueableAction

## Regola

- **Mai** creare file in `app/Services/` per business logic
- **Sempre** `app/Actions/{Contexto}/FooAction.php`
- **Trait**: `use Spatie\QueueableAction\QueueableAction;`
- **Entrypoint**: unico metodo `execute(...)`
- **Chiamata**: `app(FooAction::class)->execute(...)`
- **Gruppi**: sottocartelle per attore/contesto

## Eccezioni infrastrutturali

`app/Support/` resta ammesso solo per oggetti senza use-case di dominio:

- `Ffmpeg/MediaExporterResolver`: adapter/runtime type guard della fluent API FFmpeg;
- `TemporaryUploadPathGenerator`: path generator richiesto dall’infrastruttura MediaLibrary.

Lo streaming HTTP resta in `Actions/Stream/StreamVideoAction` perché è un use-case
invocabile, ma conserva l’infrastruttura necessaria per range response, headers e
stream resource lifecycle. Non trasformare questi adapter/primitive in servizi.

## Conversione

Vedi [no-app-support-queueable-actions.md](no-app-support-queueable-actions.md) per il mapping legacy → Action.
