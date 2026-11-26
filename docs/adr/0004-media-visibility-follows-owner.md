---
title: "La visibilità dei media segue il record owner"
type: decision
status: accepted
created: 2026-11-25
updated: 2026-11-26
module: Media
decision-makers: [Media]
qmd: "media visibility follows owner visibilità segue"
---

# La visibilità dei media segue il record owner

## Contesto

Gli allegati possono essere temporanei, privati, condivisi o pubblici e non costituiscono un dominio autonomo.

Domanda: chi decide se un file allegato e' visibile, il modulo Media o il record a cui e' allegato?

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

Nessuna conferma automatica oggi: `tests/Unit/MediaPolicyBehaviorTest.php` prova i permessi `media.*` della policy, non la
derivazione della visibilità dal record owner. Proposta: un test che, per un `Media` collegato a un record la cui policy
nega la lettura, fallisca se `MediaPolicy::view` risponde sì; fino ad allora, voce di review su ogni nuovo campo di upload.

## Stato attuale

Il codice di `Modules/Media/app` non deriva la visibilità dal record owner (verificato con `rg -n visibility app`):

- `app/Actions/GetAttachmentsSchemaAction.php:39` imposta `->visibility('public')` su ogni campo allegato, qualunque sia il record.
- `app/Filament/Actions/AddAttachmentAction.php:57` e `app/Filament/Resources/HasMediaResource/Actions/AddAttachmentAction.php:61`
  impostano invece `->visibility('private')`: due scelte fisse e opposte, non una regola.
- `app/Models/Policies/MediaPolicy.php:23-26` autorizza `view` con il solo permesso `media.view`, senza guardare il record owner.
- `app/Actions/Stream/StreamVideoAction.php:75-79` confronta `created_by` del media con l'utente (chi ha caricato, non chi possiede il
  record), e solo se riceve un `Media`.
- Il disco predefinito di Media Library e' `public` (`config/local/fixcity/media-library.php:34`).

Resta valida come direzione, non come comportamento: la visibilità oggi la sceglie ogni punto di ingresso. Nessun ADR la
sostituisce; la decisione se confermarla (e implementarla) o riscriverla spetta al proprietario del modulo.
