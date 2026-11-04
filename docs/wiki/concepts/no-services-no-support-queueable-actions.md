---
issues: []
discussions: []
<<<<<<< .merge_file_VR6YaE
title: "No Services / No Support — QueueableAction only"
=======
title: "No Services / No Support: QueueableAction only"
>>>>>>> .merge_file_ylPWez
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

<<<<<<< .merge_file_VR6YaE
# Media — Services/Support vietati: solo Actions
=======
# Media: Services/Support vietati: solo Actions
>>>>>>> .merge_file_ylPWez

## Regola

- **Mai** creare file in `app/Services/` o `app/Support/`
- **Sempre** `app/Actions/{Contexto}/FooAction.php`
- **Trait**: `use Spatie\QueueableAction\QueueableAction;`
- **Entrypoint**: unico metodo `execute(...)`
- **Chiamata**: `app(FooAction::class)->execute(...)`
- **Gruppi**: sottocartelle per attore/contesto

Lo streaming HTTP resta in `Actions/Stream/StreamVideoAction`: range response, headers e ciclo di vita
dello stream sono parte dell'use-case invocabile, non un servizio.

## Conversione

Vedi [no-app-support-queueable-actions.md](no-app-support-queueable-actions.md) per il mapping legacy → Action.
