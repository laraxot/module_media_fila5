---
title: "ADR — <decisione in una riga>"
type: decision
status: proposed            # proposed | accepted | rejected | deprecated | superseded
superseded_by:              # solo se status: superseded, nome file dell'ADR che lo sostituisce
created: AAAA-MM-GG
updated: AAAA-MM-GG
module: Media
decision-makers: [<chi decide>]
qmd: "0000 template adr MADR NNNN-slug"
---

<!-- File: docs/adr/NNNN-titolo-con-trattini.md · formato MADR breve in italiano.
     Il basename inizia con NNNN- (es. 0006-...). Eccezioni: README.md, INDEX.md, index.md, 0000-template.md.
     Scrivi un ADR solo se la decisione e' difficile da invertire, sorprendente e frutto di un trade-off reale.
     Le intestazioni qui sotto sono quelle controllate da Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php. -->

# <!-- Titolo: il problema risolto e la soluzione scelta -->

## Contesto

<!-- 2-3 frasi con i fatti e i vincoli. Chiudi con la domanda a cui la decisione risponde. -->

## Driver della decisione

- <!-- forza o vincolo che pesa sulla scelta -->

## Alternative scartate

- <!-- opzione scartata e motivo -->

## Decisione

<!-- Cosa si fa, in concreto, e dove sta nel codice (file e riga). -->

## Conseguenze

- Buono: <!-- ... -->
- Cattivo: <!-- ... -->

## Conferma

<!-- Come si controlla che il codice rispetti la decisione. Una sola delle tre, ma vera:
     - un test esistente (percorso verificato) e il comando da `laravel/`: `vendor/bin/pest Modules/Media/tests/<percorso>`;
     - un comando eseguibile da `laravel/` con l'esito atteso;
     - una regola di review.
     Se oggi non esiste nessuna conferma: «Nessuna conferma automatica oggi; proposta: ...». Mai inventare un test. -->

<!-- ## Stato attuale
     Aggiungi questa sezione solo se il codice di oggi contraddice la decisione: cosa fa davvero (file e riga). -->
