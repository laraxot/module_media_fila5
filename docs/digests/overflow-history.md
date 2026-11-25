---
title: "Overflow history (ceiling 100)"
type: digest
status: active
qmd: "digest ceiling 100 overflow-history"
---

# Overflow history (ceiling 100)

Overflow force-cap: 275 file oltre target 100.

### `_integration/competitors.md` — _competitors


# _competitors

<!-- Contenuto migrato da _docs/_competitors.txt -->

https://github.com/outer-web/filament-image-library

### `_integration/convert.md` — convert

# convert

<!-- Contenuto migrato da _docs/convert.txt -->

https://tobyokeke.com/how-to-convert-uploaded-videos-in-laravel-1d605baf5033

https://stackoverflow.com/questions/76302960/convert-large-video-files-with-php-ffmpeg

->addFilter(['-filter:a', 'volumedetect', '-f', 'null'])

https://gist.github.com/Nks/b3b1cd7398a560eda8ddb7e37901869e?permalink_comment_id=3450216

### `_integration/ffmpeg.md` — ffmpeg

# ffmpeg

<!-- Contenuto migrato da _docs/ffmpeg.txt -->

WINDOWS

https://www.gyan.dev/ffmpeg/builds/

choco install ffmpeg
choco install ffmpeg-full
winget install ffmpeg

$ which ffmpeg
$ which ffprobe

add to .env
FFMPEG_PATH=c:/ProgramData/chocolatey/bin/ffmpeg.exe
FFPROBE_PATH=c:/ProgramData/chocolatey/bin/ffprobe.exe

### `_integration/player.md` — player

# player

<!-- Contenuto migrato da _docs/player.txt -->

https://github.com/spatie/laravel-sitemap/blob/main/resources/views/video.blade.php

https://github.com/anggadarkprince/beats-laravel-web/blob/master/resources/views/pages/video.blade.php

per fare blocco YOUTUBE e blocco VIMEO
https://github.com/nWidart/laravel-videoable/blob/master/resources/views/sources/vimeo.blade.php

### `_integration/stream.md` — __stream


# __stream

<!-- Contenuto migrato da _docs/__stream.txt -->

https://laravel-news.com/temporary-directory

-----------------------------------------------

use Illuminate\Support\Facades\Http;
use Spatie\TemporaryDirectory\TemporaryDirectory;

// Normalize the video and get the filename
$videoUrl = str($videoUrl)->replace(' ', '%20');
$tmpFile = $videoUrl->afterLast('/');

// Create a temporary directory and download a file to that path
$tmpDir = TemporaryDirectory::make();
$tmpPath = $tmpDir->path($tmpFile);
Http::sink($tmpPath)->throw()->get($videoUrl->toString());

### `_integration/webm.md` — webm

# webm

<!-- Contenuto migrato da _docs/webm.txt -->

https://pixelpoint.io/blog/web-optimized-video-ffmpeg/

ffmpeg -i in.mp4 -c:v libvpx-vp9 -threads 4 out.mp4

ffmpeg -i input.mp4 -c:v libvpx-vp9 -preset ultrafast -b:v 1M -c:a libvorbis output.webm
ffmpeg -i input.mp4 -c:v libvpx-vp9 -preset ultrafast -b:v 1M -c:a libvorbis -threads 4 -speed 4 output.webm

-i input.mp4: Specifica il file di input.
-c:v libvpx-vp9: Utilizza il codec video VP9 per WebM.
-preset ultrafast: Imposta il preset di velocità su ultrafast.
-b:v 1M: Imposta il bitrate video a 1 Mbps (puoi modificarlo in base alle tue esigenze).
-c:a libvorbis: Utilizza il codec audio Vorbis
-threads 4: utilizza 4 thread per l'elaborazione, aumentando la velocità di conversione sfruttando il multi-threading.
-speed 4: imposta la ve

### `_integration/youtube.md` — youtube

# youtube

<!-- Contenuto migrato da _docs/youtube.txt -->

https://github.com/mokhosh/laravel-youtube-api

https://github.com/mokhosh/laravel-youtube-downloader

### `agent-edit-discipline.md` — Disciplina edit e qualità (puntatore)


# Disciplina edit e qualità (puntatore)

