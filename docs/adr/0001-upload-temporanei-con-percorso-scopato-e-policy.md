---
title: "ADR — Upload temporanei con percorso scopato e policy"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
module: Media
decision-makers: [Media]
qmd: "0001 upload temporanei percorso scopato policy"
---

# ADR: upload temporanei con percorso scoped e policy

## Contesto

Gli upload temporanei possono esistere prima dell'associazione definitiva a
un modello e possono avere originale, conversione e versione responsive. Il
percorso non deve collidere tra media e non deve confondere il file originale
con i derivati; l'accesso ai record deve restare governato da policy.

Domanda: come si costruisce il percorso di un upload temporaneo e chi puo' agire sul record?

## Driver della decisione

- Separare i tre scopi di storage senza duplicare la logica del percorso.
- Rendere il percorso deterministico rispetto all'identità del media, non al
  nome fornito dal client.
- Applicare permessi espliciti sia a `media.*` sia a `temporary_upload.*`.

## Alternative scartate

- Usare il nome originale o una cartella pubblica: collisioni e maggiore
  esposizione del contenuto.
- Mettere originali e derivati nella stessa posizione: impossibile distinguere
  chiaramente i cicli di elaborazione.
- Affidarsi soltanto a controlli nella UI Filament: le policy devono coprire
  anche chiamate e risorse non originate dalla UI.

## Decisione

`GenerateTemporaryUploadPathAction` genera percorsi sotto `tmp/` usando
`media->uuid` e id, con suffissi distinti per `original`, `conversion` e
`responsive`. `MediaPolicy` e `TemporaryUploadPolicy` autorizzano le azioni
tramite i rispettivi permessi CRUD; `super-admin` e `media::admin` hanno il
bypass previsto dalla policy base. La validazione degli upload diretti richiede
UUID, chiave, bucket, nome, tipo MIME e dimensione.

## Conseguenze

- Buono: percorsi separati e riproducibili riducono collisioni e ambiguità tra
  file e conversioni.
- Buono: l'autorizzazione è applicata al modello, non solo al pannello.
- Cattivo: il percorso dipende dalla stabilità dell'identità del media e i
  temporanei richiedono una pulizia esplicita.
- Cattivo: il client deve fornire tutti i metadati richiesti per l'upload
  diretto.
- Cattivo: il percorso usa `md5`, elencato come debito `security` in `tests/Arch/debt.php`.

## Conferma

- Percorsi: `tests/Unit/Support/TemporaryUploadPathGeneratorTest.php`, con le invarianti `MEDIA-PATH-INV-2`..`4` del
  contratto [GenerateTemporaryUploadPathAction](../contracts/generate-temporary-upload-path-action.md);
  da `laravel/`: `vendor/bin/pest Modules/Media/tests --group=MEDIA-PATH-INV-2`.
- Policy: `tests/Unit/MediaPolicyBehaviorTest.php` (bypass `super-admin` della policy base, permessi `media.*` e
  `temporary_upload.*`); `app/Models/Policies/MediaPolicy.php`, `app/Models/Policies/TemporaryUploadPolicy.php` e
  `app/Models/Policies/MediaBasePolicy.php:14-21` devono mantenere i permessi espliciti.
- Validazione dei metadati: `app/Http/Requests/CreateTemporaryUploadFromDirectS3UploadRequest.php:14-29`; nessun test la
  prova davvero: `tests/Unit/MediaHighestMissCoverageTest.php:127-133` ne chiama `rules()` ma intercetta ogni `Throwable`,
  quindi passa anche se la chiamata fallisce.

## Stato attuale

Il codice di oggi non usa le parti della decisione che riguardano il flusso di upload (`rg` su `Modules/*/app`):

- `app/Actions/GenerateTemporaryUploadPathAction.php:11-55` non ha chiamanti in `app/`: la usano solo i test.
- `app/Http/Requests/CreateTemporaryUploadFromDirectS3UploadRequest.php:12` non e' referenziata da nessuna rotta o classe di `app/`, `routes/` e `config/` (solo da quel test).

La decisione vale dunque per la classe e per le policy (queste ultime sono provate dai test), non per un flusso di
produzione che le attraversi. Se il flusso diretto su S3 viene attivato, i percorsi devono passare dall'Action.
