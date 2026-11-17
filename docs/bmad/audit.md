---
title: "Audit BMAD — Media"
type: audit
status: review
updated: 2026-11-16
module: Media
qmd: "audit BMAD Media source-first qualità"
---

# Audit BMAD — Media

SSoT dettagliata: [audits/media-audit.md](./audits/media-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 127 |
| Test | 47 |
| Resources | 3 |
| Actions | 51 |
| Services | 0 |
| Policy `return true` | 2 |
| Marker | 0 |

## Lo scopo in una frase **Media custodisce i file che fanno da prova a una decisione, e li rende utilizzabili nei formati che servono senza che il dominio sappia nulla di dischi e conversioni.**

## Gate

- PHPStan modulo / `Modules`: 0 errori (verifica 2026-11-16).
- Pest: da eseguire in ambiente testing non produttivo.
- Security/runtime: story figlie su finding P0/P1 dell'audit dettagliato.