Stub **DRY**: policy nella wiki di progetto; discussioni GitHub issue [#124](https://github.com/provtv/base_ptv_fila5_mono/issues/124) e [#138](https://github.com/provtv/base_ptv_fila5_mono/issues/138).

## Link operativi

- Regola canonica: [../../../../docs/wiki/rules/validation-post-edit-rule.md](../../../../docs/wiki/rules/validation-post-edit-rule.md)
- How-to issue ↔ wiki: [../../../../bashscripts/ai/wiki/how-to/git-github.md#github-issue-agent-discipline](../../../../bashscripts/ai/wiki/how-to/git-github.md#github-issue-agent-discipline)
- Context overflow / Autocompact: [../../../../bashscripts/ai/wiki/how-to/agents-context-tooling.md#autocompact-thrashing-recovery](../../../../bashscripts/ai/wiki/how-to/agents-context-tooling.md#autocompac

### `ai-methodologies.md` — AI Methodologies Handbook

# AI Methodologies Handbook

This file is a DRY local index for AI workflows in this module or theme.

## Canonical Sources

- [OpenViking Integration Guide](../../../../docs/openviking-integration.md)
- [AI Methodologies Integration](../../../../bashscripts/ai/wiki/memories/agent-conduct-tooling.md#ai-methodologies-integration)
- [Root Docs Index](../../../../docs/index.md)

## Local Workflow

1. Read the local docs index before changing anything in this module or theme.
2. Update the relevant local docs file.
3. Update the local docs index (`README.md`, `index.md`, or `00-index.md`).
4. Only then index the docs folder with OpenViking.
5. Use BMAD for requirements, GSD for execution, and Ralph Loop for longer autonomous iterations.

## OpenViking Rule


### `analysis.md` — Media Module Analysis

# Media Module Analysis

## Overview
The Media module provides specialized functionality within the Laravel application.

## Directory Structure
```
Modules/Media/
├── app/
│   ├── Models/
│   ├── Http/
│   └── Providers/
├── config/
├── database/
├── resources/
└── routes/
```

## Key Components


### `api-integration.md` — API Integration

# API Integration

### `architecture/structure.md` — Modulo Media

# Modulo Media

Data: 2025-04-23 19:09:56

## Informazioni generali

- **Namespace principale**: Modules\\Media
Modules\\Media\\Database\\Factories
Modules\\Media\\Database\\Seeders
Modules\\Media\\Tests
- **Pacchetto Composer**: laraxot/module_media_fila5
Marco Sottana
- **Dipendenze**: php ^8.2 pbmedia/laravel-ffmpeg ^8.5 intervention/image * repositories type path url ../User type path url ../Tenant type path url ../UI type path
- **Totale file PHP**: 97
- **Totale classi/interfacce**: 64

## Struttura delle directory

```


### `architecture.md` — Architettura Modulo Media


# Architettura Modulo Media

## Panoramica

Il modulo Media gestisce la memorizzazione, elaborazione e distribuzione di file multimediali (immagini, video, documenti, audio) all'interno dell'applicazione Laravel Laraxot.

## Informazioni Generali

- **Namespace principale**: `Modules\Media`
- **Pacchetto Composer**: `laraxot/module_media_fila5`
- **Dipendenze principali**:
  - `php ^8.2`
  - `pbmedia/laravel-ffmpeg ^8.5` (conversione video)
  - `intervention/image *` (manipolazione immagini)
  - `Modules\Xot` (base framework)
  - `Modules\Tenant` (multi-tenancy)
  - `Modules\User` (autenticazione)

## Struttura PSR-4

### `best-practices.md` — Best Practices

# Best Practices

### `bmad/architecture/module-boundary.md` — Media — architettura

# Media — architettura

## Scopo osservato

Gestione media e conversioni. Scheda derivata da `module.json`, struttura `app/` e conteggi del repository; non sostituisce decisioni architetturali non ancora approvate.

## Inventario verificato

- PHP in `app/`: 126 file.
- Test PHP in `tests/`: 56 file.
- Aree applicative: `Enums`, `conversions`, `Http`, `Filament`, `Conversions`, `Support`, `Exceptions`, `Services`, `Contracts`, `Models`, `Console`, `Actions`, `Providers`, `View`, `Rules`, `Datas`.
- Persistenza: `database/factories`, `database/migrations`, `database/seeders` presenti.

## Confini

Il modulo espone risorse, azioni e contratti verso i consumatori; la logica di dominio deve restare nelle Action e nei modelli del modulo. Le dipendenze verso Xot, User, Tenant e UI vanno verifica

### `bmad/architecture.md` — Architettura — Media


# Architettura — Media

Verificata sul codice il 2026-11-16 (127 PHP in `app/`, 51 Action, 0 Services). Sostituisce due documenti fusi che citavano `UploadMediaAction`, `ProcessMediaAction`, `DeleteMediaAction`, `MediaCollections`, `MediaItem`, `CollectionResource`: **nessuno esiste** ([audit P1-6](./audits/media-audit.md#p1-6--documentazione-che-contraddice-il-codice)). Scopo: [purpose.md](./purpose.md).

## Componenti reali

| Strato | Elementi |
|---|---|
| Modelli | `Media` (estende `Spatie\MediaLibrary\MediaCollections\Models\Media`), `MediaConvert`, `TemporaryUpload` (connessione `media`, `MassPrunable` senza `prunable()`), `BaseModel` |
| Provider | `MediaServiceProvider`, `EventServiceProvider`, `RouteServiceProvider` (route `web`/`api` vuote) |
| Filament | `MediaResource` (+ `Co

### `bmad/audit.md` — Audit BMAD — Media


# Audit BMAD — Media

SSoT dettagliata (inventario, evidenze `path:line`, non-finding): [audits/media-audit.md](./audits/media-audit.md).

**Scopo in una frase:** Media custodisce i file che fanno da prova a una decisione e li rende utilizzabili nei formati che servono, senza che il dominio sappia nulla di dischi e conversioni ([purpose.md](./purpose.md)).
**Scopo in una frase:** Media custodisce i file che fanno da prova a una decisione e li rende utilizzabili nei formati che servono, senza che il dominio sappia nulla di dischi e conversioni ([purpose.md](./purpose.md)).
**Scopo in una frase:** Media custodisce i file che fanno da prova a una decisione e li rende utilizzabili nei formati che servono ([purpose.md](./purpose.md)).

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
=

### `bmad/audits/media-audit.md` — Audit approfondito — Media


# Audit approfondito — Media

## Metodo

Source-first (2026-11-16): inventario filesystem, `rg` su policy/marker/label,
lettura purpose esistente, PHPStan globale Modules già a 0 errori. Nessuna UI
inventata. Pest dichiarato solo se eseguito.

## Inventario misurato

| Area | Conteggio |
|---|---:|
| PHP in `app/` | 127 |
| Test PHP | 47 |
| Models (`app/Models/*.php`) | 4 |
| Policy files (approx) | 8 |
| Resource Filament | 3 |
| Actions | 51 |
| Services | 0 |

### `bmad/best-practices.md` — Best Practices

# Best Practices

### `bmad/bmad-dossier.md` — Media — BMAD dossier

# Media — BMAD dossier
## Product brief / PRD
Store validated evidence and conversions without turning personal media into uncontrolled data.
## Architecture / UX / security
Media owns file lifecycle/storage; domain modules own attachment meaning; public serializers are allowlists.
## Epics and stories
Upload reliability; conversions/storage; privacy/retention.
## Gaps / release
Object-storage recovery, metadata scrubbing, orphan cleanup and retention require candidate evidence.

### `bmad/brainstorming/module-opportunities.md` — Media — brainstorming

# Media — brainstorming

## Punto di partenza

Gestione media e conversioni. L'inventario corrente misura 126 file applicativi e 56 file di test.

## Domande ad alto valore

- Quale problema utente risolve il modulo e quale comportamento è vincolante?
- Quali dati sono autorevoli e quali sono proiezioni o cache?
- Quali ruoli possono leggere, creare, modificare o approvare?
- Quale errore deve essere osservabile senza esporre dati sensibili?
- Quale parte è riusabile e quale è specifica del dominio PTVX?

## Ipotesi da validare

- Le Action sono il punto di orchestrazione del caso d'uso.
- Le Resource Filament sono adattatori, non il luogo della regola di business.
- I test esistenti sono evidenza parziale e vanno confrontati con i flussi esposti.


### `bmad/brainstorming.md` — Media - brainstorming


# Media - brainstorming

> **SUMMARY**: indice dei contenuti di brainstorming per `Modules\Media`.
> Le domande ad alto valore, ipotesi, rischi e output attesi sono nei **shard**
> sottostanti (non sovrascritti). Questo file root funge da indice.

## Shard brainstorming

| Shard | Descrizione |
|---|---|
| [brainstorming/module-opportunities.md](./brainstorming/module-opportunities.md) | domande ad alto valore, ipotesi da validare, rischi |

## Decisioni prese

| Decisione | Stato | Riferimento |
|---|---|---|
| Connessione DB `media` separata, fissata in `BaseModel` | approvata | `app/Models/BaseModel.php` |
| `Media` estende `SpatieMedia` | approvata | `app/Models/Media.php` |
| `TemporaryUpload` implementa `HasMedia` | approvata | `app/Models/TemporaryUpload.php` |

### `bmad/decision-log.md` — Decision log — Media


# Decision log — Media

## Formato

- **Data:** YYYY-MM-DD
- **Decisione:** Breve descrizione della decisione presa
- **Stato:** PROPOSTA, APPROVATA, RIFIUTATA, OBSOLETA
- **Impatto:** Alto/Medio/Basso
- **Alternatives considerate:** Elenco delle alternative valutate
- **Conseguenze:** Implicazioni della decisione

## Registro delle decisioni

### 2026-09-29
**Decisione:** [Esempio: Utilizzare Filament Widget invece di Livewire per i componenti di UI]
**Stato:** APPROVATA
**Impatto:** Alto
**Alternatives considerate:** 
- Mantenere Livewire

### `bmad/epics/architecture-contract-epic.md` — Epic 5.250 — architettura e contratto API modulo Media


# Epic 5.250 — architettura e contratto API modulo Media

> **SUMMARY**: epic per stabilire e documentare il contratto API pubblica del
> modulo `Modules\Media`, i confini di dipendenza e le invarianti architetturali.
> Scope: documentazione derivata dal codice reale, zero modifiche PHP.
> Grounded in `module.json`, `composer.json`, `app/Models/`, `app/Actions/`,
> `app/Filament/Resources/`, `app/Contracts/`.

## Scope

Il modulo Media gestisce upload, conversioni (FFmpeg, Intervention), diagnostica
AWS/S3/CloudFront e integrazione con Spatie MediaLibrary. Questa epic documenta:

1. Namespace e providers ufficiali (`module.json`)
2. Modelli e relazioni (Eloquent magic properties)
3. API pubblica: Action, Contracts, Resource Filament
4. Dipendenze esterne (`composer.json`)
5. Invarianti e 

### `bmad/epics/module-roadmap.md` — Media — epic roadmap

# Media — epic roadmap

## Epic A — Contratto e architettura

Documentare API pubbliche, dipendenze, confini e invarianti del modulo.

## Epic B — Qualità verificabile

Ridurre finding PHPStan, mantenere test Pest eseguibili e registrare evidence ripetibile.

## Epic C — UX e integrazione

Verificare parità Form/Table, traduzioni, autorizzazioni, error handling e integrazioni dichiarate.

## Epic D — Documentazione viva

Collegare ogni decisione a story BMAD, mantenere il second brain e chiudere i duplicati senza cancellare storia.

## Definition of Done


### `bmad/epics.md` — Epics — Media


# Epics — Media

Sostituisce il template. Ogni epic nasce da un finding dell'[audit](./audits/media-audit.md); formato: obiettivo, Acceptance (AC), task.

## E1 — Guard sulle pagine di diagnostica (P1-1, D-4)

- AC1: `AwsTest` e `S3Test` usano `SuperAdminOnlyTrait` (o il cluster).
- AC2: Pest `actingAs` utente senza ruolo → 403/non accessibile; `super-admin` → accessibile.

## E2 — Pulizia dei caricamenti temporanei (P1-2, D-1)

- AC1: `TemporaryUpload::prunable()` implementato (scadenza dichiarata, scope `old()` corretto).
- AC2: `php artisan model:prune --pretend --model='Modules\Media\Models\TemporaryUpload'` non solleva eccezioni; Pest sul prune.
- AC3: conteggio dei record rimossi registrato (log).

## E3 — `Media::id` coerente con lo schema (P1-3, D-2)

- AC1: decisione D-2 presa; c

### `bmad/livewire-inventory.md` — Inventario: Livewire HTTP → Filament widget, modulo Media


# Inventario: Livewire HTTP → Filament widget, modulo Media

**Solo documentazione. Nessun PHP convertito, nessun widget creato.**

Questo file è la fonte canonica per il modulo Media sulla campagna di conversione Livewire → Filament widget. Sostituisce nei contenuti tecnici `livewire-widget-conversion.md` (2026-08-25), la cui proposta di conversione era basata su un'ipotesi non verificata; quel file resta in linea come puntatore superseded, non va cancellato.

Una sessione concorrente ha scritto in parallelo, lo stesso giorno (21/09/2026), un pacchetto di stub BMAD (`livewire-widget-*.md`) e la story `12.1.media-clip-not-widget.story.md`, arrivando allo stesso verdetto di merito (Clip non è candidato a widget). Questo documento ne verifica ogni affermazione contro il codice reale, aggiun

### `bmad/phpstan-level10-fixes.md` — Correzioni PHPStan Livello 10 - Modulo Media

# Correzioni PHPStan Livello 10 - Modulo Media

> **Collegamento globale:** Per le strategie generali e le best practices sulla risoluzione dei conflitti git, vedi [docs/git_conflict_resolution.md](../../../../../docs/git_conflict_resolution.md).

Questo documento traccia gli errori PHPStan di livello 10 identificati nel modulo Media e le relative soluzioni implementate.

## Errori Identificati

### 1. Uso del tipo mixed per risorsa di file in VideoStream.php

```php
private mixed $stream; // File stream resource
```

**Problema**: Utilizzo del tipo `mixed` per la proprietà `$stream` che rappresenta una risorsa di file. In PHP, le risorse hanno un tipo specifico che non può essere correttamente rappresentato come scalare o oggetto.

**Soluzione**:
1. Utilizzato un'annotazione PHPDoc per sp

### `bmad/phpstan-report.md` — Report PHPStan - Modulo Media

# Report PHPStan - Modulo Media

## Stato Attuale

L'analisi PHPStan di livello 1 non ha rilevato errori nel modulo Media. Questo è un ottimo risultato che indica una buona qualità del codice per quanto riguarda:
- Type safety
- Gestione delle variabili
- Chiamate a metodi
- Accesso alle proprietà

## Raccomandazioni per Mantenere la Qualità

1. **Type Hinting**:
   - Continuare a utilizzare type hinting esplicito per tutti i metodi
   - Mantenere `declare(strict_types=1)` in tutti i file
   - Definire sempre i tipi di ritorno per i metodi

2. **Documentazione**:
   - Mantenere PHPDoc aggiornata per tutti i metodi
   - Specificare sempre i tipi di parametri e di ritorno

### `bmad/piano-miglioramento.md` — Piano di miglioramento — Media


# Piano di miglioramento — Media

=======
Derivato dall'[audit](./audits/media-audit.md).

## P0

1. Bonificare marker/conflict se presenti (ora: 0).
2. Chiudere policy troppo permissive (`return true` ≈ 2) con matrice ruolo×ability.
3. Blocchi sicurezza runtime (auth panel, mass assignment, export) con test negativi.

## P1

1. Portare Services (0) ad Actions Queueable dove applicabile.
2. Alzare copertura test (attuale 47 test / 127 app PHP).
3. Allineare Filament (resources=3) a XotBase* e traduzioni Lang.
4. Spezzare dipendenze inverse verso verticali peer se rilevate con `rg`.

## P2

### `bmad/quick-reference.md` — Media - quick reference


# Media - quick reference

> **SUMMARY**: riferimento rapido per lo sviluppo su `Modules\Media`:
> namespace, modelli chiave, action orchestrative, comandi console, path
> delle conversioni, dipendenze e comandi BMAD. Derivato da file reali del modulo.

## Namespace e connessione

- Namespace: `Modules\Media`
- Connessione DB dei model: `media` (vedi `app/Models/BaseModel.php`)

## Modelli principali

| Modello | File | Estende / Implementa | Note |
|---|---|---|---|
| `Media` | `app/Models/Media.php` | `SpatieMedia` | tabella derivata dal model |
| `MediaConvert` | `app/Models/MediaConvert.php` | `BaseModel` | `media_converts` |
| `TemporaryUpload` | `app/Models/TemporaryUpload.php` | `BaseModel`, `HasMedia` | `temporary_uploads` |
| `BaseModel` | `app/Models/BaseModel.php` | `XotBaseMod

### `bmad/setup-guide.md` — Media - setup guide


# Media - setup guide

> **SUMMARY**: guida per configurare l'ambiente di sviluppo del modulo
> `Modules\Media` e per lavorarci con il metodo BMAD. Copre composer, config,
> dipendenze esterne (FFmpeg, S3, CloudFront), migrazioni, verifica della
> connessione e convenzioni di codice. Derivata da `composer.json`,
> `module.json`, `config/config.php` e `app/Actions/Diagnostic/`.

## Scopo

Rendere ripetibile e verificabile l'uso del BMAD Method per il modulo Media.

## Prerequisiti

| Requisito | Versione | Verifica |
|---|---|---|
| PHP | ^8.2 | `php -v` |
| FFmpeg | presente (binario di sistema) | `ffmpeg -version` |
| AWS CLI | presente | `aws --version` |

### `bmad/status.md` — BMAD Status — Media (2026-10-06)


# BMAD Status — Media (2026-10-06)

## Inventario docs
- `docs/`: architecture.md, bmad/, concepts/, contracts/, development/, epics/, filament/, html2pdf/, llm-wiki/, outputs/, performance/, prompts/, raw/, readme.md, roadmap/, stories/, relation_managers/, resources/, competitors.md.
- Wiki: aggiunto `media-purpose.md` (scopo + nota errore PHPStan).

## PHPStan
1 errore: `ConvertController extends unknown class App\Http\Controllers\Controller` (`class.notFound`). Non corretto (solo studio/docs).

## SCOPO (wiki/media-purpose.md)
Asset multimediali: upload, conversione, embedding. Provider con `$name = 'Media'`.

## File toccati
- `docs/wiki/media-purpose.md` (nuovo)
- `docs/bmad/status.md` (nuovo)

### `bmad/stories/0001-phpstan-media-fixes.story.md` — Story: Fix PHPStan Level 10 Errors in Media Module

# Story: Fix PHPStan Level 10 Errors in Media Module

## Context and Problem Statement

Media module has controller type errors.

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0003-cleanup-media-2.story.md` — Story: Cleanup Media Module

# Story: Cleanup Media Module

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0005-cleanup-media-3.story.md` — Story: Cleanup Media Module

# Story: Cleanup Media Module

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0006-continuazione-domani.story.md` — Continuazione domani

# Continuazione domani

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0007-docs-reorg-core.story.md` — Story — riorganizzazione docs core: Media

# Story — riorganizzazione docs core: Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0008-docs-zen-conventions.story.md` — Media: bonifica docs `.md`

# Media: bonifica docs `.md`

## Context and Problem Statement

Il rumore in `docs/` (copie esatte, varianti `_`/MAIUSCOLO/`-2`, stub generati, template di prodotto
generici) degrada QMD e confonde gli agenti. Obiettivo: una copia canonica per contenuto, nomi kebab,
frontmatter con `title` + `qmd` ovunque, link aggiornati.

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome


### `bmad/stories/0009-git-status-fleet-merge-markers-media.story.md` — git-status-fleet-merge-markers-media

# git-status-fleet-merge-markers-media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0011-navigation-translations-audit.story.md` — Audit traduzioni `.navigation` — modulo Media

# Audit traduzioni `.navigation` — modulo Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0012-phpstan-clustera.story.md` — Media: PHPStan cluster A 2026-10-21

# Media: PHPStan cluster A 2026-10-21

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0013-phpstan-zero-merge-markers-media.story.md` — PHPStan zero + merge markers — Media

# PHPStan zero + merge markers — Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0015-quality-gates-phpstan-swarm-2.story.md` — PHPStan swarm 2026-09-23: verifica Modules/Media

# PHPStan swarm 2026-09-23: verifica Modules/Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/continuazione-domani.md` — Media — Continuazione Domani

# Media — Continuazione Domani

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `boost-skill-fix-summary.md` — Boost Skill Fix Summary - Media Module

# Boost Skill Fix Summary - Media Module

**Date**: 2026-03-02  
**Module**: Media (Media File Management)

## Issue Overview

The Media module was unable to function due to missing Laravel framework dependencies.

## Root Cause

Missing Laravel framework dependencies prevented media file operations.

## Impact on Media Module

The Media module couldn't:
- Upload files
- Generate thumbnails
- Serve media
- Manage media collections

### `bottlenecks-detailed.md` — Analisi Dettagliata dei Colli di Bottiglia - Modulo Media

# Analisi Dettagliata dei Colli di Bottiglia - Modulo Media

## Panoramica
Il modulo Media gestisce l'elaborazione e la manipolazione dei file multimediali nell'applicazione. L'analisi ha identificato diverse aree critiche che impattano le performance.

## 1. Elaborazione Immagini
**Problema**: Processamento inefficiente delle immagini
- Impatto: Latenza durante il caricamento e la manipolazione
- Causa: Elaborazione sincrona e mancanza di ottimizzazione

**Soluzione Proposta**:
```php
declare(strict_types=1);

namespace Modules\Media\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\QueueableAction\QueueableAction;


### `business-logic-overview.md` — Media Module - Business Logic Overview

# Media Module - Business Logic Overview

## Core Business Logic Components

### 1. Healthcare Media Management Architecture
The Media module implements comprehensive file and media management for healthcare applications, handling patient documents, medical images, reports, and multimedia content with strict security and compliance requirements.

#### Key Models

- **Media**: Core media file management with metadata and versioning
- **MediaCollection**: Organized collections of related media files
- **MediaConversion**: Image and document format conversions
- **MediaLibrary**: Centralized media library with categorization
- **PatientDocument**: Patient-specific document management with privacy controls

#### Business Rules

- All patient media requires encryption at rest and in transit
- M

### `code-quality-improvement-report.md` — Code Quality Improvement Report — Media


# Code Quality Improvement Report — Media

> Baseline statica riproducibile per orientare il miglioramento. I conteggi sono segnali, non sostituiscono PHPStan, Pest o la review del flusso reale.


## GitHub (repo del componente)

```bash
cd laravel/Modules/Media && git remote -v
# atteso: laraxot/module_media_fila5
```

**Lezione grave:** in un conflitto Git, *entrambe* le parti possono essere sbagliate (`base_legacy_project_*` vs `base_workorder_*`). Non scegliere a caso: `git remote -v` nella cartella del modulo/tema.

## Baseline

| Indicatore | Valore |
|---|---:|
| File PHP applicativi/database/route | 129 |

### `code-quality-report.md` — Code quality — modulo Media


# Code quality — modulo Media

Report locale (2026-07-17). Metodo: `phpstan analyse` livello max, `phpmd` (ruleset codesize+unusedcode), grep mirati (TODO/FIXME/@deprecated, dd()/dump(), facade in app/Actions, extends Filament diretto), rapporto file test/app.

## Numeri

- File in `app/`: 117
- File di test: 14 — rapporto test/app: 11%
- File con TODO/FIXME/@deprecated: 0
- PHPStan: 0 errori (livello max, sweep repo-wide 2026-07-16/17)
- Violazioni PHPMD (codesize+unusedcode): 49
- File in `app/Actions/` che importano Facade Laravel direttamente (violazione pattern QueueableAction, vedi skill `queueable-action-trait`): 10

### File con Facade in Actions da convertire

- Modules/Media/app/Actions/SaveAttachmentsAction.php
- Modules/Media/app/Actions/Diagnostic/S3/TestFileUploadDownloadAct

### `code-redundancy-audit.md` — Code redundancy audit — Media


# Code redundancy audit — Media

## Scopo

Ridurre rumore, duplicazione e ambiguita' nel codice di questo module, senza perdere conoscenza storica.

## Metriche

| Voce | Valore |
|---|---:|
| File PHP analizzati | 109 |
| Rischio ridondanza | high |
| Basename duplicati locali | 3 |
| Hash normalizzati duplicati cross-owner | 3 |
| Class/trait/interface name ripetuti nel monorepo | 11 |
| File grandi >=350 righe | 4 |
| File PHP con marker Git | 0 |

## Evidenze

### `codex-error-fix.md` — Codex Configuration Error Fixes

# Codex Configuration Error Fixes

Questo documento descrive le correzioni applicate agli errori riscontrati durante l'avvio di `codex`.

## 1. Errori YAML negli SKILL.md

### Sintomo
`invalid YAML: mapping values are not allowed in this context` o `invalid YAML: name: invalid type: map`.

### Causa
Caratteri speciali come `:` o `{}` all'interno di valori non racchiusi tra virgolette nel frontmatter YAML.

### Soluzione
Racchiudere sempre i valori di `name` e `description` tra virgolette doppie nel frontmatter.

**Esempio Errato:**
```yaml
---
name: { my-skill-name }
description: Rule: always do X.

### `competitors-1.md` — competitors-1

https://github.com/outer-web/filament-image-library

### `concepts/xotbase-never-extend-filament.md` — Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`


# Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`

Bridge on-demand. Contenuto canonico: [docs/wiki/rules/xotbase-critical-rules.md](../../../../docs/wiki/rules/xotbase-critical-rules.md).

## Zen (riassunto)

Nessuna classe in `Modules/Media` estende una classe `Filament\...` direttamente.
Si estende sempre lo "specchio" in `Modules\Xot\Filament\...` allo stesso
percorso relativo (es. `Filament\Tables\Columns\ViewColumn` ->
`Modules\Xot\Filament\Tables\Columns\XotBaseViewColumn`). Se manca il
mirror, va creato in Xot prima di usarlo qui, mai come scorciatoia nel modulo.

Non pre-caricare questo file: leggi la fonte canonica solo quando il task lo richiede.

### `configuration.md` — Configuration

# Configuration

### `conflicts-analysis.md` — Analisi Conflitti - README.md

# Analisi Conflitti - README.md

## Obiettivi Funzionali

## Decisioni Architetturali

## Impatto

## Collegamenti correlati
- [[conflicts_overview]]

## Contenuto fuso da `conflicts-analysis.md`

See canonical documentation: ../../../../Themes/docs/shared-components/conflicts-analysis.md

### `conflicts.md` — Risoluzione Conflitti - Media

# Risoluzione Conflitti - Media

## File modificati

## Decisioni adottate

### `conflitti-merge-risolti.md` — Risoluzione dei Conflitti Git nel Modulo Media

# Risoluzione dei Conflitti Git nel Modulo Media

## Panoramica

Questo documento descrive i conflitti di merge Git risolti nel modulo Media e fornisce esempi delle soluzioni adottate. La risoluzione dei conflitti è stata effettuata seguendo le linee guida generali del progetto, con particolare attenzione alla tipizzazione forte, alla documentazione completa e alla coerenza del codice.

## Collegamenti con la Documentazione Principale

Per una panoramica generale sulla risoluzione dei conflitti Git nel progetto, consultare:

- [Risoluzione Conflitti Git](../../../../../docs/risoluzione_conflitti_git.md)
- [Report completo di intervento](../../../../../docs/logs/conflict_resolution_report.md)
- [Gestione Git con Script Bash](../../../../../docs/bashscripts/gestione_git.md)

## Collegamenti 

### `contracts/attach-media-action.md` — AttachMediaAction


# AttachMediaAction

Classe vuota che usa solo il trait `QueueableAction`. Codice: `app/Actions/AttachMediaAction.php:12-15`.

## Input

- Nessuno: la classe non dichiara `execute()`.

## Output

- Nessuno.

## Invarianti

- **ATTACH-MEDIA-INV-1** — La classe non espone `execute()`: una chiamata diretta fallisce con `Call to undefined method`, perché il trait definisce `execute()` solo sul proxy restituito da `onQueue()`.
  Test: `tests/Unit/Actions/AttachMediaActionTest.php:24-26` verifica solo che l'istanza sia creata.

## Effetti collaterali


### `contracts/base-s3-action.md` — BaseS3Action


# BaseS3Action

Classe astratta base delle Action S3: costruisce il client S3 e risolve bucket, region e credenziali. Codice: `app/Actions/S3/BaseS3Action.php:11-67`.

## Input

- Costruttore: `LoggerInterface $logger`.

## Output

- Nessun `execute()`: è astratta. Le sottoclassi sono `CheckFileExistsAction`, `DeleteFileAction`, `GetFileInfoAction`, `UploadFileAction`.

## Invarianti

- **BASE-S3-INV-1** — Ogni valore è letto prima da `media.aws.*`, poi da `filesystems.disks.s3.*`, infine dal default: il primo valore stringa non vuoto vince.
  Test: `tests/Unit/Actions/MediaActionsCoverageTest.php:181-195` (verifica l'ereditarietà, non i valori).
- **BASE-S3-INV-2** — Il default della region è `us-east-1`; il bucket e le credenziali hanno default `''`.
  Test: nessuno.


### `contracts/build-config-debug-data-action.md` — BuildConfigDebugDataAction


# BuildConfigDebugDataAction

Compone il blocco «Configurazione» della diagnostica S3, mostrando i valori senza esporre i segreti. Codice: `app/Actions/Diagnostic/S3/BuildConfigDebugDataAction.php:16-38`.

## Input

- Nessuno. Legge `filesystems.disks.s3.*` e `services.cloudfront.*`.

## Output

- `array<string, mixed>`: `title` (`📋 Configuration`), `status=info`, `data` con chiave AWS troncata, presenza (✅/❌) di secret e chiave privata CloudFront, region, bucket, `AWS_USE_PATH_STYLE_ENDPOINT` (default `'false'`), URL e key pair CloudFront.

## Invarianti

- **BUILD-CONFIG-DEBUG-DATA-INV-1** — Il segreto AWS e la chiave privata CloudFront compaiono solo come presenza, mai come valore.
  Test: nessuno.
- **BUILD-CONFIG-DEBUG-DATA-INV-2** — La chiave di accesso è troncata a 8 caratteri più 

### `contracts/check-bucket-policy-action.md` — CheckBucketPolicyAction


# CheckBucketPolicyAction

Legge la policy del bucket e la mostra formattata. Codice: `app/Actions/Diagnostic/S3/CheckBucketPolicyAction.php:21-57`.

## Input

- Nessuno. Usa `CreateFilesystemS3ClientAction`.

## Output

- Policy presente: `status=info`, `data` con `Policy Exists` e la policy in JSON indentato.
- `NoSuchBucketPolicy`: `status=info`, `Policy Exists = ℹ️ No (This is usually OK)`.
- Altro `AwsException`: `status=error`, `Error` (codice) e `Message`.

## Invarianti

- **CHECK-BUCKET-POLICY-INV-1** — L'assenza di policy (`NoSuchBucketPolicy`) non è un errore.
  Test: nessuno.
- **CHECK-BUCKET-POLICY-INV-2** — Il JSON della policy viene decodificato e ricodificato con indentazione.

### `contracts/check-file-exists-action.md` — CheckFileExistsAction


# CheckFileExistsAction

Dice se una chiave esiste nel bucket con `headObject`. Codice: `app/Actions/S3/CheckFileExistsAction.php:10-43`.

## Input

- `string $key`: chiave dell'oggetto.

## Output

- `bool`: `true` se la HEAD riesce; `false` se S3 risponde 404.

## Invarianti

- **CHECK-FILE-EXISTS-INV-1** — Solo lo status 404 produce `false`; ogni altro `S3Exception` viene registrato come errore e rilanciato.
  Test: `tests/Unit/Actions/MediaActionsCoverageTest.php:218-224` (solo classe, metodo e superclasse).
- **CHECK-FILE-EXISTS-INV-2** — Ogni esito è registrato a livello `info` (esistenza) o `error` (eccezione).
  Test: nessuno.


### `contracts/convert-srt-to-vtt-action.md` — ConvertSrtToVttAction


# ConvertSrtToVttAction

Converte un file SRT in WebVTT: aggiunge l'intestazione `WEBVTT` e cambia la virgola in punto nei timestamp. Codice: `app/Actions/Subtitle/ConvertSrtToVttAction.php:17-46`.

## Input

- `string $srtFile`: percorso relativo a `public_path()`.
- `string $webVttFile`: percorso di destinazione relativo a `public_path()`.

## Output

- `void`.

## Invarianti

- **CONVERT-SRT-TO-VTT-INV-1** — Il file di output inizia con `WEBVTT` e una riga vuota.
  Test: `tests/Unit/Actions/Subtitle/ConvertSrtToVttActionTest.php:29`.
- **CONVERT-SRT-TO-VTT-INV-2** — La virgola è sostituita con il punto solo nella riga dei timestamp: la riga a indice 1 e ogni riga che segue una riga vuota più un'altra riga.
  Test: `tests/Unit/Actions/Subtitle/ConvertSrtToVttActionTest.php:19` («timing 

### `contracts/create-filesystem-s3-client-action.md` — CreateFilesystemS3ClientAction


# CreateFilesystemS3ClientAction

Costruisce il client S3 e legge il nome del bucket dalla configurazione del disco `s3`. Codice: `app/Actions/Diagnostic/Aws/CreateFilesystemS3ClientAction.php:16-33`.

## Input

- Nessuno. Legge `filesystems.disks.s3.{region,key,secret,bucket}`.

## Output

- `execute()`: `S3Client` (versione `latest`, region con default `eu-west-1` se la chiave non esiste).
- `bucket()`: `string`, oppure `''` se il valore non è una stringa.

## Invarianti

- **CREATE-FILESYSTEM-S3-CLIENT-INV-1** — Il client usa le credenziali del disco `s3` e la region di config, con default `eu-west-1` solo quando la chiave manca.
  Test: `tests/Unit/Actions/DiagnosticActionsTest.php:28` (verifica il tipo di ritorno, nient'altro).
- **CREATE-FILESYSTEM-S3-CLIENT-INV-2** — `bucket()` non

### `contracts/create-filesystem-sts-client-action.md` — CreateFilesystemStsClientAction


# CreateFilesystemStsClientAction

Costruisce il client STS con le stesse credenziali e region del disco `s3`. Codice: `app/Actions/Diagnostic/Aws/CreateFilesystemStsClientAction.php:16-26`.

## Input

- Nessuno. Legge `filesystems.disks.s3.{region,key,secret}`.

## Output

- `StsClient` (versione `latest`, region default `eu-west-1`).

## Invarianti

- **CREATE-FILESYSTEM-STS-CLIENT-INV-1** — Il client usa le stesse credenziali e la stessa region del client S3 costruito da `CreateFilesystemS3ClientAction`.
  Test: `tests/Unit/Actions/DiagnosticActionsTest.php:29` (solo tipo di ritorno).

## Effetti collaterali


### `contracts/delete-file-action.md` — DeleteFileAction


# DeleteFileAction

Cancella un oggetto dal bucket e restituisce un array di esito. Non lancia. Codice: `app/Actions/S3/DeleteFileAction.php:10-53`.

## Input

- `string $key`: chiave dell'oggetto.

## Output

- Successo: `['success' => true, 'key', 'deleteMarker', 'versionId']`.
- Errore S3: `['success' => false, 'key', 'error' => messaggio, 'errorCode' => status HTTP]`.

## Invarianti

- **DELETE-FILE-INV-1** — Ogni `S3Exception` diventa `success=false`: il chiamante deve leggere `success`.
  Test: `tests/Unit/MediaCoverage100RemainingTest.php:64` (cancellazione di una chiave mancante); `tests/Unit/Actions/MediaActionsCoverageTest.php:190` (solo struttura).
- **DELETE-FILE-INV-2** — `deleteMarker` e `versionId` sono `false` e `null` quando il bucket non ha versioning.
  Test: nessuno.

### `contracts/extract-subtitle-plain-text-action.md` — ExtractSubtitlePlainTextAction


# ExtractSubtitlePlainTextAction

Estrae il testo di un file di sottotitoli XML concatenando gli `item` di ogni `sentence`. Codice: `app/Actions/Subtitle/ExtractSubtitlePlainTextAction.php:16-40`.

## Input

- `string $filePath`: percorso del file XML.

## Output

- `string`: testo degli item in ordine, ognuno seguito da uno spazio (nessun `trim`).

## Invarianti

- **EXTRACT-SUBTITLE-PLAIN-TEXT-INV-1** — Si leggono solo i percorsi `annotation/type/sentence/item`; altre strutture danno stringa vuota.
  Test: `tests/Unit/Actions/Subtitle/SubtitleTextActionsTest.php:21`.

## Effetti collaterali


### `contracts/format-debug-output-action.md` — FormatDebugOutputAction


# FormatDebugOutputAction

Trasforma i blocchi di diagnostica in testo leggibile. Codice: `app/Actions/Diagnostic/S3/FormatDebugOutputAction.php:18-102`.

## Input

- `array<string, mixed> $debugResults`: lista di blocchi con `title`, `status`, `data`.
- `string $emptyMessage`: testo restituito se la lista è vuota.

## Output

- `string`: blocchi uniti con `\n`. Ogni blocco ha intestazione `=== title ===`, riga `Status:`, righe `chiave: valore` (array in JSON indentato) e una linea di 50 trattini.

## Invarianti

- **FORMAT-DEBUG-OUTPUT-INV-1** — Lista vuota → `$emptyMessage` invariato.
  Test: `tests/Unit/Actions/Diagnostic/FormatDebugOutputActionTest.php:19`.
- **FORMAT-DEBUG-OUTPUT-INV-2** — Un blocco senza `title`, `status` o `data` (anche se `null`) viene ignorato in silenzio.
  Test

### `contracts/generate-temporary-upload-path-action.md` — GenerateTemporaryUploadPathAction


# GenerateTemporaryUploadPathAction

Genera il percorso di storage sotto `tmp/` per originale, conversioni e immagini responsive di un `Media`. Decisione di fondo: [ADR 0001](../adr/0001-upload-temporanei-con-percorso-scopato-e-policy.md).
Implementa il contratto del [PathGenerator](path-generator.md) tramite `getPath()`, `getPathForConversions()`, `getPathForResponsiveImages()`.

## Input

- `Media $media`: servono solo `id` (chiave) e `uuid`.
- `string $purpose`: `original` (default), `conversion`, `responsive`; qualsiasi altro valore e' trattato come `original`.

## Output

- `string`: `tmp/<md5(uuid+id)>/<md5(id+uuid+suffisso)>`; per `original` il percorso termina con `/`, per gli altri no.

## Invarianti

- **MEDIA-PATH-INV-1** — Il percorso dipende solo da `uuid` e `id` del media, m

### `contracts/get-attachments-schema-action.md` — GetAttachmentsSchemaAction


# GetAttachmentsSchemaAction

Costruisce un `FileUpload` Filament per ogni nome di allegato, con i limiti letti da `MediaConfigData`. Codice: `app/Actions/GetAttachmentsSchemaAction.php:18-64`.

## Input

- `array<array-key, string> $attachments`: nomi dei campi (uno per allegato).
- `string $disk = 'attachments'`: disco di destinazione.

## Output

- `list<FileUpload>`: un componente per allegato, nello stesso ordine.

## Invarianti

- **GET-ATTACHMENTS-SCHEMA-INV-1** — Ogni componente accetta i mime type e rispetta la dimensione massima di `MediaConfigData`; è obbligatorio, singolo, senza riordino, con anteprima e download.
  Test: `tests/Unit/Actions/GetAttachmentsSchemaActionTest.php:20` («returns attachment schema») e `:40` («has correct names»): non verificano i limiti del mime type

### `contracts/get-aws-config-snapshot-action.md` — GetAwsConfigSnapshotAction


# GetAwsConfigSnapshotAction

Restituisce uno snapshot delle variabili AWS e CloudFront, con la chiave di accesso troncata. Codice: `app/Actions/Diagnostic/Aws/GetAwsConfigSnapshotAction.php:18-31`.

## Input

- Nessuno. Legge `filesystems.disks.s3.{key,region,bucket}` e `filesystems.cloudfront.{url,key_pair_id}`.

## Output

- `array<string, mixed>` con le chiavi `AWS_ACCESS_KEY_ID`, `AWS_DEFAULT_REGION`, `AWS_BUCKET`, `CLOUDFRONT_URL`, `CLOUDFRONT_KEY_PAIR_ID`.

## Invarianti

- **GET-AWS-CONFIG-SNAPSHOT-INV-1** — `AWS_ACCESS_KEY_ID` mostra i primi 8 caratteri seguiti da `...`; il segreto non compare mai nell'output.
  Test: nessuno.
- **GET-AWS-CONFIG-SNAPSHOT-INV-2** — Se la chiave non è una stringa il valore è `''`.
  Test: nessuno.


### `contracts/get-aws-s3-error-solution-action.md` — GetAwsS3ErrorSolutionAction


# GetAwsS3ErrorSolutionAction

Traduce un codice di errore AWS S3 in un suggerimento testuale. Codice: `app/Actions/Diagnostic/Aws/GetAwsS3ErrorSolutionAction.php:13-28`.

## Input

- `?string $errorCode`: codice AWS, oppure `null`.

## Output

- `string`: suggerimento. Mappa fissa di cinque codici (`SignatureDoesNotMatch`, `AccessDenied`, `NoSuchBucket`, `InvalidAccessKeyId`, `BucketRegionError`).

## Invarianti

- **RESOLVE-AWS-S3-ERROR-SOLUTION-INV-1** — `null` restituisce il messaggio fisso «Unknown error - check AWS credentials and configuration».
  Test: `tests/Unit/Actions/DiagnosticActionsTest.php:33` (verifica il messaggio).
- **RESOLVE-AWS-S3-ERROR-SOLUTION-INV-2** — Un codice fuori mappa produce «Consult AWS documentation for error: <codice>».
  Test: `tests/Unit/Actions/Diagno

### `contracts/get-cloud-front-signed-url-action.md` — GetCloudFrontSignedUrlAction


# GetCloudFrontSignedUrlAction

Genera un URL CloudFront firmato per una chiave S3. Codice: `app/Actions/CloudFront/GetCloudFrontSignedUrlAction.php:14-33`.

## Input

- `string $key`: chiave dell'oggetto; gli slash iniziali sono rimossi (`ltrim`).
- `int $expiry = 30`: durata in **minuti** (moltiplicata per 60 alla riga 29).

## Output

- `string`: URL firmato restituito da `CloudFrontClient::getSignedUrl()`.

## Invarianti

- **GET-CLOUD-FRONT-SIGNED-URL-INV-1** — L'URL è `base_url` + `/` + chiave senza slash iniziali; la scadenza è `time() + expiry * 60`.
  Test: nessuno sul comportamento; `tests/Unit/Actions/MediaActionsCoverageTest.php:258-264` verifica solo classe e metodo `execute`.
- **GET-CLOUD-FRONT-SIGNED-URL-INV-2** — Configurazione letta da `CloudFrontData::make()` (namespace

### `contracts/get-effective-upload-limit-action.md` — GetEffectiveUploadLimitAction


# GetEffectiveUploadLimitAction

Calcola il numero massimo di byte che un upload temporaneo Livewire può davvero portare nella richiesta web. Codice: `app/Actions/Upload/GetEffectiveUploadLimitAction.php:20-57`.

## Input

- `?int $fieldMaxKb = null`: limite del campo, in kilobyte; `null` non lo applica.

## Output

- `int`: il minimo tra tre limiti in byte: 90% di `UploadedFile::getMaxFilesize()` (PHP), `livewire.temporary_file_upload.rules` (regola `max:` in kilobyte, default 12288) e il limite del campo.

## Invarianti

- **GET-EFFECTIVE-UPLOAD-LIMIT-INV-1** — Il risultato non supera mai il limite PHP ridotto del 10% per il multipart.
  Test: `tests/Unit/Actions/Upload/GetEffectiveUploadLimitActionTest.php:22` e `:26` (confronto con soglie).
- **GET-EFFECTIVE-UPLOAD-LIMIT-INV-2** — Sen

### `contracts/get-file-info-action.md` — GetFileInfoAction


# GetFileInfoAction

Legge i metadati di un oggetto con `headObject`, senza scaricarlo. Codice: `app/Actions/S3/GetFileInfoAction.php:10-66`.

## Input

- `string $key`: chiave dell'oggetto.

## Output

- Successo: `exists=true` con `key`, `effectiveUri`, `contentLength`, `contentType`, `lastModified`, `etag`, `metadata` (valori `null` o `[]` se assenti).
- Errore S3: `exists=false` con `error` e `errorCode` (status HTTP).

## Invarianti

- **GET-FILE-INFO-INV-1** — Il successo non scarica il corpo dell'oggetto.
  Test: nessuno.
- **GET-FILE-INFO-INV-2** — Ogni `S3Exception` diventa `exists=false`: anche un 403 risulta come «non esiste».
  Test: `tests/Unit/MediaCoverage100RemainingTest.php:57` (chiave mancante); `tests/Unit/Actions/MediaActionsCoverageTest.php:204` (solo struttura).

### `contracts/get-filesystem-adapter-action.md` — GetFilesystemAdapterAction


# GetFilesystemAdapterAction

Restituisce un disco come `FilesystemAdapter`, il tipo che espone `mimeType()`, `url()` e `temporaryUrl()`. Codice: `app/Actions/Storage/GetFilesystemAdapterAction.php:17-31`.

## Input

- `string $disk`: nome del disco.

## Output

- `FilesystemAdapter`: il disco richiesto.

## Invarianti

- **GET-FILESYSTEM-ADAPTER-INV-1** — Un disco che non è `FilesystemAdapter` lancia `RuntimeException`; un adapter valido è restituito così com'è.
  Test: nessuno.

## Effetti collaterali


### `contracts/get-media-exporter-action.md` — GetMediaExporterAction


# GetMediaExporterAction

Verifica che il valore prodotto da una catena fluent FFmpeg sia un `MediaExporter` e lo restituisce invariato. Codice: `app/Actions/Ffmpeg/GetMediaExporterAction.php:18-29`.

## Input

- `mixed $value`: risultato della catena fluent.

## Output

- `MediaExporter`: lo stesso oggetto ricevuto.

## Invarianti

- **RESOLVE-MEDIA-EXPORTER-INV-1** — Un `MediaExporter` è restituito senza modifiche (stessa istanza).
  Test: `tests/Unit/MediaGapCloserCoverageTest.php:82-85` (istanza del resolver, non il caso di input sbagliato).
- **RESOLVE-MEDIA-EXPORTER-INV-2** — Ogni altro valore lancia `RuntimeException` con il tipo ricevuto nel messaggio.
  Test: nessuno esplicito.


### `contracts/merge.md` — Merge


# Merge

Unisce più immagini in verticale in un unico file PNG. Espone due punti di ingresso: `handle()` con percorsi assoluti e `execute()` con percorsi relativi a `public_path()`. Codice: `app/Actions/Image/Merge.php:21-126`.

## Input

- `handle(string $path1, string $path2, string $outputPath)`: percorsi assoluti.
- `execute(array $filenames, string $outputFilename)`: lista di percorsi relativi a `public_path()`.

## Output

- Entrambi restituiscono `bool`: `true` se il file di output esiste dopo l'operazione.

## Invarianti

- **MERGE-INV-1** — Con due immagini in `handle()`, l'altezza è la somma delle altezze e la larghezza è la massima.
  Test: `tests/Unit/MediaCoverage100RemainingTest.php:88-101` («Image Merge con due png minimi»; verifica anche che esista `execute`).
- **MERGE-IN

### `contracts/parse-subtitle-xml-action.md` — ParseSubtitleXmlAction


# ParseSubtitleXmlAction

Legge un file di sottotitoli XML e produce una riga per ogni `item`, con inizio, fine, intervallo `HH:MM:SS,mmm` e testo. Codice: `app/Actions/Subtitle/ParseSubtitleXmlAction.php:22-98`.

## Input

- `string $filePath`: percorso del file. Solo l'estensione `xml` (minuscola o no) viene elaborata.

## Output

- `list<SubtitleRow>`: `sentence_i`, `item_i`, `start` e `end` in secondi (`ms / 1000`), `time`, `text`.

## Invarianti

- **PARSE-SUBTITLE-XML-INV-1** — Un file senza estensione o con estensione diversa da `xml` produce `[]` senza errore.
  Test: `tests/Unit/Actions/Subtitle/ParseSubtitleXmlActionTest.php:19` (estensione non xml) e `:25` (percorso senza estensione).
- **PARSE-SUBTITLE-XML-INV-2** — Gli indici `sentence_i` e `item_i` partono da 0 e si resettan

### `contracts/path-generator.md` — PathGenerator e PathGeneratorContract


# PathGenerator e PathGeneratorContract

Interfacce in `app/Contracts/PathGenerator.php` e `app/Contracts/PathGeneratorContract.php`: firme identiche, tre metodi
che restituiscono la cartella di un `Modules\Media\Models\Media`. Definiscono il contratto per la generazione dei percorsi
dei file media nel sistema.

| Metodo | Restituisce |
|---|---|
| `getPath(Media $media): string` | cartella del file originale |
| `getPathForConversions(Media $media): string` | cartella delle conversioni |
| `getPathForResponsiveImages(Media $media): string` | cartella delle immagini responsive |

Ogni metodo riceve `$media`, l'istanza del modello Media, e ritorna il percorso come stringa.

Stato verificato (2026-11-24): nessuna classe del repo implementa o usa nessuna delle due interfacce. Il generatore d

### `contracts/run-full-aws-diagnostic-action.md` — RunFullAwsDiagnosticAction


# RunFullAwsDiagnosticAction

Esegue in sequenza sette diagnostiche AWS e raccoglie i risultati per chiave. Codice: `app/Actions/Diagnostic/Aws/RunFullAwsDiagnosticAction.php:16-27`.

## Input

- Nessuno. Le diagnostiche leggono la configurazione `filesystems`.

## Output

- `array<string, mixed>` con le chiavi `s3`, `s3_permissions`, `s3_operations`, `cloudfront`, `cloudfront_signed`, `iam_credentials`, `iam_policies`. Ogni valore è l'array restituito dalla singola `Test*Action`.

## Invarianti

- **RUN-FULL-AWS-DIAGNOSTIC-INV-1** — Le chiavi sono sempre queste sette, nello stesso ordine, e ognuna contiene il risultato della propria Action.
  Test: nessuno.

## Effetti collaterali


### `contracts/run-s3-save-test-action.md` — RunS3SaveTestAction


# RunS3SaveTestAction

Salva un file di prova sul disco `s3`, genera URL CloudFront e temporanei, poi cancella il file di prova. Codice: `app/Actions/Diagnostic/S3/RunS3SaveTestAction.php:19-50`.

## Input

- `?string $attachmentPath`: percorso di un allegato da includere nel test; `null` o vuoto lo salta.
- `string $testFilePrefix = 'test-upload-'`: prefisso del file di prova (il nome aggiunge `time()` e `.txt`).

## Output

- `array`: `test_file` con `path`, `cloudfront_url` (5 min), `temporary_url` (5 min); `uploaded_file` a `null` oppure con gli stessi campi per l'allegato (30 min).

## Invarianti

- **RUN-S3-SAVE-TEST-INV-1** — Il file di prova è cancellato al termine del flusso normale.
  Test: nessuno.
- **RUN-S3-SAVE-TEST-INV-2** — `uploaded_file` è valorizzato solo se `$attachmen

### `contracts/save-attachments-action.md` — SaveAttachmentsAction


# SaveAttachmentsAction

Importa in media library gli allegati caricati su un disco temporaneo e salva sul record il percorso relativo di ciascun media.
Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SaveAttachmentsAction.php`.

## Input

- `$record`: un modello `HasMedia` (deve avere anche `update()`, cioe' essere un Eloquent Model).
- `$attachments`: nomi dei campi allegato (sono anche i nomi delle collezioni media).
- `$data`: dati del form, `campo => percorso` del file gia' caricato su `$disk`.
- `$disk`: disco di origine e di destinazione (default `attachments`).

## Output

- `void`.

## Invarianti


### `contracts/stream-video-action.md` — StreamVideoAction


# StreamVideoAction

Invia un file video dal disco al client con supporto all'header `Range`. Codice: `app/Actions/Stream/StreamVideoAction.php:21-178`.

## Input

- `string $disk`, `string $path`: disco e percorso del file.
- `?Media $media`: se presente, il proprietario è verificato.

## Output

- `void`. Scrive header e corpo direttamente sulla risposta, poi termina il processo con `exit`.

## Invarianti

- **STREAM-VIDEO-INV-1** — Un utente non autenticato riceve `401` (`abort`).
  Test: `tests/Unit/MediaGapAttackCoverageTest.php:88` (solo presenza della classe; nessun test del caso 401 trovato).
- **STREAM-VIDEO-INV-2** — Se `$media` è presente, `created_by` deve coincidere con l'utente (confronto `!=`) oppure l'utente deve avere `super-admin`; altrimenti `403`.
  Test: nessuno.

### `contracts/strip-image-metadata-action.md` — StripImageMetadataAction


# StripImageMetadataAction

Riscrive l'originale JPEG o PNG di un media senza metadati (EXIF, posizione GPS, fotocamera, XMP, chunk di testo).
Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Image/StripImageMetadataAction.php`. Perche': [ADR](../adr/0005-strip-image-metadata-server-side.md).

> Nessun chiamante nel modulo ne' in questo progetto (`rg StripImageMetadataAction` trova solo la definizione e il test): la
> richiama il codice del progetto ospite che la adotta, dopo il salvataggio di una foto allegata (vedi
> [la story](../stories/0024-media-mobile-camera-upload.story.md)).

## Input

- `Spatie\MediaLibrary\MediaCollections\Models\Media $media` gia' salvato, con il file sul suo `disk`: usa `mime_type`, `disk`, `g

### `contracts/svg-exists-action.md` — SvgExistsAction


# SvgExistsAction

Dice se un nome di icona è registrato in uno dei set BladeUI Icons. Codice: `app/Actions/Image/SvgExistsAction.php:16-50`.

## Input

- `string $svgName`: nome completo, es. `heroicon-o-user`.

## Output

- `bool`: `true` se il nome è nella lista di almeno un set.

## Invarianti

- **SVG-EXISTS-INV-1** — Stringa vuota (`empty()`) restituisce `false` senza interrogare il registro. Attenzione: `empty('0')` è vero, quindi anche `'0'` restituisce `false`.
  Test: nessuno.
- **SVG-EXISTS-INV-2** — Il confronto è esatto e case-sensitive sul nome.
  Test: nessuno.
- **SVG-EXISTS-INV-3** — La struttura dei set (array con chiave `icons` iterabile) è verificata con `Assert`; una struttura diversa lancia eccezione.

### `contracts/template.md` — <operazione> — contratto comportamentale


# <operazione> — contratto comportamentale

Classe o superficie: `<FQCN>`  
Riferimento nel codice: `@contract docs/contracts/<file>.md`

## Input

- <input e validazione>

## Output

- <risultato osservabile>

## Invarianti

| ID | Regola | Verifica |
|---|---|---|
| `<MODULE>-INV-1` | <regola che deve restare vera> | <test o controllo ripetibile> |


### `contracts/test-bucket-permissions-action.md` — TestBucketPermissionsAction


# TestBucketPermissionsAction

Prova in sequenza i permessi del bucket: list, put, get, delete di un oggetto di prova. Codice: `app/Actions/Diagnostic/S3/TestBucketPermissionsAction.php:22-112`.

## Input

- `string $testKeyPrefix = 'test-permissions-'`: prefisso della chiave di prova (aggiunge `time()` e `.txt`).

## Output

- `array`: `title` (`🔒 S3 Permissions`), `status`, `data` con `ListBucket`, `PutObject`, `GetObject`, `DeleteObject` (✅ OK o ❌ codice). Se la put fallisce, get e delete sono `Skipped`.

## Invarianti

- **TEST-BUCKET-PERMISSIONS-INV-1** — Se nessuna eccezione esce, lo `status` è sempre `success`, anche quando una probe fallisce: `success` indica solo che la diagnostica è stata completata.
  Test: nessuno.
- **TEST-BUCKET-PERMISSIONS-INV-2** — Se la put fallisce, get 

### `contracts/test-connection-details-action.md` — TestConnectionDetailsAction


# TestConnectionDetailsAction

Verifica il bucket con `headBucket`, legge la sua region con `getBucketLocation` e la confronta con la config. Codice: `app/Actions/Diagnostic/S3/TestConnectionDetailsAction.php:19-53`.

## Input

- Nessuno. Usa `CreateFilesystemS3ClientAction`.

## Output

- Successo: `status=success`, `data` con `Bucket Accessible`, `Bucket Region`, `Config Region`, `Region Match` (✅ o ⚠️).
- `AwsException`: `status=error` con `Error Code`, `Message`, `Solution`.

## Invarianti

- **TEST-CONNECTION-DETAILS-INV-1** — Una `LocationConstraint` vuota è letta come `us-east-1`.
  Test: nessuno.
- **TEST-CONNECTION-DETAILS-INV-2** — Un mismatch di region non cambia lo `status`: resta `success` con l'avviso nel `Region Match`.
  Test: nessuno.

### `contracts/test-credentials-action.md` — TestCredentialsAction


# TestCredentialsAction

Verifica le credenziali con STS `GetCallerIdentity` e restituisce account e ARN. Codice: `app/Actions/Diagnostic/S3/TestCredentialsAction.php:18-43`.

## Input

- Nessuno. Usa `CreateFilesystemStsClientAction`.

## Output

- Successo: `status=success`, `data` con `Valid = ✅ Yes`, `Account ID`, `User ARN`.
- `AwsException`: `status=error`, `data` con `Valid = ❌ No`, `Error` (codice), `Message`.

## Invarianti

- **TEST-CREDENTIALS-INV-1** — Una risposta valida produce `success` con account e ARN.
  Test: nessuno.
- **TEST-CREDENTIALS-INV-2** — `AwsException` diventa `status=error`.
  Test: nessuno.

### `contracts/test-file-upload-download-action.md` — TestFileUploadDownloadAction


# TestFileUploadDownloadAction

Prova upload, download, confronto del contenuto, esistenza e dimensione di un file su S3. Codice: `app/Actions/Diagnostic/S3/TestFileUploadDownloadAction.php:21-83`.

## Input

- Nessuno. Il file è `test-file-<time()>.txt` con un contenuto fisso.

## Output

- Successo: `status=success`, `details` con `file_uploaded`, `file_downloaded`, `content_verified`, `file_exists_check`, `file_size`, `cleanup_completed`, `test_file`.
- Errore: `status=error` con `message` e `details` (per le eccezioni: classe, file e riga).

## Invarianti

- **TEST-FILE-UPLOAD-DOWNLOAD-INV-1** — Il successo richiede che il contenuto scaricato sia identico a quello caricato.
  Test: nessuno.
- **TEST-FILE-UPLOAD-DOWNLOAD-INV-2** — Se `put` restituisce falso l'Action risponde con errore

### `contracts/test-iam-credentials-action.md` — TestIamCredentialsAction


# TestIamCredentialsAction

Verifica le credenziali chiamando STS `GetCallerIdentity`. Codice: `app/Actions/Diagnostic/Aws/TestIamCredentialsAction.php:17-43`.

## Input

- Nessuno. Usa `CreateFilesystemStsClientAction`.

## Output

- Successo: `status=success`, `details` con `Account`, `ARN`, `User ID` (`Unknown` se assenti).
- `AwsException`: `status=error`, `message` = `IAM credentials error: <codice>`, `details` con `Error` e `Solution` fissa.

## Invarianti

- **TEST-IAM-CREDENTIALS-INV-1** — Una risposta STS valida produce `success` con i tre campi identità.
  Test: nessuno.
- **TEST-IAM-CREDENTIALS-INV-2** — `AwsException` non esce dall'Action: diventa `status=error`.
  Test: nessuno.

### `contracts/test-iam-policies-action.md` — TestIamPoliciesAction


# TestIamPoliciesAction

Verifica indirettamente le policy IAM provando `headBucket` e `listObjectsV2` sul bucket. Codice: `app/Actions/Diagnostic/Aws/TestIamPoliciesAction.php:17-47`.

## Input

- Nessuno. Usa `CreateFilesystemS3ClientAction` (client e bucket).

## Output

- Successo: `status=success` con `S3 Access`, `List Objects`, `Bucket Access` sempre `OK`.
- `AwsException`: `status=error`, `message` = `IAM policies error: <codice>`, `Solution` fissa.

## Invarianti

- **TEST-IAM-POLICIES-INV-1** — Il successo richiede entrambe le chiamate (HEAD bucket e list con `MaxKeys=1`) senza eccezioni.
  Test: nessuno.

## Effetti collaterali

### `contracts/update-model-subtitle-field-action.md` — UpdateModelSubtitleFieldAction


# UpdateModelSubtitleFieldAction

Estrae il testo di un sottotitolo e lo salva in un campo del modello. Codice: `app/Actions/Subtitle/UpdateModelSubtitleFieldAction.php:13-25`.

## Input

- `Model $model`: il modello da aggiornare.
- `string $filePath`: file XML di sottotitoli.
- `string $fieldName = 'txt'`: campo di destinazione.

## Output

- `Model`: lo stesso modello dopo `update()`.

## Invarianti

- **UPDATE-MODEL-SUBTITLE-FIELD-INV-1** — Il valore salvato è quello restituito da `ExtractSubtitlePlainTextAction`.
  Test: `tests/Unit/Actions/Subtitle/SubtitleTextActionsTest.php:46`.


### `contracts/upload-file-action.md` — UploadFileAction


# UploadFileAction

Carica un file locale su S3 con `ObjectUploader` (multipart automatico per i file grandi). Codice: `app/Actions/S3/UploadFileAction.php:26-112`.

## Input

- `string $localFilePath`: file locale leggibile.
- `string $destinationFilePath`: chiave S3 di destinazione.
- `array<string, mixed> $options`: opzioni AWS, unite a un default (`ACL=private`, `ContentType` da `mime_content_type` o `application/octet-stream`); i valori passati vincono.

## Output

- Successo: `['success' => true, 'objectUrl', 'etag', 'key', 'bucket']`.
- Errore: `['success' => false, 'error' => messaggio]` (con `errorTrace` per le eccezioni in upload).

## Invarianti

- **UPLOAD-FILE-INV-1** — Un file inesistente o non leggibile non produce eccezione: restituisce `success=false` e registra un errore

### `contracts-naming.md` — Contracts Naming & Placement in Media


# Contracts Naming & Placement in Media

> A contract is an **agreement**, not a PHP keyword. We name it `*Contract` and place it under `app/Contracts/`.

## Rule

- ✅ `app/Contracts/ExampleContract.php`
- ❌ `app/Interfaces/ExampleInterface.php`

## Why

- `Contract` describes the domain concept (a pact between components).
- `interface` describes a PHP implementation detail.
- One folder (`app/Contracts/`) keeps the module language consistent and reduces cognitive noise.
- Aligned with Laravel `Illuminate\Contracts\*` convention.

## Verification

```bash

### `conversione-media.md` — Conversione Media

# Conversione Media

## Risorse Utili

### Conversione Video
- [Guida alla conversione video in Laravel](https://tobyokeke.com/how-to-convert-uploaded-videos-in-laravel-1d605baf5033)
- [Conversione di file video di grandi dimensioni con PHP FFmpeg](https://stackoverflow.com/questions/76302960/convert-large-video-files-with-php-ffmpeg)
- [Esempio di implementazione FFmpeg](https://gist.github.com/Nks/b3b1cd7398a560eda8ddb7e37901869e?permalink_comment_id=3450216)

### Streaming e Gestione File Temporanei
- [Gestione directory temporanee in Laravel](https://laravel-news.com/temporary-directory)

```php
use Illuminate\Support\Facades\Http;
use Spatie\TemporaryDirectory\TemporaryDirectory;

// Normalizzazione URL video e ottenimento filename
$videoUrl = str($videoUrl)->replace(' ', '%20');
$tmp

### `convert.md` — convert

https://tobyokeke.com/how-to-convert-uploaded-videos-in-laravel-1d605baf5033

https://stackoverflow.com/questions/76302960/convert-large-video-files-with-php-ffmpeg


->addFilter(['-filter:a', 'volumedetect', '-f', 'null'])




https://gist.github.com/Nks/b3b1cd7398a560eda8ddb7e37901869e?permalink_comment_id=3450216
---
https://gist.github.com/Nks/b3b1cd7398a560eda8ddb7e37901869e?permalink_comment_id=3450216

### `copilot-redundancy-audit.md` — copilot-redundancy-audit

Copilot Redundancy Audit — 2026-05-25

Sintesi
- Presenza di file e documenti simili in molti moduli; suggerisce opportunità di consolidamento (es.: upload.txt, image.txt, README.md).

Raccomandazioni
- Centralizzare esempi di upload e gestione media in un documento condiviso e referenziarlo da ogni modulo.
- Standardizzare nomi e posizioni dei file docs per miglior ricerca automatica.

Autore: Copilot CLI

### `core-functionality.md` — Core Functionality

# Core Functionality

### `corrections-summary.md` — Riepilogo Correzioni S3Test.php - Modulo Media

# Riepilogo Correzioni S3Test.php - Modulo Media

## 🎯 **Obiettivo Completato**

Ho analizzato e corretto completamente il file `S3Test.php` nel modulo Media, risolvendo tutti i problemi identificati e implementando misure preventive per evitare che si ripresentino in futuro.

## 📋 **Problemi Identificati e Risolti**

### 1. **❌ Violazioni Architetturali Critiche**
**Problema**: Import diretti tra moduli (`Modules\Notify\Datas\EmailData`, `Modules\Notify\Emails\EmailDataEmail`)
**Soluzione**: 
- ✅ Rimossi tutti gli import diretti tra moduli
- ✅ Eliminata dipendenza dal modulo Notify
- ✅ Semplificata logica email con logging nativo
- ✅ Implementato disaccoppiamento modulare

### 2. **❌ Problemi di Tipizzazione PHPStan**
**Problema**: Uso di `mixed`, mancanza type hints, tipi di ritorno non 

### `corrections.md` — Riepilogo Correzioni S3Test.php - Modulo Media

# Riepilogo Correzioni S3Test.php - Modulo Media

## 🎯 **Obiettivo Completato**

Ho analizzato e corretto completamente il file `S3Test.php` nel modulo Media, risolvendo tutti i problemi identificati e implementando misure preventive per evitare che si ripresentino in futuro.

## 📋 **Problemi Identificati e Risolti**

### 1. **❌ Violazioni Architetturali Critiche**
**Problema**: Import diretti tra moduli (`Modules\Notify\Datas\EmailData`, `Modules\Notify\Emails\EmailDataEmail`)
**Soluzione**: 
- ✅ Rimossi tutti gli import diretti tra moduli
- ✅ Eliminata dipendenza dal modulo Notify
- ✅ Semplificata logica email con logging nativo
- ✅ Implementato disaccoppiamento modulare

### 2. **❌ Problemi di Tipizzazione PHPStan**
**Problema**: Uso di `mixed`, mancanza type hints, tipi di ritorno non 

### `cosa-migliorare.md` — Cosa migliorare — modulo Media


# Cosa migliorare — modulo Media

Ogni affermazione qui sotto viene da un comando eseguito il 1 settembre 2026, dopo il
ripristino di `vendor/` a 330 pacchetti. Le misure precedenti a quella data giravano su
un autoloader dimezzato e non valgono.

## I numeri

| | |
|---|---:|
| Errori PHPStan (modulo isolato) | 0 |
| Rilievi PHPMD su `app/` | 171 |
| PHPInsights — Code | 91.8 % |
| PHPInsights — Architecture | 100 % |
| PHPInsights — Style | 90.1 % |
| File PHP | 243 |
| Casi di test | 314 |
| Casi di test per file | 1.29 |
| Coverage di riga | **mai misurata** |

### `coverage.md` — Media Module Test Coverage


# Media Module Test Coverage

## Coverage Results

**Date**: [DATE]  
**Module**: Media  
**Status**: Tests pass but 0.00% per-module code coverage

## Test Execution Summary

- **Tests Passed**: 59
- **Tests Skipped**: 5
- **Assertions**: 122
- **Coverage (Modules/Media/app)**: 0.00% (0/2140 statements)

## Running Tests

```bash
./vendor/bin/pest Modules/Media/tests

### `custom-properties-guide.md` — Custom Properties — spatie/laravel-medialibrary

# Custom Properties — spatie/laravel-medialibrary

**Package**: [`spatie/laravel-medialibrary`](https://spatie.be/docs/laravel-medialibrary/v11/advanced-usage/using-custom-properties)
**Relation**: Conceptually similar to `spatie/laravel-schemaless-attributes` — both store JSON metadata

---

## Overview

Custom properties let you attach arbitrary metadata to media items as JSON. They are stored in the `custom_properties` column of the `media` table.

---

## Setting Custom Properties

```php
// During upload
$model->addMedia($pathToFile)
    ->withCustomProperties([
        'primary_color' => 'red',

### `cyclomatic-complexity-report.md` — Cyclomatic Complexity Report - Module: Media

# Cyclomatic Complexity Report - Module: Media

**Analyzer:** Super Mucca 🐮

---

## 📊 Summary Statistics

| Metric | Value |
|--------|-------|
| Total PHP Files | 134 |
| Total Lines of Code | 9694 |
| Total Classes/Traits/Interfaces | 94 |
| Total Methods | 369 |
| High Complexity Methods (>10) | 0 |

---

## 🎯 Cyclomatic Complexity Overview


### `data-models.md` — Data Models

# Data Models

### `decision-log.md` — Decision Log — Media


# Decision Log — Media

A threaded, append-only record of decisions made across BMAD planning workflows.
Every later skill (brief, PRD, architecture, stories) appends here so the reasoning
behind the plan stays visible and consistent.

**How to use:** add a new entry at the top of the log (newest first). Never rewrite
or delete past entries — supersede them with a new entry that references the old one.

### YYYY-MM-DD — Initial commit
- **Decision:** Initial BMAD documentation setup for Media module
- **Rationale:** Establish decision trail for module development
- **Made by:** bmad-init
- **Supersedes:** none

### `dependencies.md` — Dependencies (Module Media)

# Dependencies (Module Media)

Canonical dependency map:

- [../../../../docs/dependencies.md](../../../../docs/dependencies.md)

Module/theme specific notes:

- (add notes here when a dependency is directly used by this module/theme)

Installed packages index:

- [../../../../docs/packages/index.md](../../../../docs/packages/index.md)

### `dependency-intelligence.md` — Dependency Intelligence - Module Media

# Dependency Intelligence - Module Media

Aggiornato da `composer show` il 2026-03-02.

## Runtime dependencies (`require`)

| Package | Constraint | Installed | Area |
|---|---|---|---|
| `intervention/image` | `*` | `3.11.6` | `application-support` |
| `pbmedia/laravel-ffmpeg` | `^8.5` | `8.7.1` | `application-support` |
| `php` | `^8.2` | `platform-php` | `platform` |

## Dev dependencies (`require-dev`)

| Package | Constraint | Installed | Area |
|---|---|---|---|
| _(none)_ | - | - | - |

## Declared but missing from installed set


### `development/roadmap-root-symlink.md` — Collegamenti tra versioni di roadmap_root_symlink.md

roadmap_media.md
## Collegamenti tra versioni di roadmap_root_symlink.md
* [roadmap_root_symlink.md](../../../notify/docs/roadmap_root_symlink.md)
* [roadmap_root_symlink.md](../../../media/docs/roadmap_root_symlink.md)

### `development/roadmap.md` — Media Module Roadmap

# Media Module Roadmap

## Module Progress Overview
Overall Module Completion: 60%
- Core Features: 75% complete
- High Priority Features: 70% complete
- Medium Priority Features: 50% complete
- Low Priority Features: 30% complete
- Technical Debt: 60% complete

## Technical Metrics Overview

### Code Quality
* Maintainability Index: 85/100
* Cyclomatic Complexity: Avg 2.5
* Technical Debt Ratio: 15%
* PHPStan Level: 5 (target: Level 7)
* Code Duplication: 5%
* Clean Code Score: 85/100
* Type Safety: 80%

### `directory-structure-rules.md` — Directory Structure Rules

# Directory Structure Rules

Per il modulo Media valgono queste regole:

- `lang/lang/` non deve esistere;
- `_docs/` non deve esistere;
- le traduzioni ufficiali stanno in `lang/<locale>/`;
- la documentazione ufficiale sta in `docs/`.

La vecchia cartella duplicata individuata era `Media/bashscripts/_docs`.

Regola canonica: [no-lang-lang-and-no-underscore-docs-rule](../../../../bashscripts/ai/wiki/concepts/modules-structure-rules.md#no-lang-lang-and-no-underscore-docs-rule).

### `docs-health.md` — Docs Health - Media

# Docs Health - Media

## Snapshot

- Scope directory: laravel/Modules/Media/docs
- Markdown files (top-level in this docs folder): 159
- Has canonical index 00-index.md: yes
- Has README.md: yes

## Confidence Checklist

- [ ] 00-index links only canonical docs (no obsolete duplicates)
- [ ] README and 00-index are coherent and do not diverge
- [ ] New docs use stable names (no dates in filename)
- [ ] Deprecated docs are explicitly marked and linked to canonical replacements
- [ ] Every technical decision has one canonical reference doc

## Canonical Rules

1. Read order: 00-index.md -> README.md -> focused docs.

### `dry-kiss-analysis.md` — 🐄 DRY & KISS Analysis - Media

# 🐄 DRY & KISS Analysis - Media

**Data:** 2026-11-24 (conteggi rimisurati sul codice) | **Status:** ✅

## 📊 Struttura
Models: 4 (`app/Models/*.php`, incluso `BaseModel`) | Resources: 3 | Services: 0 | Actions: 51 | Docs: 566 `.md`

## 🎯 Score: 7/10 🟢 **BUONO**

## ✅ PUNTI DI FORZA
- BaseModel: 32 LOC ✅
- Spatie Media integration ⭐
- Actions pattern buono (51)

## ⚠️ MIGLIORAMENTI
1. **Resources** (3): Helpers (~60 LOC)
2. **51 Actions, 0 Services**: la logica sta tutta nelle Action
3. **Docs** (566 file `.md`): da tenere sotto controllo (duplicati e collisioni di maiuscole)

## 🚀 PIANO

### `duplicate-files-to-remove.md` — File Duplicati da Eliminare - Modulo Media

# File Duplicati da Eliminare - Modulo Media

## 🗑️ File da Eliminare (Case Sensitivity)

```bash
# Elimina file lowercase (duplicato)
rm Modules/Media/tests/Filament/Resources/mediaconvertresourcetest.php
```

## ✅ File da Mantenere

```bash
# Mantieni file UpperCamelCase (corretto PSR-4)
Modules/Media/tests/Filament/Resources/MediaConvertResourceTest.php
```

## 📜 Regola

**File PHP con classi DEVONO usare UpperCamelCase (PascalCase) identico al nome della classe (PSR-4).**


### `epics/media-epics-and-stories.md` — Media Epics and User Stories

# Media Epics and User Stories

## Epic 1: Core Functionality
As a User, I want to use Media features so that I can accomplish my tasks.

### Story 1.1: Basic Operations
**Acceptance Criteria**:
- [ ] Create Media records
- [ ] Read Media data
- [ ] Update Media records
- [ ] Delete Media records

## Technical Specifications
- Standard CRUD implementation
- Validation and error handling
- Integration with Laraxot patterns

---
## Story Template
```

### `false-friends.md` — Contenuto fuso da `false-friends.md`


```

```
---
title: "false friends"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "false friends"
issues: []
discussions: []

## Contenuto fuso da `false-friends.md`

# False Friends – Media Module

| Concept | Misconception | Correction |
|---------|---------------|------------|

### `ffmpeg-integration.md` — Integrazione di FFmpeg nel Modulo Media

# Integrazione di FFmpeg nel Modulo Media

Questa guida documenta l'integrazione del pacchetto [protonemedia/laravel-ffmpeg](https://github.com/protonemedia/laravel-ffmpeg) all'interno del modulo Media, basandosi sulle seguenti risorse:

- GitHub: https://github.com/protonemedia/laravel-ffmpeg
- Protone Media Blog: https://protone.media/en/blog/how-to-use-ffmpeg-in-your-laravel-projects
- Laracasts Discuss: https://laracasts.com/discuss/channels/laravel/laravel-ffmpeg
- Laravel News: https://laravel-news.com/laravel-ffmpeg-tools
- Medium: https://medium.com/@rlmc/converting-videos-with-ffmpeg-and-laravel-workflow-eb1d8eb0ef7b
- Laracasts Discuss: https://laracasts.com/discuss/channels/laravel/in-regards-to-laravel-ffmpeg
- StackOverflow: https://stackoverflow.com/questions/65087821/how-to-

### `ffmpeg-usage-utilizzo-laravel-modulo-media.md` — Utilizzo di Laravel-FFMpeg nel Modulo Media

# Utilizzo di Laravel-FFMpeg nel Modulo Media

## Introduzione

Il modulo Media utilizza la libreria [Laravel-FFMpeg](https://github.com/protonemedia/laravel-ffmpeg) versione 8.7.1 per gestire la conversione e la manipolazione di file video e audio. Questa libreria è un wrapper intorno a FFmpeg che si integra perfettamente con Laravel, sfruttando il sistema di gestione dei file di Laravel.

## Struttura e Namespace

La versione 8.7.1 di Laravel-FFMpeg utilizza i seguenti namespace principali:

```php
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;
use ProtoneMedia\LaravelFFMpeg\Exporters\EncodingException;
```

**Nota importante**: Nelle versioni precedenti, alcune classi come `MediaExporter`

### `ffmpeg-usage.md` — Utilizzo di Laravel-FFMpeg nel Modulo Media

# Utilizzo di Laravel-FFMpeg nel Modulo Media

## Introduzione

Il modulo Media utilizza la libreria [Laravel-FFMpeg](https://github.com/protonemedia/laravel-ffmpeg) versione 8.7.1 per gestire la conversione e la manipolazione di file video e audio. Questa libreria è un wrapper intorno a FFmpeg che si integra perfettamente con Laravel, sfruttando il sistema di gestione dei file di Laravel.

## Struttura e Namespace

La versione 8.7.1 di Laravel-FFMpeg utilizza i seguenti namespace principali:

```php
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;
use ProtoneMedia\LaravelFFMpeg\Exporters\EncodingException;
```

**Nota importante**: Nelle versioni precedenti, alcune classi come `MediaExporter`

### `ffmpeg.md` — ffmpeg

WINDOWS

https://www.gyan.dev/ffmpeg/builds/

choco install ffmpeg
choco install ffmpeg-full
winget install ffmpeg


$ which ffmpeg
$ which ffprobe


add to .env
FFMPEG_PATH=c:/ProgramData/chocolatey/bin/ffmpeg.exe
FFPROBE_PATH=c:/ProgramData/chocolatey/bin/ffprobe.exe

### `filament/laraxot-compliance-checklist.md` — Checklist Conformità Laraxot - Modulo Media

# Checklist Conformità Laraxot - Modulo Media

## 🎯 **CHECKLIST PRE-COMMIT OBBLIGATORIA**

### 📁 **Struttura e Namespace**
- [ ] Namespace corretto: `Modules\{ModuleName}\{Directory}` (senza segmento 'app')
- [ ] File posizionato in `Modules/{ModuleName}/app/` per classi applicative
- [ ] Estensione da classi XotBase* appropriate (XotBasePage, XotBaseResource, etc.)
- [ ] `declare(strict_types=1);` presente all'inizio di ogni file PHP

### 🔤 **Traduzioni**
- [ ] Nessuna stringa hardcoded nelle interfacce utente
- [ ] Traduzioni sempre del modulo corrente: `{module}::*` (mai cross-modulo)
- [ ] Struttura espansa per campi: `label`, `placeholder`, `helper_text`
- [ ] File traduzione in `Modules/{ModuleName}/lang/{locale}/`

### 🏗️ **Filament Components**
- [ ] `getFormSchema()` restituisce a

### `filament/s3test-refactoring-analysis.md` — S3Test.php - Analisi Refactoring e Regole di Conformità Laraxot

# S3Test.php - Analisi Refactoring e Regole di Conformità Laraxot

## 🚨 **PROBLEMATICHE IDENTIFICATE E RISOLTE**

### 1. **Traduzioni Hardcoded** (CRITICO)
- **❌ ERRORE**: Uso di `ui::s3test.*` invece di traduzioni del modulo Media
- **✅ RISOLTO**: Convertito a `media::s3test.*` per rispettare le regole modulo-specifiche
- **REGOLA VIOLATA**: Traduzioni devono essere sempre del modulo corrente, mai cross-modulo
- **IMPATTO**: 12 occorrenze corrette in actions e notifications

### 2. **Metodi Non Tipizzati** (CRITICO)
- **❌ ERRORE**: Metodi privati senza tipi di ritorno espliciti
- **✅ RISOLTO**: Aggiunto tipo di ritorno `array<string, mixed>` o `string` o `void` a tutti i metodi
- **REGOLA VIOLATA**: PHPStan livello 9+ richiede tipizzazione completa
- **IMPATTO**: 8 metodi corretti con PHP

### `filament-5x-compatibility.md` — Filament 5.x compatibility - modulo Media

# Filament 5.x compatibility - modulo Media

**Versione Filament:** v5.2.1

## Stato compatibilità

Il modulo Media è **compatibile** con Filament 5.x. Nessun breaking change funzionale.

## Regole architetturali

Tutte le classi Filament **devono** estendere le classi `XotBase*` (vedi [regole Xot](../../Xot/docs/filament-5-laraxot-rules.md)).


## Inclusione nei Blade View

Per includere un widget Filament (che è un componente Livewire) all'interno di una vista Blade o di una pagina Folio, **non** usare la sintassi del tag `<livewire:module::widget-name />` a meno che non sia esplicitamente registrato. 

La sintassi corretta e sicura per Filament 5.x è l'uso diretto della classe:

```blade

### `filament-resource-conflict-resolution.md` — Risoluzione conflitto git su Filament MediaConvertResource

# Risoluzione conflitto git su Filament MediaConvertResource

## Problema
Sono stati rilevati marker di conflitto git  nel file `app/Filament/Resources/MediaConvertResource.php` del modulo Media. Il conflitto coinvolge la definizione della proprietà statica `$navigationIcon` e la struttura del metodo statico `getFormSchema()`.

## Analisi
- Diverse versioni del metodo `getFormSchema()` differivano nella modalità di restituzione degli array di componenti Filament (uso di chiavi vs array semplice).
- Alcune versioni duplicavano la definizione della proprietà `$navigationIcon`.
- La versione più chiara e manutenibile è quella che restituisce un array di componenti (senza chiavi), con tutte le opzioni Radio e TextInput, e una sola dichiarazione di `$navigationIcon`.

## Scelta
- Mantenere una 

### `filament-version.md` — Filament Version Declaration — Media

# Filament Version Declaration — Media

**Current Version**: Filament v5 (Livewire v4 + Schemas)

This module/theme is developed against **Filament v5**.

All resources, forms, tables, infolists, widgets and actions must follow the v5 + XotBase patterns documented in:

- `docs/wiki/rules/filament-rules-summary.md`
- `docs/wiki/memories/filament-version-policy.md`
- `laravel/Modules/Xot/docs/filament-5-laraxot-rules.md`

**Legacy v4 documents** in this folder (if any) are historical only and must not be used as current reference.

**Last verified**: 2026-05-21

**Firmato:** Cursor Agent (Composer) — template propagato ai package `docs/`

### `file-management-architecture.md` — Media Module - File Management Architecture

# Media Module - File Management Architecture

## 🎯 Module Overview

Il modulo Media è il sistema centrale per la gestione di file, immagini, video e media assets nell'applicazione. Fornisce upload sicuro, processing automatico, storage distribuito (locale/S3), conversioni on-demand, e gestione avanzata di attachment con metadata completi.

## 🏗️ Core Architecture

### Multi-Layer Media System
```
Media Management Stack
├── Upload Layer
│   ├── Temporary Uploads (Session-based)
│   ├── Direct S3 Uploads
│   ├── Chunked Uploads (Large Files)
│   └── Drag & Drop Interface
├── Processing Layer
│   ├── Image Conversions
│   ├── Video Transcoding
│   ├── Thumbnail Generation

### `file-management.md` — Gestione dei File in <nome progetto>

# Gestione dei File in <nome progetto>

## Panoramica

Questo documento descrive le best practice per la gestione dei file in <nome progetto>, inclusi il caricamento, l'archiviazione e l'accesso ai file in diverse parti dell'applicazione.

## Struttura delle Directory

<nome progetto> utilizza una struttura organizzata per l'archiviazione dei file:

```
/storage
  /app
    /public
      /avatars            # Avatar degli utenti
      /certifications     # Certificazioni dei dottori
      /documents          # Documenti generali
      /reports            # Report e documenti generati
      /temp               # File temporanei
```

### `file-naming-rules.md` — Regole di Naming per File

# Regole di Naming per File

## 🎯 Regola Fondamentale: NO Duplicati Case-Insensitive

### Problema

Su filesystem case-insensitive (Windows, macOS default), file con nomi che differiscono solo per maiuscole/minuscole causano conflitti:

```
❌ ERRATO - Duplicati case-insensitive:
- README.md e README.md
- Activity.php e activity.php
- listrecords.md e listrecords.md
```

### Soluzione

**Mantenere SOLO la versione con naming corretto secondo le convenzioni:**

## 📋 Convenzioni di Naming

### `fileupload-foreach-error-fix.md` — FileUpload foreach Error Fix - Internal Server Error

# FileUpload foreach Error Fix - Internal Server Error

## Problema Identificato

### Errore
```
ErrorException
foreach() argument must be of type array|object, string given
POST 127.0.0.1:8000
```

L'errore si verifica nel metodo `getUploadedFiles` di `Filament\Forms\Components\BaseFileUpload:740` quando il componente tenta di processare i file caricati durante la registrazione del paziente.

### Contesto dell'Errore
- **Widget**: `Modules\User\Filament\Widgets\RegistrationWidget`
- **Resource**: `Modules\<nome progetto>\Filament\Resources\PatientResource`
- **Campi coinvolti**:
  - `data.health_card`
  - `data.identity_document`
  - `data.isee_certificate`

### `folio-volt-best-practices.md` — Laravel Folio + Volt - Best Practices and Patterns Analysis

# Laravel Folio + Volt - Best Practices and Patterns Analysis

## Overview

Based on research of multiple Laravel Folio + Volt repositories and official documentation, this document outlines the best practices and patterns for implementing Folio + Volt in applications.

## Key Patterns Identified

### 1. File Structure
- **Pages Directory**: Folio automatically maps files in `resources/views/pages/` to routes
  - Example: `resources/views/pages/events.blade.php` → `/events`
  - Example: `resources/views/pages/events/[event].blade.php` → `/events/{event}`
- **Subdirectories**: Organize related pages in subdirectories (e.g., `resources/views/pages/auth/`)
- **Blade Components**: Store reusable UI components in `resources/views/components/`

### 2. Volt Component Structure
- Volt components c

### `frameworks.md` — Media — Framework Integration Notes


# Media — Framework Integration Notes

Integration guidelines for caveman, graphify, bmad-method, headroom, ponytail.

**Status:** Awaiting Phase 3 framework research results

## Code Review (caveman)

Surgical editing patterns:
- Single-file edits encouraged
- Multi-file refactors discouraged
- Mechanical renames via caveman agent

## Architecture (graphify)

Dependency analysis:
- Module dependencies: [TBD — graphify analysis]
- Circular deps: [TBD]
- Cross-theme usage: [TBD]

### `git-conflict-resolution.md` — Audit collisioni Git committate in bashscripts


# Audit collisioni Git committate in bashscripts

Risoluzione deterministica per singolo blocco: lato non vuoto, superset, metadata `updated` più recente, quindi HEAD come spareggio conservativo.

| File | Blocchi | Decisioni | SHA-256 prima → dopo |
|---|---:|---|---|
| `laravel/Modules/Media/docs/code-quality-improvement-report.md` | 1 | shorter_tiebreak=1 | `dd69871c8241` → `1753fade1da4` |

### `git-multi-org-sync-handoff.md` — Handoff — multi-org sync (STORY-003)


# Handoff — multi-org sync (STORY-003)

## Scopo

Allineare questo owner ai remote raggiungibili (**0 0**, working tree clean) e documentare decisioni di sessione 2026-07-21.

## Perché

Un tree dirty o un remote dietro/avanti **non** è sincronizzato, anche se l’altro org è a posto. Su PTVX i path vivono in `gitmodules.ini` con org `provtv` (+ `laraxot` se esiste).

## Link

| Tipo | URL |
|------|-----|
| Issue owner | https://github.com/provtv/module_media_fila5/issues/13 |
| Discussion | https://github.com/provtv/base_ptv_fila5/discussions/204 |
| Hub base issue | https://github.com/provtv/base_ptv_fila5/issues/203 |
| Hub base discussion | https://github.com/provtv/base_ptv_fila5/discussions/204 |
| Story monorepo | `docs/stories/STORY-003-multi-org-sync-geo-boundary-bashscripts.md` |

### `glossary.md` — Glossario di dominio Media


# Glossario di dominio Media

Termini verificati nel codice con `rg`. Se glossario e codice divergono vale il codice.
Percorsi relativi a `laravel/Modules/Media/`.

| Termine | Significato | Nel codice |
|---|---|---|
| Media | File allegato a un record, con `uuid`, `collection_name`, `mime_type`, `disk`, `conversions_disk`, conversioni. | `app/Models/Media.php`, risorsa `app/Filament/Resources/MediaResource.php` |
| Collezione | Nome del gruppo di file di un record (`collection_name`). | `Media::$collection_name` |
| Disk | Storage su cui sta il file (`disk`) e, separato, quello delle conversioni (`conversions_disk`). | `Media::$disk`, `Media::$conversions_disk` |
| Conversione | Derivato del file originale (miniature, formati video). | `app/Models/MediaConvert.php`, `Media::$entry_conve

### `guida-migrazione-step-by-step.md` — guida-migrazione-step-by-step

---
---

### `html2pdf/advanced.md` — Funzionalità Avanzate

# Funzionalità Avanzate

Questa sezione copre funzionalità avanzate come la generazione di codici a barre, QR code, la creazione di segnalibri (bookmark), indici e altri metodi utili della libreria.

**Menu di Navigazione:**
*   [Panoramica e Installazione](./index.md)
*   [Utilizzo Base e Layout](./usage.md)
*   [Guida agli Stili](./styling.md)
*   [Integrazione con Laravel e Best Practices](./laravel.md)
*   [Configurazione della Sicurezza](./security.md)

---

## 📋 Codici a Barre e QR Code

### Barcode
Html2Pdf può generare diversi tipi di codici a barre direttamente nel PDF.

```html
<barcode type="C39" value="HTML2PDF" style="width: 40mm; height: 10mm; color: #000;"></barcode>

### `html2pdf/laravel.md` — Integrazione con Laravel e Best Practices

# Integrazione con Laravel e Best Practices

Questa guida si concentra su come integrare e utilizzare `Html2Pdf` in un'applicazione Laravel, seguendo le best practice specifiche del progetto Laraxot.

**Menu di Navigazione:**
*   [Panoramica e Installazione](./index.md)
*   [Utilizzo Base e Layout](./usage.md)
*   [Guida agli Stili](./styling.md)
*   [Funzionalità Avanzate](./advanced.md)
*   [Configurazione della Sicurezza](./security.md)

---

## 🔗 Integrazione con Laravel

### Service Provider
È consigliabile registrare `Html2Pdf` nel container di servizi di Laravel per una facile dependency injection.

```php
// In un ServiceProvider, ad esempio PdfServiceProvider.php

### `html2pdf/security.md` — Configurazione della Sicurezza

# Configurazione della Sicurezza

A partire dalla versione 5.3, `Html2Pdf` ha introdotto un `Security Service` per controllare l'accesso a risorse esterne (immagini, fogli di stile, etc.) e prevenire vulnerabilità.

**Menu di Navigazione:**
*   [Panoramica e Installazione](./index.md)
*   [Utilizzo Base e Layout](./usage.md)
*   [Guida agli Stili](./styling.md)
*   [Funzionalità Avanzate](./advanced.md)
*   [Integrazione con Laravel e Best Practices](./laravel.md)

---

## 🛡️ Security Service

Il servizio di sicurezza permette di definire policy per validare gli URI delle risorse esterne.

### Implementazione di una Policy di Sicurezza Personalizzata
È possibile creare una classe che implementa `Spipu\Html2Pdf\Security\SecurityInterface` per definire la propria logica di validazione.


### `html2pdf/styling.md` — Guida agli Stili, Tabelle e Immagini

# Guida agli Stili, Tabelle e Immagini

Questa guida illustra come applicare stili CSS, creare layout con tabelle e gestire le immagini nei PDF generati con Html2Pdf.

**Menu di Navigazione:**
*   [Panoramica e Installazione](./index.md)
*   [Utilizzo Base e Layout](./usage.md)
*   [Funzionalità Avanzate](./advanced.md)
*   [Integrazione con Laravel e Best Practices](./laravel.md)
*   [Configurazione della Sicurezza](./security.md)

---

## 🎨 Stili e CSS

Html2Pdf ha un supporto limitato per i CSS. La regola fondamentale è utilizzare **esclusivamente CSS inline** tramite l'attributo `style`. Tag `<style>` e fogli di stile esterni (`<link>`) non sono supportati.

#### ✅ CSS Inline Corretto
```html
<div style="font-family: Arial; font-size: 12pt; color: #333;">

### `html2pdf/usage.md` — Utilizzo Base e Layout

# Utilizzo Base e Layout

Questa sezione descrive l'utilizzo di base della libreria, come istanziare la classe `Html2Pdf` e come gestire il layout delle pagine con i tag speciali.

**Menu di Navigazione:**
*   [Panoramica e Installazione](./index.md)
*   [Guida agli Stili](./styling.md)
*   [Funzionalità Avanzate](./advanced.md)
*   [Integrazione con Laravel e Best Practices](./laravel.md)
*   [Configurazione della Sicurezza](./security.md)

---

## 🔧 Utilizzo Base

### Istanza Html2Pdf
```php
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf(

### `icon-usage-guidelines.md` — Media Module Icon Usage Guidelines

# Media Module Icon Usage Guidelines

## File Location
All custom SVG icons for the Media module must be placed in:
```
Modules/Media/resources/svg/
```

## Naming Conventions
- Use kebab-case for all icon filenames (e.g., `media-convert.svg`)
- Prefix icon names with `media-` to avoid naming conflicts
- Keep names descriptive and consistent with their function

## Usage in Code
Reference icons in PHP code using the kebab-case name without the `.svg` extension:

```php
// Correct
->icon('media-convert')


### `investigation/investigation.md` — Investigation: Media Optimization Workflow

# Investigation: Media Optimization Workflow

## Problem Statement
Analisi delle feature mancanti nel modulo Media.

## Current State
- Documentazione esistente: 21 stories
- Architettura: Actions,Console,Contracts,Conversions,Datas,Enums,Exceptions,Filament,Http,Models,Providers,Rules,Services,Support,View,conversions,

## Feature Missing
1. Feature A - descrizione
2. Feature B - descrizione
3. Feature C - descrizione

## Proposed Solution
- Implementare le feature A/B/C usando le regole BMAD
- Seguire: no controller, no services layer, module providers manifest

## Acceptance Criteria
- [ ] APCA contrast ≥75 body, ≥45 large-bold

### `lang-link-collegamento-alle-traduzioni-modulo.md` — Collegamento alle Traduzioni del Modulo Media

# Collegamento alle Traduzioni del Modulo Media

Questo modulo utilizza le traduzioni centralizzate nella cartella [Lang](../../Lang/docs/).

Consulta la documentazione delle traduzioni:
- [Introduzione alle Traduzioni](../../Lang/docs/introduction.md)
- [Struttura delle Traduzioni](../../Lang/docs/structure.md)
- [Gestione dei File di Lingua](../../lang/docs/module_lang.md)

## Collegamento Bidirezionale

Per ogni risorsa o campo localizzato, vedi anche il file corrispondente in questo modulo e la relativa sezione in [Lang](../../Lang/docs/).

> Aggiorna entrambi i riferimenti se aggiungi nuove chiavi di traduzione o modifichi la struttura.

## Collegamenti tra versioni di lang-link.md
* [lang-link.md](../../../chart/docs/lang-link.md)
* [lang-link.md](../../../reporting/docs/lang-link.md

### `lang-link.md` — Collegamento alle Traduzioni del Modulo Media

# Collegamento alle Traduzioni del Modulo Media

Questo modulo utilizza le traduzioni centralizzate nella cartella [Lang](../../Lang/docs/).

Consulta la documentazione delle traduzioni:
- [Introduzione alle Traduzioni](../../Lang/docs/introduction.md)
- [Struttura delle Traduzioni](../../Lang/docs/structure.md)
- [Gestione dei File di Lingua](../../Lang/docs/module_lang.md)

## Collegamento Bidirezionale

Per ogni risorsa o campo localizzato, vedi anche il file corrispondente in questo modulo e la relativa sezione in [Lang](../../Lang/docs/).

> Aggiorna entrambi i riferimenti se aggiungi nuove chiavi di traduzione o modifichi la struttura.

## Collegamenti tra versioni di lang-link.md
* [lang-link.md](../../../Chart/docs/lang-link.md)
* [lang-link.md](../../../Reporting/docs/lang-link.md

### `laravel-13-upgrade.md` — Upgrade Laravel 13 - Media 🐄✨

# Upgrade Laravel 13 - Media 🐄✨

## 🎯 Visione Architetturale
L'upgrade a Laravel 13 per il modulo **Media** non è un mero aggiornamento tecnico, ma un atto di purificazione zen. Seguendo i dettami della **Super Mucca**, ogni riga di codice è stata meditata per raggiungere la massima indipendenza.

## 🧘 Principi Applicati
1.  **Isolamento (SOLID)**: Il modulo dichiara ora esplicitamente le proprie dipendenze, riducendo l'accoppiamento con il core.
2.  **Semplicità (KISS)**: Rimossi i wrapper obsoleti e le dipendenze ridondanti.
3.  **Memoria (Documentation)**: Questo documento funge da memoria persistente dell'evoluzione del modulo.

## 🛠️ Modifiche Eseguite
- [x] **PHP ^8.4**: Allineamento ai requisiti di Laravel 13.
- [x] **composer.json**: Aggiornato con `laravel/framework: ^13.0` e `nwi

### `laravel-ffmpeg-api-reference.md` — Laravel-FFMpeg – API Reference Completa

# Laravel-FFMpeg – API Reference Completa

> Package: `protonemedia/laravel-ffmpeg` v8+
> Namespace root: `ProtoneMedia\LaravelFFMpeg`
> Dipendenza sottostante: `php-ffmpeg/php-ffmpeg`

---

## Installazione e Configurazione

```bash
composer require pbmedia/laravel-ffmpeg
php artisan vendor:publish --provider="ProtoneMedia\LaravelFFMpeg\Support\ServiceProvider"
```

### Variabili `.env`

```dotenv
FFMPEG_BINARIES=/usr/bin/ffmpeg
FFPROBE_BINARIES=/usr/bin/ffprobe

### `laravel-ffmpeg-patterns-laraxot.md` — Laravel-FFMpeg – Pattern Laraxot nel Modulo Media

# Laravel-FFMpeg – Pattern Laraxot nel Modulo Media

Questa guida descrive come usare `protonemedia/laravel-ffmpeg` seguendo i pattern architetturali
del progetto (XotBase, QueueableAction, Spatie Data, PHPStan level 10).

---

## Pattern 1 – Action di Conversione Video

```php
<?php

declare(strict_types=1);

namespace Modules\Media\app\Actions\Video;

use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Log;
use ProtoneMedia\LaravelFFMpeg\Exporters\EncodingException;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

### `manuale-uso-attori.md` — Modulo Media


# Modulo Media

## Scopo

Media gestisce upload, allegati, storage, conversioni di immagini e video,
metadati e distribuzione tramite storage/CDN. È un modulo infrastrutturale:
le applicazioni ospitanti lo usano attraverso Actions, modelli e componenti
Filament.

## Matrice attori

| Attore | Accesso o responsabilità verificata |
|---|---|
| Ospite | N/A per la gestione del modulo. Lo streaming richiede controllo di autenticazione quando il media è noto. |
| Utente autenticato | Può operare sui media solo tramite le abilità/permessi assegnati (`media.*`, `media_convert.*`, `temporary_upload.*`) e i form del modulo ospitante. |
| Gruppo/ruolo | `media::admin` supera le policy del modulo; gli altri accessi passano dalle abilità specifiche. |
| Admin | N/A come ruolo generico separato: il co

### `manuals/manuale-utente.md` — Modulo Media


> Screenshot reale del front office FixCity, verificato il 23 novembre 2026. Per questo modulo è una superficie condivisa: il manuale non attribuisce al modulo una UI propria se non documentata dalle fonti.

![Screenshot reale del front office](assets/front-office-home.png)

# Modulo Media

## Scopo

Media gestisce upload, allegati, storage, conversioni di immagini e video,
metadati e distribuzione tramite storage/CDN. È un modulo infrastrutturale:
le applicazioni ospitanti lo usano attraverso Actions, modelli e componenti
Filament.

## Matrice attori

| Attore | Accesso o responsabilità verificata |
|---|---|
| Ospite | N/A per la gestione del modulo. Lo streaming richiede controllo di autenticazione quando il media è noto. |
| Utente autenticato | Può operare sui media solo tramite le a

### `manuals/user-manual.md` — Manuale utente Media


# Manuale utente Media

Integra il [manuale actor-oriented](../manuale-uso-attori.md). Media gestisce upload, conversioni e allegati collegati a un record owner.

## Attori e uso

| Attore | Uso verificato |
|---|---|
| Utente normale/gruppo | Carica o consulta allegati solo nel contesto autorizzato. |
| Operatore/admin | Gestisce media e storage secondo policy. |
| Super-admin | Governa impostazioni e accessi globali. |

Verificare sempre ownership, MIME, dimensione e visibilità.

## Evidenza visuale reale

![Schermata reale documentata del modulo Media](../../screenshots/event-detail-page.png)

Screenshot reale presente nella documentazione del modulo.

### `mcp-configuration.md` — MCP Server Configuration - Media Module

# MCP Server Configuration - Media Module


**Status**: ✅ Configured
**MCP Servers**: Asana, ClickUp, Filesystem, Database, Redmine (Planned)

---

## 📋 Overview

The Media module's MCP configuration enables AI assistants to interact with:
- **Asana Work Graph** - Task and project management
- **ClickUp Workspace** - Advanced task workflows and time tracking
- **Redmine** - Project management (planned, requires self-hosted instance)
- **Filesystem** - Direct file access
- **Database** - SQLite queries for data inspection

---

## 🔧 Configuration

### `mcp-server-consigliati.md` — Server MCP consigliati per il modulo Media

# Server MCP consigliati per il modulo Media

## Scopo del modulo
Gestione, manipolazione e automazione di file e media.

## Server MCP consigliati
- **filesystem**: Per leggere/scrivere file, gestire asset e media.
- **fetch**: Per recuperare dati o file da fonti esterne.
- **memory**: Per mantenere stato tra operazioni di manipolazione file/media.
- **everything**: Per avere tutte le funzionalità MCP disponibili.

## Esempio di configurazione MCP
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "fetch": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-fetch"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] },
    "everything": { "command": "npx", "a

### `mcp-server-recommended.md` — MCP Server Consigliati per il Modulo Media

# MCP Server Consigliati per il Modulo Media

## Scopo del Modulo
Gestione media, upload, conversioni e streaming.

## Server MCP Consigliati
- `filesystem`: Per gestione file media, upload e conversioni.
- `fetch`: Per recupero o invio media a servizi esterni.
- `memory`: Per caching temporaneo durante le operazioni di conversione.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "fetch": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-fetch"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] }
  }
}
```

### `merge-conflict-files-list.md` — Merge Conflict Files List

# Merge Conflict Files List

This file contains a comprehensive list of files with merge conflict markers (`<<<< HEAD` or `<<<< .merge_file`) that need to be resolved.

## Total Files Found: 96

## Files by Module/Theme:

### Core Modules (16 files)
- ./.planning/debug/knowledge-base.md
- ./.planning/debug/resolved/sqlite-model-contract-fix.md
- ./_bmad/bmm/4-implementation/bmad-create-story/stories/1-1-segnalazione-ui-ux-improvement.md
- ./bashscripts/ai/.agents/projects/-var-www--bases-base-ptvx-fila4-mono/77bfad8e-8a4c-4b6d-a3f8-f82002ebfe74/session-memory/summary.md
- ./bashscripts/ai/.agents/projects/-var-www--bases-base-fila4-mono/9882f009-bf64-44ad-992e-e6c36de2142c/session-memory/summary.md
- ./bashscripts/ai/.agents/projects/-var-www--bases-base-fila4-mono/b370da1e-b6d8-4a5a-a4bf-

### `merge-conflict-task-list.md` — Documentation Merge Conflict Task List

# Documentation Merge Conflict Task List

## INCOMPLETE (3 DOCS)
- [ ] Document: `Modules/Media/docs/svg-asset-location.md` - Missing FALSE_FRIENDS section
- [ ] Document: `Modules/Geo/docs/map-picker-runtime-asset-governance.md` - Missing SVG validation checklist
- [ ] Document: `Modules/Cms/docs/header-external-components.md` - Missing linting error examples

## SCHEDULED (1 DISPUTE)
- [ ] Conflict: `Modules/Blog/docs/README.md` vs `Modules/Rating/docs/README.md` style conventions - Resolve by 2026-05-15

## COMPLETE (12 DOCS)
- [x] `Modules/Sixteen/docs/html-parity-body-policy.md` - Added lint rule
- [x] `Modules/Notify/Modules/Xot/docs/index.md` - Added missing index references
- [x] `Modules/LegacyDomain/docs/docs/index.md` - Added DRY/KISS requirements

## BOUNDARY CASES (0)
---
- [ 

### `merge-conflicts-list.md` — Merge conflict markers — file list

# Merge conflict markers — file list

Elenco dei file trovati contenenti marker di merge (<<<<<<<, >>>>>>>, .merge_file). Seguire la lista per assegnare task agli agenti.

## Lista (auto-generata)

- memory/MEMORY.md
- _bmad/bmm/4-implementation/bmad-create-story/stories/1-1-segnalazione-ui-ux-improvement.md
- laravel/Themes/Sixteen/public/manifest.json
- bashscripts/ai/wiki/concepts/modules-structure-rules.md#no-docs-archive-rule
- docs/wiki/index.md
- docs/wiki/log.md
- laravel/Themes/Sixteen/docs/wiki/index.md
- laravel/Themes/Sixteen/docs/wiki/log.md
- laravel/Modules/Lang/docs/module-analysis.md
- laravel/Modules/Lang/docs/translatable/json-content-translation.md
- laravel/Modules/Lang/docs/module.md
- laravel/Modules/Notify/docs/wiki/index.md
- laravel/Modules/Geo/resources/js/compon

### `metodi-duplicati-analisi.md` — 🐄⚡ ANALISI METODI DUPLICATI - SUPER MUCCA EDITION

# 🐄⚡ ANALISI METODI DUPLICATI - SUPER MUCCA EDITION

# Metodi Duplicati — Analisi Media

Elenco dei metodi duplicati (cross-file e cross-modulo) che coinvolgono il modulo **Media**, estratti dal report globale generato da `/tmp/metodi_duplicati_domain_report.md`.

## Metodo: `getFormActions` (14 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Media, Pdnd, Ptv, Sigma, User, Xot

**File in Media:**

- `./laravel/Modules/Media/app/Filament/Clusters/Test/Pages/S3Test.php`

[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]

---

## Metodo: `before` (14 occorrenze)


### `migration-filament.md` — migration-filament

---
---

### `migration-patterns.md` — Migration Patterns - Media Module

# Migration Patterns - Media Module

## Conformità XotBaseMigration

Tutte le migrazioni del modulo Media DEVONO seguire i pattern Laraxot standard.

### ✅ Pattern Corretto

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    public function up(): void
    {

### `migrations.md` — Media Module Migrations


# Media Module Migrations

## Overview

The Media module manages file storage, conversion, and temporary uploads. All migrations follow the `XotBaseMigration` pattern with explicit model-to-migration parity.

## Models and Migrations Parity

| Model | Migration File | Status | Purpose |
|-------|----------------|--------|---------|
| `Media` | `2022_01_01_000011_create_medias_table.php` | ✅ Active | Media file metadata and Spatie integration |
| `MediaConvert` | `2022_01_01_000000_create_media_converts_table.php` | ✅ Active | Conversion jobs and optimization metadata |
| `TemporaryUpload` | `2023_01_01_000000_create_temporary_uploads_table.php` | ✅ Active | Session-based temporary file uploads |

**Parity**: 3 models, 3 migrations (100% coverage).

## Migration Pattern: XotBaseMigration



### `migrazione-filament.md` — migrazione-filament

---
---

### `model-factory-seeder-audit.md` — Model/Factory/Seeder Audit

# Model/Factory/Seeder Audit

Generated: [DATE] 16:29

## Coverage
| Model | Factory | Seeded |
|---|---|---|
| Media | yes | no |
| MediaConvert | yes | no |
| TemporaryUpload | yes | no |

Seeder: `database/seeders/MediaDatabaseSeeder.php`

## Missing / Actions
- Add exemplar seeding for Media, TemporaryUpload (small count) in `MediaDatabaseSeeder` or dedicated seeders.

## Likely non-business-critical
- None; all three are concrete but can be optionally seeded for demos/tests.

### `modelli-factory-seeder-analisi.md` — Analisi Modelli, Factory e Seeder - Modulo Media



# Analisi Modelli, Factory e Seeder - Modulo Media

## Panoramica
Questo documento analizza tutti i modelli del modulo Media verificando la presenza di factory e seeder corrispondenti, identificando modelli non utilizzati nella business logic principale.

## Modelli Attivi e Business Logic

### Modelli Core Media (Utilizzati)
| Modello | Factory | Seeder | Utilizzo Business Logic |
|---------|---------|---------|------------------------|
| **Media** | ✅ MediaFactory | ✅ MediaDatabaseSeeder | Core - Gestione file multimediali |
| **MediaConvert** | ✅ MediaConvertFactory | ❌ | Core - Conversioni formato media |
| **TemporaryUpload** | ✅ TemporaryUploadFactory | ❌ | Core - Upload temporanei |

### Modelli Base (Utilizzati)
| Modello | Factory | Seeder | Utilizzo Business Logic |
|---------|

### `models-factory-seeder-analysis.md` — Analisi Modelli, Factory e Seeder - Modulo Media

# Analisi Modelli, Factory e Seeder - Modulo Media

## Riepilogo Modelli

### Modelli Presenti
1. **Media** - Gestione media files
2. **MediaConvert** - Conversione media
3. **TemporaryUpload** - Upload temporanei

### Factory Presenti
- ✅ **MediaFactory** - Presente
- ✅ **MediaConvertFactory** - Presente
- ✅ **TemporaryUploadFactory** - Presente

### Seeder Presenti
- ✅ **MediaDatabaseSeeder** - Seeder principale del modulo

## Stato di Completezza

| Modello | Factory | Utilizzo Business Logic |

### `module-analysis.md` — Media Module - Comprehensive Analysis

# Media Module - Comprehensive Analysis

## Module Overview
**Module Name**: Media  
**Type**: Media Management Module  
**Status**: ✅ Active  
**Framework**: Laravel 12.x + Filament 4.x  
**Library Integration**: Spatie Media Library  
**Language**: Multi-language (IT/EN/DE)  

## Purpose
The Media module provides comprehensive media file management:

- File upload and storage management
- Image processing and optimization
- Media library with organization features
- File type validation and security
- Responsive image generation
- Media integration with other modules
- Media asset optimization

### `module-media.md` — Modulo Media

# Modulo Media

> **Collegamento globale:** Per le strategie generali e le best practices sulla risoluzione dei conflitti git, vedi [docs/git_conflict_resolution.md](../../../../../docs/git_conflict_resolution.md).

## Informazioni Generali
- **Nome**: `laraxot/module_media_fila5`
- **Descrizione**: Modulo dedicato alla gestione di immagini e video
- **Namespace**: `Modules\Media`
- **Repository**: https://github.com/laraxot/module_media_fila5.git

## Service Providers
1. `Modules\Media\Providers\MediaServiceProvider`
2. `Modules\Media\Providers\Filament\AdminPanelProvider`

## Struttura
```
app/
├── Filament/       # Componenti Filament
├── Http/           # Controllers e Middleware
├── Models/         # Modelli del dominio

### `module-overview.md` — Media module overview

# Media module overview

## Scopo ("perché esiste")

Il modulo `Media` fornisce la gestione centralizzata dei contenuti multimediali (file, metadati, conversioni) per l’applicazione.

Nel codebase corrente il “cuore” non è un’implementazione custom, ma un’integrazione orchestrata di:

- `spatie/laravel-medialibrary` (modello `Modules\Media\Models\Media` estende `Spatie\MediaLibrary\MediaCollections\Models\Media`)
- storage Laravel (disk e path)
- pipeline di conversione video (FFmpeg / `pbmedia/laravel-ffmpeg`)
- backoffice Filament (Resources/RelationManagers per ispezione e gestione record)

## Entry points (boot e integrazione framework)

- **Nwidart module registration**: `module.json`
  - Provider: `Modules\Media\Providers\MediaServiceProvider`
  - Provider Filament panel: `Modules\Me

### `module.md` — Modulo Media - Gestione File Multimediali

# Modulo Media - Gestione File Multimediali

## Scopo Principale

Il modulo **Media** fornisce un sistema completo di **gestione file multimediali e documenti** per il monolite Laraxot, supportando upload, storage, manipulation e delivery di immagini, video, documenti e altri media.

## Funzionalità Implementate

### ✅ Core Media Management
1. **File Upload System**
   - Multi-file upload with drag & drop
   - Progress tracking e chunk upload
   - File validation e sanitization
   - Multi-format support (immagini, video, documenti)

2. **Storage Management**
   - Local storage con organizzazione strutturata
   - Cloud storage integration ready
   - Automatic file organization
   - Duplicate detection e handling

### `multi-org-sync-laraxot-provtv.md` — Sincronizzazione multi-organizzazione (laraxot + provtv)


# Sincronizzazione multi-organizzazione (laraxot + provtv)

## Cosa è stato fatto

Questo repository è tracciato da due remote GitHub (`laraxot` = org upstream canonica,
`provtv` = org operativa del progetto ptvx). Il 2026-07-21 è stata eseguita una
sincronizzazione completa seguendo `bashscripts/tools/prompts/02-gitmodules-sync.md`:
fetch di tutti i remote, quality gates (PHPStan L10, PHPMD), risincronizzazione dopo ogni modifica.

## Problemi riscontrati e risolti

- **Clone shallow**: il repo era stato clonato con storia troncata, causando push
  respinti (`did not receive expected object`). Fix: `git fetch --unshallow` su tutti i remote.
- **Storie scollegate ("unrelated histories")**: alcuni repo avevano un branch `dev`
  remoto rigenerato senza antenato comune con la storia locale. 

### `nested-resources.md` — Media Module - Nested Resource Implementation Guide

# Media Module - Nested Resource Implementation Guide

## Overview

The Media module provides comprehensive media file management with support for various file types, transformations, and relationships with other models. Nested resources in this module focus on organizing media assets in a hierarchical structure that reflects relationships between media collections, folders, and related content.

## Current Relationship Structure

### Media Model Relationships
- `Media` belongsTo `User` (author/owner)
- `Media` morphTo `Model` (can belong to any model that implements HasMedia trait)
- `Media` belongsTo `MediaFolder` (for organizational structure)
- `Media` hasMany `MediaConversion` (for file transformations)

### MediaFolder Model Relationships
- `MediaFolder` hasMany `Media` (files in fol

### `nestedset-migration-best-practices.md` — NestedSet Migration Best Practices - Media Module

# NestedSet Migration Best Practices - Media Module

## Overview

Questo documento descrive le best practices per implementare migrazioni con strutture ad albero (nested sets) nel modulo Media utilizzando il pacchetto `kalnoy/laravel-nestedset`.

## Pattern per Categorie Media

```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = \Modules\Media\Models\MediaCategory::class;

    public function up(): void

### `no-ai-tool-scaffold-dirs.md` — Perché queste cartelle non devono esistere qui


# Perché queste cartelle non devono esistere qui

Regola canonica: [module-theme-root-cleanup.md — Rule 5](../../../../docs/wiki/rules/module-theme-root-cleanup.md).

Rimosse in questo modulo: `_docs/`, `scripts/`, `bashscripts/`, `docs/archive|archived|legacy|workbench/`, `.circleci/`, `.claude-audit/`, `tests/.claude-audit/`, `_bmad-output/`, `test-results/`, `.devcontainer/`, `.kilocode/`, `.kiro/`, `.ralph/` (dove presenti) e aggiunte al `.gitignore` di questo modulo.

**Perché**: questo modulo vive anche come repo Git indipendente (multi-repo); ogni agente/tool AI o pipeline CI che gira in quella root scrive lì la propria cache/scaffold locale (skill `.kiro/`, output `_bmad-output/`, stato `.ralph/`, audit `.claude-audit/`, log `test-results/`), ignorando che quella root è in realtà 

### `no-git-lfs.md` — Git LFS non si usa in questo progetto


# Git LFS non si usa in questo progetto

Vale per il repo root, per `bashscripts/` e per ogni modulo e tema. Questo modulo non fa
eccezione.

## La regola

I binari — immagini, font, PDF, archivi — si versionano come **blob git normali**.

Vietato:

- aggiungere `filter=lfs diff=lfs merge=lfs` in un qualunque `.gitattributes`;
- eseguire `git lfs install` o `git lfs track` dentro questo repo;
- committare come contenuto di un file il testo `version https://git-lfs.github.com/spec/v1`.

## Perche'

Non e' una preferenza di stile, e' il risultato di incidenti ripetuti.


### `on-demand-pattern.md` — On-Demand Pattern — Module **Media**


# On-Demand Pattern — Module **Media**

**Fonte canonica**: [../../docs/wiki/rules/on-demand-pattern.md](../../docs/wiki/rules/on-demand-pattern.md)

## Principio

Questo module segue il **pattern on-demand** per rules, skills, commands e memories:

- ✅ **Vivono solo nel wiki** — ../../docs/wiki/
- ✅ **Caricati on-demand** — via trigger map o `qmd search`
- ❌ **NON pre-caricati** — mai embeddare nei bootstrap files
- ❌ **Nessuna duplicazione** — wiki = sorgente di verità unica

## Perché On-Demand?

1. **Contesto minimo** — Carico solo le regole pertinenti al task corrente
2. **Token efficient** — Nessun carico inutile all'avvio (~50K → ~2K token)
3. **Scalabile** — Aggiungere nuove rules non richiede modifiche ai bootstrap
4. **Manutenibile** — Una sola fonte di verità (wiki)

### `optimization-analysis.md` — Analisi di Ottimizzazione - Modulo Media

# Analisi di Ottimizzazione - Modulo Media

## 🎯 Principi Applicati: DRY + KISS + SOLID + ROBUST + Laraxot

### 📊 Stato Attuale
- **File Management** con Spatie Media Library
- **Image Processing** per ottimizzazione
- **Storage** multi-disk support
- **Security** per upload e download

## 🚨 Problemi Identificati

### 1. **Security Issues**
- **File validation** insufficiente
- **Virus scanning** non implementato
- **Access control** non granulare

### 2. **Performance**
- **Image optimization** non automatica
- **CDN integration** mancante

### `ottimizzazioni-correzioni.md` — ottimizzazioni-correzioni

---
---

### `packages.md` — Pacchetti del Modulo Media

# Pacchetti del Modulo Media

## Pacchetti Utilizzati

### Core
- [laraxot/module_xot_fila5](../xot/docs/packages.md) - Modulo base per funzionalità comuni
- [laraxot/module_ui](../ui/docs/packages.md) - Componenti UI e temi
- [laraxot/module_tenant_fila5](../tenant/docs/packages.md) - Gestione multi-tenant

### Media
- [spatie/laravel-medialibrary](https://github.com/spatie/laravel-medialibrary)
  - Gestione file e media
  - Conversioni immagini
  - Responsive images

- [spatie/image-optimizer](https://github.com/spatie/image-optimizer)
  - Ottimizzazione immagini
  - Compressione
  - Formati moderni


### `patterns.md` — Architectural Patterns — Media Module


# Architectural Patterns — Media Module

**Last updated:** 2026-07-28

This document describes common architectural patterns in the Media module and anti-patterns to avoid.

---

## 1. Media Processing Pipeline Pattern

**Purpose:** Decouple upload, validation, and processing into discrete, testable steps.

**Core Idea:**
```
Input → Validation → Temporary Storage → Processing Queue → Final Storage → Attach to Model
```

**Implementation:**


### `performance/media-optimizations.md` — Ottimizzazioni Performance Modulo Media

# Ottimizzazioni Performance Modulo Media

## 1. Ottimizzazione Conversione Video
**File**: `laravel/Modules/Media/app/Actions/Video/ConvertVideoByMediaConvertAction.php`
**Linee**: 1-100

**Problema**: 
- Nessun caching dei parametri di conversione
- Notifiche inviate ad ogni progresso
- Aggiornamenti DB frequenti durante la conversione
- Preset hardcoded

**Soluzione**:
```php
declare(strict_types=1);

namespace Modules\Media\Actions\Video;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Cache;

### `performance-optimization.md` — Performance Optimization — Module **Media**


# Performance Optimization — Module **Media**

## Ottimizzazioni Applicate

### 1. On-Demand Loading (principale)

**Prima**: Bootstrap caricava tutte le rules (50K+ token)
**Dopo**: Carico solo what's needed (~2K startup)

\`\`\`diff
- 150+ rules embeddate in AGENTS.md
+ 0 rules embeddate — tutte on-demand
\`\`\`

### 2. Cache Esterna al Repo

\`\`\`diff
- .cache/ (8KB nel repo)
+ ~/.cache/qmd-cache/ (fuori da git)

### `philosophy-complete.md` — Media - Filosofia Completa: Logica, Religione, Politica, Zen

# Media - Filosofia Completa: Logica, Religione, Politica, Zen

**Data Creazione**: [DATE]
**Status**: Documentazione Filosofica Completa
**Versione**: 1.0.0

## 📋 Indice Filosofico

1. [Logica (Logic)](#logica-logic)
2. [Religione (Religion)](#religione-religion)
3. [Politica (Politics)](#politica-politics)
4. [Zen (Zen)](#zen-zen)
5. [Manifestazioni Pratiche](#manifestazioni-pratiche)

---

## 🧠 Logica (Logic)

### Principio Fondamentale


### `philosophy.md` — Media Module — Complete Philosophy


# Media Module — Complete Philosophy

## Preliminaries

This module contains 49 actions across 124 PHP files. That density — one action per 2.5 files — is intentional. File handling is inherently fragmented: upload-to-storage, then storage-to-format, then format-to-bytes. No monolithic God-action will emerge. Spatie Media Library forms the substrate; FFmpeg and Intervention Image are the verbs.

---

## I. RELIGIONE — The Dogmas

### Core Tenets

The Media module is built on immovable truths about file systems and the physical world:

#### 1. **Files Are State**
- A file on disk is *evidence*. It exists independently of your database row.
- The row is a *reference*. When you delete the row, the file remains (silent failure).
- When you delete the file and not the row, you get a 404 and bl

### `player.md` — player

https://github.com/spatie/laravel-sitemap/blob/main/resources/views/video.blade.php

https://github.com/anggadarkprince/beats-laravel-web/blob/master/resources/views/pages/video.blade.php


per fare blocco YOUTUBE e blocco VIMEO
https://github.com/nWidart/laravel-videoable/blob/master/resources/views/sources/vimeo.blade.php

### `prd.md` — Product Requirements Document (PRD) - Media Module

# Product Requirements Document (PRD) - Media Module

**Module**: Media
**Version**: 1.0
**Status**: Draft
**Author**: Product Team

## Executive Summary
Media module for Laraxot platform providing core functionality.

## Functional Requirements
- Core Media features
- Integration with Laraxot ecosystem
- Standard CRUD operations

## Technical Specifications
- PHPStan Level 10 compliance
- Pest test coverage >90%
- Integration testing
# PRD: Media Module

### `prevention-guidelines.md` — Linee Guida Prevenzione Problemi - Modulo Media

# Linee Guida Prevenzione Problemi - Modulo Media

## 🚨 Problemi Critici Risolti in S3Test.php

### 1. **Violazioni Architetturali - MAI PIÙ**

#### ❌ **Problema Risolto**
```php
// VIETATO - Import diretti tra moduli
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Emails\EmailDataEmail;

// VIETATO - Accoppiamento stretto
$emailData = new EmailData($data);
$email = new EmailDataEmail($emailData);
```

#### ✅ **Soluzione Implementata**
```php
// CORRETTO - Logging semplice per test

### `preventionlines.md` — Linee Guida Prevenzione Problemi - Modulo Media

# Linee Guida Prevenzione Problemi - Modulo Media

## 🚨 Problemi Critici Risolti in S3Test.php

### 1. **Violazioni Architetturali - MAI PIÙ**

#### ❌ **Problema Risolto**
```php
// VIETATO - Import diretti tra moduli
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Emails\EmailDataEmail;

// VIETATO - Accoppiamento stretto
$emailData = new EmailData($data);
$email = new EmailDataEmail($emailData);
```

#### ✅ **Soluzione Implementata**
```php
// CORRETTO - Logging semplice per test

### `product-requirements.md` — Product Requirements Document (PRD)

# Product Requirements Document (PRD)

## Metadata

| Campo | Valore |
|-------|--------|
| **Version** | 1.0.0 |
| **Status** | Approved |
| **
| **Owner** | Core Team |
| **Module** | Media |
| **Repository** | laraxot/module_media_fila5 |

---

## 1. Panoramica del Prodotto

### Descrizione Breve
Il modulo Media gestisce **asset multimediali** per l'ecosistema Laraxot: immagini, video, documenti con elaborazione avanzata e storage centralizzato.


### `project-structure.md` — Project Structure — Module **Media**


# Project Structure — Module **Media**

## Directory Structure

\`\`\`
./laravel/Modules/Media/docs/
├── wiki/                          # Knowledge base locale (LLM Wiki)
│   ├── index.md                  # Master catalog
│   ├── log.md                    # Activity log
│   ├── concepts/                 # Topic/theme pages
│   ├── entities/                 # Organization/person pages
│   ├── rules/                    # ⚠️ 151+ regole progettuali
│   │   ├── 00-index.md          # Indice regole
│   │   ├── 00-TRIGGER_MAP.md    # Trigger map (link a globale)
│   │   └── *.md                 # Regole specifiche modulo
│   ├── skills/                   # Skill progettuali
│   │   ├── index.md
│   │   └── *.md
│   ├── commands/                 # Comandi progettuali

### `prompts/study.md` — study


studia molto a fondo https://github.com/protonemedia/laravel-ffmpeg  e aggiorna le tue cartelle docs, le tue rules, le tue memories e le tue skills

→ studio consolidato in:
- `ffmpeg-integration.md` (overview integrazione)
- `ffmpeg-usage.md` (pattern canonici di utilizzo)

### `qmd-setup.md` — QMD Setup per Module **Media**


# QMD Setup per Module **Media**

## Configurazione QMD per Questo Module

### Collection Configuration

Il progetto usa una collection QMD centralizzata in `.qmd/index.yml` che include tutti i moduli.

### Ricerca Locale vs Globale

**Ricerca locale** (solo questo modulo):
\`\`\`bash
qmd search "<topic>" -c media
# Cerca solo in ./laravel/Modules/Media/docs/wiki/
\`\`\`

**Ricerca globale** (tutto il progetto):
\`\`\`bash
qmd search "<topic>"

### `quality-analysis.md` — Quality Analysis Report - Media Module


# Quality Analysis Report - Media Module
**Date**: [DATE]
**Status**: ✅ **ILLUMINATED** - PHPStan Level 10 PASS

---

## Aggiornamento verifica 2026-07-01

- **PHPStan** (`level: max`): **0 errori** confermati, incluso `Http/Requests/CreateTemporaryUploadFromDirectS3UploadRequest.php:60` (il presunto errore "Cannot instantiate class using mixed" di un run precedente era un falso positivo da OOM parziale; il codice usa già `class-string<Media>` + `@var Media $mediaModel`).
- **PHPMD**: rimossa dead code (variabili/proprietà mai lette): `Actions/SaveAttachmentsAction.php::executeOLD()` (metodo legacy non referenziato con `dddx()` di debug, rimosso), `Actions/S3/UploadFileAction.php` (`$acl` ora riusato), `Actions/Video/ConvertVideoByConvertDataAction.php` (`$msg` ora loggato), `Filament/Clu

### `quality-audit.md` — Audit di qualita — modulo Media


# Audit di qualita — modulo Media

Misurato il 1 settembre 2026 a tree fermo. Ogni numero viene da un comando
eseguito, non da una stima; i comandi sono in fondo, cosi la misura si puo
rifare e contestare.

## Stato misurato

| Metrica | Valore |
|---|---:|
| File PHP | 247 |
| Righe di codice | 17693 |
| File di test `*Test.php` | 41 |
| Casi di test | 314 |
| Casi di test per file PHP | 1.27 |
| `@phpstan-ignore` nel codice | 0 |
| Rilievi PHPMD su `app/` | 171 |
| PHPInsights — Code | 91.8 % |
| PHPInsights — Complexity | 100.0 % |

### `quality-report.md` — Quality Report — Media


# Quality Report — Media

Aggiornato: 2026-08-24. Rigenera con: `bashscripts/tools/quality-report.sh Media`

| Metrica | Valore |
|---|---|
| File PHP (app/) | 126 |
| LOC app/ | 8946 |
| File test | 41 |
| LOC test | 5445 |
| Test/App LOC ratio | 60.9% |
| PHPStan (level max) |  |

## Come misurare la coverage Pest

```bash
cd laravel
XDEBUG_MODE=coverage php -d memory_limit=2G ./vendor/bin/pest Modules/Media/tests \
  --coverage-text --colors=never

### `quality.md` — Quality Analysis Report - Media Module

# Quality Analysis Report - Media Module
**Date**: [DATE]
**Status**: ✅ **ILLUMINATED** - PHPStan Level 10 PASS

---

## Executive Summary

The Media module successfully passes **PHPStan Level 10** with **0 errors** out of the box, demonstrating excellent type safety and code quality.

**Overall Scores**:
- PHPStan Level 10: ✅ **PASS (0 errors)**
- PHPInsights Code: 77/100 🟡
- PHPInsights Complexity: 88.7/100 🟢
- PHPInsights Architecture: 88.2/100 🟢
- PHPInsights Style: 83.1/100 🟢
- Security Issues: 0 ✅

---


### `queueable-actions.md` — Queueable Actions — Media Module Doctrine


# Queueable Actions — Media Module Doctrine

> The full doctrine lives in `Modules/Xot/docs/queueable-actions.md`.
> This module follows the same rules.

## Rules

1. Every class under `app/Actions/` is a [Spatie Laravel Queueable Action](https://github.com/spatie/laravel-queueable-action).
2. The only public entry point is `execute()`.
3. No repository pattern — no `*Repository` classes, no repository injection.
4. No inline `new ...Action` or `new ...Repository` in constructor default parameters.
5. Retire files by renaming with `.old` suffix; do not `rm` and do not create `archive/` directories.
6. YAGNI: reuse existing code, prefer stdlib/native Laravel, keep it minimal.

## Example

```php
<?php


### `readme-en.md` — 🖼️ Media — English presentation

# 🖼️ Media — English presentation

[![Domain-Media](https://img.shields.io/badge/Domain-Media%20Library-AD1457.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![Media Module](https://img.shi

### `redundancy-analysis.md` — Contenuto fuso da `redundancy-analysis.md`

Redundancy analysis available: docs/analysis/redundancies/summary.md

## Contenuto fuso da `redundancy-analysis.md`

Redundancy analysis available: ../../Notify/docs/bugs/summary-2.md

### `redundancy-audit.md` — Media redundancy audit 2026-05-21


# Media redundancy audit 2026-05-21

Scope: static audit from repo root over module PHP, Blade, and docs.

High-risk findings:
- Runtime file `app/Filament/Resources/HasMediaResource/Schemas/HasMediaForm.php` has canonical namespace `Modules\Media\Filament\...`, but the recent fatal reported `Modules\Media\app\Filament\...`; keep investigating stale autoload/opcache or a second checkout in the same PHP process.
- Docs still contain wrong example namespaces with `Modules\Media\app\...` in `laravel-ffmpeg-patterns-laraxot.md`.
- Duplicate documentation variants exist: `performance/media-optimizations.md`, `performance/media-optimizations.md`, and `performance/media-optimizations.md`.
- Historical config copies exist in multiple old/superseded locations, including `docs/archived`, `docs/supe

### `release-marketing-standard.md` — Release e README marketing — Media


# Release e README marketing — Media

## Scopo

Ogni modulo/tema deve essere pubblicabile, comprensibile e desiderabile: workflow release, changelog automatico e README vetrina.

## File canonici locali

- `../README.md`
- `../.github/workflows/semantic-release.yml`
- `../.releaserc.json`
- `../CHANGELOG.md`

## Confidenza

La configurazione usa semantic-release con Conventional Commits, changelog, GitHub release e commit automatico del changelog.

### `roadmap/00-overview.md` — Roadmap overview (Module Media)

# Roadmap overview (Module Media)

## Scope

## Goals

## Non-goals

### `roadmap/01-now.md` — Now (Module Media)

# Now (Module Media)

## Stabilization

## Bugfixes

## Quality gates

### `roadmap/02-next.md` — Next (Module Media)

# Next (Module Media)

## Features

## Refactors

### `roadmap/03-later.md` — Later (Module Media)

# Later (Module Media)

## Longer-term ideas

### `roadmap/04-risks.md` — Risks and dependencies (Module Media)

# Risks and dependencies (Module Media)

## Risks

## Dependencies

### `roadmap/05-risks.md` — Risks - Media

# Risks - Media

## Top Risks

1. Drift tra documentazione e comportamento runtime.
2. Regressioni introdotte da fix rapidi non verificati.
3. Dipendenze incrociate non documentate.

## Mitigations

1. Aggiornare docs insieme ai fix di codice.
2. Usare checklist pre-merge e post-fix.
3. Mantenere un set di file canonici per diagnosi rapida.

### `roadmap/chaos-readiness.md` — Media Chaos Readiness - 2026-03-02

# Media Chaos Readiness - 2026-03-02

## Scope
- FFMpeg export flow resilience.

## Completed
- Reworked video conversion action to guard exporter API availability.
- Verified `Modules/Media` passes PHPStan.

## Next Chaos Steps
- Simulate unsupported exporter methods and assert controlled exception path.
- Add chaos test for broken media conversion format class.

### `roadmap/current-state.md` — Current State - Media

# Current State - Media

## Baseline

- Stato attuale documentato nei file `docs/` del Modulo.
- Presenza di roadmap strutturata in sotto-file.
- Necessita verifica periodica di coerenza tra codice e documentazione.

## Immediate checks

1. Coerenza tra regole architetturali e implementazione runtime.
2. Coerenza tra naming, namespace e percorsi view/traduzioni.
3. Copertura test minima per i flussi critici.

### `roadmap/goals.md` — Goals - Media

# Goals - Media

## Short Term

1. Allineare documentazione e stato reale del codice.
2. Ridurre i punti di fragilita piu frequenti.
3. Consolidare checklist operative per incident response.

## Medium Term

1. Aumentare test di regressione sui flussi critici.
2. Migliorare osservabilita e diagnosi errori.
3. Ridurre duplicazioni tra documenti e tra componenti.

## Long Term

1. Stabilita sotto fault randomizzati (chaos testing).
2. Manutenibilita alta con onboarding rapido.

### `roadmap/later.md` — Later (Module Media)

# Later (Module Media)

## Longer-term ideas

### `roadmap/legacy-roadmap.md` — Media Module Roadmap

# Media Module Roadmap

Vedi [roadmap/00-index](roadmap/00-index.md).

### `roadmap/milestones.md` — Milestones - Media

# Milestones - Media

## M1 Documentation Baseline

- `roadmap.md` allineato e `docs/roadmap/` completo.
- Link relativi verificati.

## M2 Operational Readiness

- Checklist incident response disponibile.
- Procedure di recovery validate sui casi principali.

## M3 Regression Safety

- Test minimi sui flussi critici in esecuzione regolare.
- Riduzione regressioni ricorrenti.

### `roadmap/next.md` — Next (Module Media)

# Next (Module Media)

## Features

## Refactors

### `roadmap/now.md` — Now (Module Media)

# Now (Module Media)

## Stabilization

## Bugfixes

## Quality gates

### `roadmap/overview.md` — Roadmap overview (Module Media)

# Roadmap overview (Module Media)

## Scope

## Goals

## Non-goals

### `roadmap/phases.md` — Fasi di sviluppo - Media Module

# Fasi di sviluppo - Media Module

## Fase 1: Infrastruttura Core (Completata)

- [x] PHPStan Level 10 Compliance
- [x] Sistema di base per l'upload e la gestione dei file
- [x] Integrazione con lo storage di Laravel

## Fase 2: Media Library e Organizzazione (In Corso)

- [ ] Implementazione della libreria media avanzata in Filament
- [ ] Sistema di tagging e categorizzazione dei file
- [ ] Operazioni massive sui file multimediali (Bulk operations)

## Fase 3: Trasformazione e Ottimizzazione (Pianificato)

- [ ] Sistema di elaborazione immagini (resizing, format conversion, compression)
- [ ] Supporto per elaborazione video di base (thumbnail generation)
- [ ] Integrazione trasparente con CDN


### `roadmap/quality.md` — Checklist qualità - Media Module

# Checklist qualità - Media Module

- [x] PHPStan Level 10
- [ ] Copertura Test (Pest) > 85%
- [ ] Performance di caricamento e trasformazione ottimizzate
- [ ] Traduzioni dei campi media in tutte le lingue supportate

### `roadmap/risks.md` — Risks and dependencies (Module Media)

# Risks and dependencies (Module Media)

## Risks

## Dependencies

### `roadmap/vision.md` — Visione - Media Module

# Visione - Media Module

Fornire un sistema universale e performante per:

- Gestione, trasformazione e ottimizzazione dei file multimediali
- Integrazione con principali provider di storage e CDN
- Elaborazione immagini e video

### `roadmap/workstreams.md` — Workstreams - Media

# Workstreams - Media

## WS1 Architecture

- Verifica confini e responsabilita dei componenti.
- Aggiornamento pattern e guardrail.

## WS2 Reliability

- Hardening dei flussi principali.
- Miglioramento fallback e recovery path.

## WS3 Documentation

- Consolidamento documenti canonici.
- Eliminazione drift documentale.

## WS4 Testing

- Test funzionali mirati sui percorsi ad alto rischio.

### `roadmap-miglioramenti.md` — Roadmap — Media, il modulo con un dump-and-die ancora vivo dentro un generatore video


# Roadmap — Media, il modulo con un dump-and-die ancora vivo dentro un generatore video

> Numeri misurati: [`docs/cosa-migliorare.md`](cosa-migliorare.md) (80,
> 2026-09-01) — PHPStan 0, PHPMD app/ 171, Code 91.8, Arch 100 (massimo dei
> cinque moduli qui analizzati), 314 casi test, coverage non riportata.
> L'Arch a 100 stona con quello che segue: un'architettura "perfetta" per lo
> strumento che la misura convive con un `dddx()` attivo che lo stesso
> strumento non vede, perché non è un problema architetturale — è un
> comportamento a runtime.

Vado dritto al punto più urgente perché è l'unico dei cinque moduli
analizzati oggi con un `dddx()` **non commentato, non rimosso, tuttora
attivo**: `app/Conversions/VideoGenerators/Webm.php:16`. Non è un residuo
storico da archeologia — è codic

### `rules-index.md` — Rules Index

# Rules Index

This module follows the global Laraxot coding standards.

- [Coding Standards](../../../../docs/laraxot-coding-standards.md)

### `rules-testing-no-migrate-fresh.md` — CRITICAL ARCHITECTURE RULE: NO MIGRATE:FRESH

# CRITICAL ARCHITECTURE RULE: NO MIGRATE:FRESH

## Rule
**NEVER** use `migrate:fresh` or the `RefreshDatabase` trait in any test or setup script within this modular architecture (Laraxot).

## Why?
1. **Destructive**: It destroys all tables across the default database connection.
2. **Tenant/Module Coupling**: In a modular application, tables are meant to be isolated. Wiping the entire database crashes other concurrently running tests or removes shared look-up tables that are not seeded correctly per-module.
3. **Data Loss**: Running tests with `RefreshDatabase` against a shared testing database will indiscriminately destroy other modules' data.

## Correct Approach
- Only use `DatabaseTransactions` to rollback state after tests.
- Maintain strict database boundaries.

### `s3test-corrections-conflict.md` — Correzioni S3Test.php - Modulo Media

# Correzioni S3Test.php - Modulo Media

## Problemi Identificati e Risolti

### 1. **Violazioni Architetturali Critiche**

#### Problema
- **Import diretti tra moduli**: Il file importava direttamente `Modules\Notify\Datas\EmailData` e `Modules\Notify\Emails\EmailDataEmail`
- **Accoppiamento stretto**: Il modulo Media conosceva il modulo Notify → violava il principio di disaccoppiamento

#### Soluzione Implementata
- **Rimossi gli import diretti** tra moduli
- **Eliminata la dipendenza** dal modulo Notify
- **Semplificata la logica email**: Rimossa la creazione di oggetti EmailData, mantenuto solo il logging per test

```php
// ❌ PRIMA (violazione architetturale)
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Emails\EmailDataEmail;


### `s3test-corrections.md` — Correzioni S3Test.php - Modulo Media

# Correzioni S3Test.php - Modulo Media

## Problemi Identificati e Risolti

### 1. **Violazioni Architetturali Critiche**

#### Problema
- **Import diretti tra moduli**: Il file importava direttamente `Modules\Notify\Datas\EmailData` e `Modules\Notify\Emails\EmailDataEmail`
- **Accoppiamento stretto**: Il modulo Media conosceva il modulo Notify → violava il principio di disaccoppiamento

#### Soluzione Implementata
- **Rimossi gli import diretti** tra moduli
- **Eliminata la dipendenza** dal modulo Notify
- **Semplificata la logica email**: Rimossa la creazione di oggetti EmailData, mantenuto solo il logging per test

```php
// ❌ PRIMA (violazione architetturale)
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Emails\EmailDataEmail;


### `schema.md` — Media Module Schema


# Media Module Schema

> **Purpose:** Defines folder rules, frontmatter standards, and workflows for AI agents.

## Module Identity

- **Name:** Media
- **Type:** Laravel Module (Laraxot)
- **Location:** `laravel/Modules/Media/`
- **Docs:** `laravel/Modules/Media/docs/`

## Wiki Rules

### raw/ Rules
- ✅ Immutable — AI reads but never modifies or deletes
- ✅ Drop liberally — articles, code snippets, decisions
- ✅ Subdivide by type: `articles/`, `papers/`, `code-examples/`, `decisions/`

### wiki/ Rules

### `scopo.md` — Media — scopo, confini e come servirlo meglio


# Media — scopo, confini e come servirlo meglio

## Lo scopo, dedotto dal codice

Media è l'unico dei tre servizi trasversali che possiede davvero qualcosa: tre tabelle,
tre modelli, tre migrazioni, uno per uno.

| Modello | Migrazione | Cosa rappresenta |
|---|---|---|
| `Media` | `2026_07_23_150000_create_medias_table.php` | il file allegato, in estensione di `Spatie\MediaLibrary\...\Media` |
| `MediaConvert` | `2022_01_01_000000_create_media_converts_table.php` | la richiesta di conversione di un video |
| `TemporaryUpload` | `2026_01_18_152545_create_temporary_uploads_table.php` | il file caricato ma non ancora agganciato a un modello |

Uno a uno, senza modelli orfani e senza migrazioni senza modello — è la regola
`migration-filename-from-model-name` rispettata alla lettera, e in que

### `second-brain.md` — Second brain (modulo)


# Second brain (modulo)

Stub **puntatore**: disciplina e link esterni curati stanno nella wiki di progetto.

| Strato | Dove in questo package |
|--------|-------------------------|
| Input / note grezze | questa cartella `docs/` (escluso `docs/wiki/`) |
| Wiki compilata | `docs/wiki/` del modulo |
| Regole globali | wiki root del monorepo |

## Link operativi (relativi al repo)

- Modello: [../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-operating-model](../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-operating-model)
- Guida wiki modulo: [../../../../bashscripts/ai/wiki/how-to/wiki-qmd-search.md#module-wiki-documentation](../../../../bashscripts/ai/wiki/how-to/wiki-qmd-search.md#module-wiki-documentation)
- Benchmark lettura

### `stories/0002-media-phpstan-fix-2.story.md` — Media PHPStan zero: method.staticCall

# Media PHPStan zero: method.staticCall

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0003-media-merge-conflict-resolution.story.md` — Media: risoluzione dei marker di merge committati in e7e667b11

# Media: risoluzione dei marker di merge committati in e7e667b11

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0005-phpstan-cleanup-media.story.md` — [STORY] PHPStan cleanup — Media

# [STORY] PHPStan cleanup — Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0007-media-clip-not-widget.story.md` — 12.1 Verdetto Clip

# 12.1 Verdetto Clip

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0008-spatie-medialibrary.story.md` — Story 16.5: Install and integrate spatie/laravel-medialibrary

# Story 16.5: Install and integrate spatie/laravel-medialibrary

## Context and Problem Statement

**Problem**: Media modulo manca core dependency `spatie/laravel-medialibrary`.

**Symptoms**:
- No polymorphic media collections support
- No automatic image conversions (WebP, AVIF, thumbnails)
- No CDN integration built-in
- FFmpeg pipeline (pbmedia/laravel-ffmpeg) works standalone, but no unified media abstraction

**Why matters**: Media modulo should be the canonical media layer for Laraxot ecosystem. Without medialibrary, every consuming module reinvents collections/conversions/CDN handling independently.

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

### `stories/0010-git-lfs-backfill.story.md` — 5.3: Git LFS: backfill 11 missing image objects

# 5.3: Git LFS: backfill 11 missing image objects

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0011-lfs-ci-validation.story.md` — 5.4: LFS validation in CI

# 5.4: LFS validation in CI

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0012-deprecated-gettableactions-migration.story.md` — Story 7.1: Migrate Deprecated getTableActions() → table() — Media Module

# Story 7.1: Migrate Deprecated getTableActions() → table() — Media Module

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0013-audit-qualita.story.md` — Audit qualita' — modulo Media

# Audit qualita' — modulo Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0017-continuation-3.story.md` — Media Module — Continuation Task

# Media Module — Continuation Task

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0018-docs-index-audit.story.md` — Audit indice documentazione Modules/Media/docs

# Audit indice documentazione Modules/Media/docs

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0021-media-docs-conflict-marker-cleanup-22.story.md` — Story: Media — pulizia marker di conflitto residui in docs/

# Story: Media — pulizia marker di conflitto residui in docs/

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0022-media-docs-conflict-marker-cleanup-3.story.md` — Story: Media — pulizia marker di conflitto residui in docs/

# Story: Media — pulizia marker di conflitto residui in docs/

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0023-media-mixed-type-reduction.story.md` — Riduzione uso di mixed nel modulo Media

# Riduzione uso di mixed nel modulo Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0025-media-module-bmad-setup.story.md` — Media Module BMAD Setup

# Media Module BMAD Setup

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0027-media-phpstan-swarm-pest-uses-group.story.md` — Fix swarm PHPStan 2026-09-15: falsi positivi uses()/describe()->group() nei test Pest

# Fix swarm PHPStan 2026-09-15: falsi positivi uses()/describe()->group() nei test Pest

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0031-media-quality-gate-3.story.md` — Chiusura quality-gate modulo Media (phpmd + pest + coverage baseline)

# Chiusura quality-gate modulo Media (phpmd + pest + coverage baseline)

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0032-media-root-txt-hygiene.story.md` — Story: Media root .txt hygiene

# Story: Media root .txt hygiene

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0033-media-services-to-actions.story.md` — Conversione app/Services in QueueableAction nel modulo Media

# Conversione app/Services in QueueableAction nel modulo Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0035-placeholder-translations-cleanup.story.md` — Via le traduzioni segnaposto dai file di lingua

# Via le traduzioni segnaposto dai file di lingua

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0036-services-to-actions-media-2.story.md` — Services -> Actions nel modulo Media

# Services -> Actions nel modulo Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0037-xotbaseresourcetable-model-audit-media-batch.story.md` — XotBaseResourceTable: dichiarare $model esplicito e verificare colonne reali

# XotBaseResourceTable: dichiarare $model esplicito e verificare colonne reali

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/16-2-case-variant-dirs-guard.md` — STORY-162 — Guard sulle directory case-variant e bonifica `Media/tests`

# STORY-162 — Guard sulle directory case-variant e bonifica `Media/tests`

## Context and Problem Statement

Su filesystem case-sensitive, `Factories/` e `factories/` sono due directory
reali distinte. Se entrambe contengono classi con lo stesso namespace PSR-4 e
lo stesso nome, autoloader e PHPStan ne risolvono **una sola**. L'altra non
viene mai analizzata.

Prova raccolta il 2026-08-06 in `Modules/Cms/database/`:

- `Factories/` e `factories/` con 8 classi omonime
- 6 coppie su 8 con contenuto **divergente**
- nella copia non analizzata sopravviveva `$faker->boolean(80)` — variabile
  non definita, errore fatale a runtime — con PHPStan a zero errori

Il caso Cms e' stato consolidato durante quella sessione. Ne resta uno:

```
laravel/Modules/Media/tests/Feature

### `stories/16-4-media-case-variant-consolidation.md` — STORY-164 — Consolidamento delle coppie case-variant in Media

# STORY-164 — Consolidamento delle coppie case-variant in Media

## Context and Problem Statement

I due `MediaBusinessLogicTest.php` **non sono lo stesso test in due copie**:

| | `tests/feature/` | `tests/Feature/` |
|---|---|---|
| Framework asserzioni | `expect()` di Pest | `PHPUnit\Framework\Assert` |
| Cast dei valori | `SafeIntCastAction::cast()` | helper locale `mediaIntegerish()` |

Sono **due test diversi con lo stesso nome pienamente qualificato**
(`Modules\Media\Tests\Feature\MediaBusinessLogicTest`). PHPStan li analizza
entrambi e resta verde. L'autoloader ne carica uno solo: l'altro non e' mai
stato eseguito, quindi non c'e' alcuna garanzia che passi.

Scegliere per data e' l'errore da non fare. La copia in `tests/feature/` e'
piu' recente (2026-08-06 21:39) perche' e' stata 

### `stories/intervention-image-phpstan.md` — PHPStan zero — Intervention Image v4

# PHPStan zero — Intervention Image v4

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/phpstan-cleanup-media-dev.md` — [DEV] PHPStan cleanup — Media

# [DEV] PHPStan cleanup — Media

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `structure.md` — Modulo Media

# Modulo Media

Data: [DATE] 19:09:56

## Informazioni generali

- **Namespace principale**: Modules\\Media
Modules\\Media\\Database\\Factories
Modules\\Media\\Database\\Seeders
Modules\\Media\\Tests
- **Pacchetto Composer**: laraxot/module_media_fila5
Marco Sottana
- **Dipendenze**: php ^8.2 pbmedia/laravel-ffmpeg ^8.5 intervention/image * repositories type path url ../User type path url ../Tenant type path url ../UI type path
- **Totale file PHP**: 97
- **Totale classi/interfacce**: 64

## Struttura delle directory

```


### `support/temporary-upload-path-generator-temporaryuploadpathgenerator.md` — TemporaryUploadPathGenerator

# TemporaryUploadPathGenerator

## Descrizione
Questa classe gestisce la generazione dei percorsi per i file temporanei caricati nel sistema media, seguendo le best practices di Laraxot.

## Funzionalità
- Generazione percorsi per file originali
- Generazione percorsi per conversioni
- Generazione percorsi per immagini responsive
- Generazione percorsi base univoci

## Struttura
- Namespace: `Modules\Media\Support`
- Dipendenze:
  - `Modules\Media\Models\Media`
  - `Webmozart\Assert\Assert`

## Metodi Principali
1. `getPath(Media $media): string`
   - Genera il percorso per il file originale

### `support/temporary-upload-path-generator.md` — TemporaryUploadPathGenerator Documentation

# TemporaryUploadPathGenerator Documentation

## Overview
Il `TemporaryUploadPathGenerator` è una classe che gestisce la generazione dei percorsi per i file multimediali temporanei nel sistema.

## Funzionalità

### Generazione Percorsi
- `getPath()`: Genera il percorso per il file originale
- `getPathForConversions()`: Genera il percorso per le conversioni
- `getPathForResponsiveImages()`: Genera il percorso per le immagini responsive
- `getBasePath()`: Genera il percorso base univoco

### Caratteristiche
- Generazione percorsi univoci basati su UUID e ID
- Supporto per file originali e conversioni
- Gestione immagini responsive
- Struttura directory organizzata

## Struttura Directory

### `task-aumentare-copertura-test.md` — Task: Aumentare Copertura Test - Media

# Task: Aumentare Copertura Test - Media

**Modulo**: Media
**Priorita'**: Alta
**Completamento**: 15%

---

## Test da Implementare

- [ ] Upload file: test formati validi/invalidi
- [ ] Image optimization: test resize/crop
- [ ] Video conversion: test con mock FFmpeg
- [ ] S3 integration: test con mock S3 client
- [ ] SaveAttachmentsAction: test salvataggio multiplo

## Criteri di Completamento

- [ ] 10+ nuovi test
- [ ] Mock per servizi esterni (FFmpeg, S3)

### `task-consolidare-documentazione.md` — Task: Consolidare Documentazione - Media

# Task: Consolidare Documentazione - Media

**Modulo**: Media
**Priorita'**: Bassa
**Completamento**: 20%

---

## Criteri di Completamento

- [ ] Rimossi duplicati da 130 docs
- [ ] README.md aggiornato

### `task-ridurre-phpstan-suppressioni.md` — Task: Ridurre Suppressioni PHPStan Inline - Media

# Task: Ridurre Suppressioni PHPStan Inline - Media

**Modulo**: Media
**Priorita'**: Alta
**Completamento**: 0%

---

## File Coinvolti (19 suppressioni)

| File | Suppressioni |
|------|-------------|
| `app/Filament/Clusters/Test/Pages/S3Test.php` | 6 |
| `app/Console/Commands/ConvertVideoCommand.php` | 3 |
| `app/Actions/Video/ConvertVideoAction.php` | 3 |
| `app/Actions/Video/ConvertVideoByMediaConvertAction.php` | 1 |
| `app/Actions/Video/ConvertVideoByConvertDataAction.php` | 1 |
| `app/Actions/SaveAttachmentsAction.php` | 2 |
| `app/Filament/Resources/MediaResource/Widgets/ConvertWidget.php` | 2 |
| `app/Models/TemporaryUpload.php` | 1 |

### `testing-guidelines.md` — Media Module - Testing Guidelines

# Media Module - Testing Guidelines

## Testing Framework Requirements

### Environment Configuration
All tests MUST use `.env.testing` configuration:
```env
APP_ENV=testing
DB_CONNECTION=sqlite
DB_DATABASE=<nome progetto>_data_test
FILESYSTEM_DISK=local
MEDIA_DISK=local
```

### Pest Framework Usage
All tests MUST be written in Pest format. Convert any PHPUnit tests to Pest syntax.

## Business Logic Test Coverage

### 1. Media Management Tests

### `testing-rules.md` — Testing Rules Summary

# Testing Rules Summary

## Regole Fondamentali dei Test

### 1. **Pest Testing Mandatory**
- **MAI** usare PHPUnit class-based (`class Test extends TestCase`)
- **SEMPRE** usare Pest functional syntax (`test()`, `it()`)
- I test devono essere scritti in formato Pest, non PHPUnit

### 2. **NO RefreshDatabase - MAI**
- **MAI** usare `use RefreshDatabase` nei test
- **MAI** usare `RefreshDatabase` trait
- Utilizzare `.env.testing` con SQLite in-memory
- Usare `DatabaseTransactions` se necessario (raro)

### 3. **Configurazione Testing**
- Tutti i test devono leggere `.env.testing`
- PHPStan usa configurazione da `phpstan.neon` (non passare livello come parametro)
- Script di conversione vanno in `bashscripts/`, non nella root di Laravel


### `testing-testcase-database-connection-fix.md` — Fix: Media TestCase - Database Connection Configuration

# Fix: Media TestCase - Database Connection Configuration

**Problema**: Test Media falliscono con QueryException per database connection 'media'
**Principio**: Il sito funziona, quindi il test deve riflettere il comportamento reale

## 🔍 Analisi del Problema

### Errore Originale
- Test Media falliscono con: `QueryException` e problemi di connessione database
- Il TestCase di Media aveva logica complessa che saltava i test se MySQL non configurato
- Il modello Media BaseModel usa esplicitamente `protected $connection = 'media'`

### Causa
- `Media/tests/TestCase.php` richiedeva MySQL da `.env.testing` e saltava i test se non presente
- Il modello Media BaseModel usa esplicitamente connection 'media'
- Il test non configurava le connessioni per SQLite in-memory

### Comportamento Reale
Il 

### `testing.md` — Testing Documentation

# Testing Documentation

## Overview

This document provides testing guidelines and examples for the Media module in Laraxot.

## Test Structure

### Directory Structure

```
Modules/Media/tests/
├── Feature/
│   ├── (feature tests)
├── Unit/
│   └── (unit tests)
├── TestCase.php
└── Pest.php
```


### `translations.md` — Traduzioni del Modulo Media

# Traduzioni del Modulo Media

## Panoramica

Il modulo Media gestisce la traduzione di tutti i componenti relativi alla gestione dei file multimediali, inclusi allegati, schemi di documenti e azioni correlate.

## File di Traduzione

### attachments_schema.php

Gestisce le traduzioni per gli schemi di allegati utilizzati in diversi contesti dell'applicazione.

#### Struttura

```php
'fields' => [
    'invoice' => [
        'label' => 'Fattura',
        'placeholder' => 'Carica la fattura',
        'helper_text' => 'Formati supportati: PDF, JPG, PNG. Dimensione massima: 10MB',

### `troubleshooting.md` — Troubleshooting

# Troubleshooting

---

<!-- Merged from TROUBLESHOOTING.md, which collided with this file on case-insensitive filesystems. -->

---
title: "Troubleshooting Guide — Media Module"
module: "Media"
type: operations
tags: [troubleshooting, errors, debugging]
last_updated: 2026-07-28
---

# Troubleshooting Guide — Media Module

**Last updated:** 2026-07-28

Systematic error resolution for file upload, storage, processing, and permissions issues.


### `user-interface.md` — User Interface

# User Interface

### `video-manager.md` — Versione HEAD

https://github.com/amitavroy/MyVideoManager

### Versione HEAD

### Versione Incoming

https://github.com/amitavroy/MyVideoManager

---

### `webm.md` — webm

https://pixelpoint.io/blog/web-optimized-video-ffmpeg/

ffmpeg -i in.mp4 -c:v libvpx-vp9 -threads 4 out.mp4

ffmpeg -i input.mp4 -c:v libvpx-vp9 -preset ultrafast -b:v 1M -c:a libvorbis output.webm
ffmpeg -i input.mp4 -c:v libvpx-vp9 -preset ultrafast -b:v 1M -c:a libvorbis -threads 4 -speed 4 output.webm


-i input.mp4: Specifica il file di input.
-c:v libvpx-vp9: Utilizza il codec video VP9 per WebM.
-preset ultrafast: Imposta il preset di velocità su ultrafast.
-b:v 1M: Imposta il bitrate video a 1 Mbps (puoi modificarlo in base alle tue esigenze).
-c:a libvorbis: Utilizza il codec audio Vorbis
-threads 4: utilizza 4 thread per l'elaborazione, aumentando la velocità di conversione sfruttando il multi-threading.
-speed 4: imposta la velocità del codec VP9 a 4, che è un valore elevato per

### `wiki/concepts/temporary-uploads-migration-consolidation.md` — TemporaryUpload: consolidated into a single create migration


# TemporaryUpload: consolidated into a single create migration

## Problem found

Three migrations touched the `temporary_uploads` table:

- `2023_01_01_000000_create_temporary_uploads_table.php` — the real create migration
  (`XotBaseMigration`, `tableCreate()` + `tableUpdate()` for timestamps).
- `2026_01_18_152545_add_columns_to_temporary_uploads_table.php` — **violation**: plain
  `Illuminate\Database\Migrations\Migration`, `Schema::table()` +
  `Schema::hasColumn('temporary_uploads', ...)`, `add_` filename prefix.
- `2026_01_18_152545_create_temporary_uploads_table.php` — a duplicate leftover that
  already re-implemented the add-columns logic correctly (`XotBaseMigration`,
  `$this->hasColumn()`), but as a **second, separate** "create" file for the same
  model — itself a violation 

### `wiki/troubleshooting/multibase-class-redeclare-runtime.md` — FatalError: Cannot redeclare class (path mix `base_*_fila5`)


# FatalError: Cannot redeclare class (path mix `base_*_fila5`)

## Sintomo

Messaggio tipo:

`Cannot redeclare class Modules\Media\Filament\Resources\HasMediaResource\Schemas\HasMediaForm (previously declared in /var/www/_bases/base_ptvx_fila5/laravel/Modules/Media/...)`

 mentre la seconda segnatura punta a un altro albero sotto `_bases/` o a un path relativo del progetto «corrente». Spesso compare durante `@php artisan optimize` o `composer run go`.

## Causa radice

Un solo processo PHP carica **due file fisici diversi** che definiscono la **stessa classe** (`namespace` + `class` uguali). Non è tipicamente un conflitto PSR-4 nella stessa installazione Composer: Composer non può registrare due file per lo stesso FQCN nella stessa mappa.

Scenari comuni:

- `composer` o `php` eseguiti da

### `xml-to-srt.md` — Contenuto fuso da `xml-to-srt.md`

https://github.com/mokhosh/laravel-xml2srt
---
https://github.com/mokhosh/laravel-xml2srt

## Contenuto fuso da `xml-to-srt.md`

# Xml to srt — risorse esterne

> Fonti raccolte durante lo studio dell'argomento. Una fonte vale quando la si
> collega a un punto del codice: leggila, poi trova dove è già applicata.

## Riferimenti

- <https://github.com/mokhosh/laravel-xml2srt>

### `youtube.md` — youtube

https://github.com/mokhosh/laravel-youtube-api

https://github.com/mokhosh/laravel-youtube-downloader
---
https://github.com/mokhosh/laravel-youtube-downloader
