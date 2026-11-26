---
title: "La visibilità dei media segue il record owner (copia senza numero)"
type: decision
status: superseded
superseded_by: 0004-media-visibility-follows-owner.md
created: 2026-11-23
updated: 2026-11-26
module: Media
decision-makers: [Media]
---

# La visibilità dei media segue il record owner

> Superato da [0004-media-visibility-follows-owner](0004-media-visibility-follows-owner.md): stesso testo, ripreso con il
> numero d'ordine degli altri ADR. Il file resta per non rompere i link esistenti; la proposta e' di eliminarlo (vedi indice).

## Contesto

Gli allegati possono essere temporanei, privati, condivisi o pubblici e non costituiscono un dominio autonomo.

## Driver della decisione

- Evitare esposizione involontaria di dati allegati.

## Alternative scartate

- Rendere ogni upload pubblico per default.
- Delegare l'autorizzazione alla sola estensione MIME.

## Decisione

Media valida e conserva file tramite i contratti del record ospitante; ownership e policy del dominio owner determinano la visibilità.

## Conseguenze

Gli allegati rispettano il contesto applicativo; ogni integrazione deve verificare ownership, MIME, dimensione e storage.

## Conferma

Vedi la sezione «Conferma» e lo «Stato attuale» di [0004](0004-media-visibility-follows-owner.md): oggi nessuna conferma automatica.
