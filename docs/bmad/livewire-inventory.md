---
title: "Inventario Http/Livewire → Filament widget — Media"
type: inventory
module: Media
status: approved
track: livewire-to-filament-widget
related:
  - ./LIVEWIRE-WIDGET-CONVERSION.md
  - ./livewire-widget-architecture.md
  - ./livewire-widget-brainstorming.md
  - ./livewire-widget-decision-log.md
  - ./livewire-widget-epics.md
  - ./livewire-widget-prd.md
  - ./livewire-widget-product-brief.md
  - ./livewire-widget-project-context.md
  - ./livewire-widget-tech-spec.md
  - ./livewire-widget-ux.md
  - ../stories/12.1.media-clip-not-widget.story.md
---

# Inventario: Livewire HTTP → Filament widget, modulo Media

**Solo documentazione. Nessun PHP convertito, nessun widget creato.**

Questo file è la fonte canonica per il modulo Media sulla campagna di conversione Livewire → Filament widget. Sostituisce nei contenuti tecnici `LIVEWIRE-WIDGET-CONVERSION.md` (2026-08-25), la cui proposta di conversione era basata su un'ipotesi non verificata; quel file resta in linea come puntatore superseded, non va cancellato.

Una sessione concorrente ha scritto in parallelo, lo stesso giorno (21/09/2026), un pacchetto di stub BMAD (`livewire-widget-*.md`) e la story `12.1.media-clip-not-widget.story.md`, arrivando allo stesso verdetto di merito (Clip non è candidato a widget). Questo documento ne verifica ogni affermazione contro il codice reale, aggiunge le citazioni file:riga mancanti e corregge un'imprecisione (si veda "Correzione rispetto ai documenti paralleli" più sotto), invece di duplicare l'inventario.

## Metodo (comandi eseguiti, non a memoria)

```bash
find Modules/Media/app/Http/Livewire -name '*.php'
grep -rn "card.video.clip\|Card\\\\Video\\\\Clip" --include="*.php" --include="*.blade.php" .
grep -rn "@livewire(" Modules/Media --include="*.blade.php"
grep -rn "Livewire::component" Modules/Media
grep -rln "showModal\|editClip\|updateDataFromModal" --include="*.php" --include="*.blade.php" --include="*.js" .
find Modules/Media/app/Filament -type f -iname "*.php"
cat Modules/Media/app/Providers/Filament/AdminPanelProvider.php
cat Modules/Media/routes/web.php Modules/Media/routes/api.php
```

## Componenti Livewire nel modulo Media

Il modulo ha **una sola** classe sotto `app/Http/Livewire`:

| File | Namespace | Alias registrato |
|------|-----------|-------------------|
| `Modules/Media/app/Http/Livewire/Card/Video/Clip.php:15` | `Modules\Media\Http\Livewire\Card\Video` (`Modules/Media/app/Http/Livewire/Card/Video/Clip.php:5`) | `card.video.clip` (`Modules/Media/app/Http/Livewire/_components.json:1`) |

`_components.json` è il registro di auto-discovery dei componenti Livewire del modulo (generato dal pacchetto, non un punto di montaggio): registra che l'alias `card.video.clip` *esiste ed è invocabile*, non che qualcosa lo invochi davvero. La verifica dell'uso reale va fatta a parte, sezione seguente.

## Cosa fa Clip

`Clip` (`Modules/Media/app/Http/Livewire/Card/Video/Clip.php`) riceve un `Model` in `mount()` (riga 34-37), espone `editClip()` (righe 58-62) che raccoglie i dati del model e li invia con `$this->dispatch('showModal', ['editClip', $data])` a un modale generico, e `updateDataFromModal()` (righe 69-85) che, ricevuto l'evento di ritorno dal modale con id `editClip`, aggiorna solo i campi `title` e `subtitle` del model e lo ricarica. `render()` (righe 42-53) risolve la vista tramite `GetViewAction` sul template `edit` (proprietà `$tpl`, riga 17). Il pattern `dispatch('showModal', [...])` è lo stesso meccanismo generico usato da `Modules/UI/resources/views/components/ui/modal.blade.php` e da `Modules/User/resources/views/components/ui/modal.blade.php`: un listener JS/Blade condiviso che apre un modale in base al primo elemento dell'array. Non è quindi un meccanismo specifico di Clip, ma non basta da solo a dimostrare che Clip sia effettivamente montato da qualche parte.

## Verifica di montaggio: risultato negativo su tutti i canali controllati

Come richiesto dal punto 2 della procedura, sono stati controllati tutti i canali possibili di montaggio, non solo l'hook Filament:

1. **Hook render nel panel provider Filament.** `Modules/Media/app/Providers/Filament/AdminPanelProvider.php` ha 20 righe totali ed è composto solo da `protected string $module = 'Media';` e da un `panel()` che chiama `parent::panel($panel)` senza aggiungere alcun `renderHook`. Zero hook nel modulo Media, quindi zero possibilità che Clip sia montato nel chrome del pannello admin.
2. **Direttiva `@livewire('card.video.clip')` o `<livewire:card.video.clip>` in blade.** Grep su tutto il repository (moduli, temi in `Themes/` e `themes/`) per l'alias `card.video.clip` e per il namespace `Card\Video\Clip`: zero corrispondenze al di fuori del file sorgente stesso e del suo `_components.json`.
3. **Registrazione esplicita via `Livewire::component(...)`.** Nessuna occorrenza nel modulo Media (il pacchetto usa solo l'auto-discovery via `_components.json`).
4. **Instradamento come pagina a sé.** `Modules/Media/routes/web.php` e `Modules/Media/routes/api.php` contengono solo l'intestazione PHP (`declare(strict_types=1);`), nessuna rotta definita. Non esiste `routes/livewire.php` nel modulo. Nessun `Route::get(..., Livewire::class)` che punti a Clip.
5. **Componente Blade nelle view del modulo che lo referenzi dinamicamente** (es. costruzione dell'alias a partire dal mime-type del media). `Modules/Media/resources/views/components/` contiene solo un `.gitkeep`; nessuna vista del modulo referenzia `card.video.clip` o `Card\Video\Clip` in forma statica o dinamica.
6. **Vista associata al render.** `GetViewAction::execute('edit')` (chiamata da `Clip::render()`, riga 47) risolverebbe una vista tipo `media::card.video.clip.edit` o `pub_theme::card.video.clip.edit`; non esiste alcuna directory `card/video/clip` sotto `Modules/Media/resources/views` né in nessun tema del repository. Se Clip venisse effettivamente montato oggi, il `render()` fallirebbe per vista mancante.
7. **Test.** Nessun test in `Modules/Media/tests` referenzia `Clip`. Esiste un artefatto di coverage HTML storico (`build/coverage/html/Media/app/Http/Livewire/Card/Video/Clip.php.html`), segno che la classe è stata inclusa in una run di coverage generica del modulo, non prova di un test dedicato o di un utilizzo funzionale.

**Conclusione verificata:** `Clip` non ha, allo stato attuale del codice, alcun punto di montaggio vivo — né hook Filament, né blade statico o dinamico, né rotta, né vista di supporto. È codice orfano, non un componente front-office attivo.

## Correzione rispetto ai documenti paralleli

Il file `livewire-inventory.md` scritto in parallelo dalla sessione concorrente (stessa cartella, stesso timestamp di questa verifica) descrive Clip come "Card FO video + modal edit" lasciando intendere un uso reale in front-office. La verifica sopra non trova nessuna evidenza di montaggio, nemmeno lato FO: non solo manca l'hook Filament (che la nota concorrente aveva già escluso correttamente), manca anche la vista che `render()` cercherebbe. La correzione non cambia il verdetto operativo (nessun widget da creare), ma cambia la diagnosi: non è "componente FO attualmente in uso ma fuori scope Filament", è "componente orfano, probabilmente dead code, da valutare per rimozione in una story separata di pulizia — non oggetto di questa campagna che riguarda solo widget Filament".

## Widget Filament esistenti nel modulo Media (ricerca gemelli)

Come richiesto dal punto 3 della procedura, prima di escludere un widget nuovo è stata cercata la presenza di un gemello funzionale. L'unico widget presente nell'albero `Modules/Media/app/Filament` è:

- `Modules/Media/app/Filament/Resources/MediaResource/Widgets/ConvertWidget.php:18` — estende `XotBaseWidget` (`Modules/Media/app/Filament/Resources/MediaResource/Widgets/ConvertWidget.php:14`, `use Modules\Xot\Filament\Widgets\XotBaseWidget`), è legato a `MediaResource` (riga 29, `protected static string $resource = MediaResource::class;`) e mostra l'avanzamento di una conversione FFMpeg (proprietà `time`, `percentage`, `remaining`, `rate`). Non ha nulla in comune con la funzione di `Clip` (editing inline di `title`/`subtitle` di un media con modale) e non ne è un gemello.

Non esiste una directory `Modules/Media/app/Filament/Widgets` autonoma: gli unici widget del modulo vivono sotto `MediaResource/Widgets`, legati alla resource. **Nessun gemello esistente per Clip.**

## Classificazione

| Cluster | Definizione | Esito per Clip |
|---------|-------------|-----------------|
| A — chrome Filament | montato via render hook nel panel provider, candidato a `XotBaseWidget` nuovo | **No.** Zero hook (vedi sezione verifica, punto 1). |
| B — gemello esistente | Livewire orfano con un widget Filament funzionante da agganciare | **No.** Nessun gemello (sezione precedente). |
| C — pagina/struttura non di chrome | instradato a tutto schermo o componente strutturale non-chrome, non candidato widget | **Applicabile solo in parte**, vedi nota sotto. |

`Clip` non rientra in modo pulito nella definizione stretta del Cluster C (che presuppone un componente strutturale comunque vivo, es. una pagina instradata). Non è instradato e non risulta montato da nessuna vista attiva del repository: è più precisamente un **quarto caso, "orfano puro"** — zero punti di montaggio verificabili — che condivide con il Cluster C la conclusione operativa (non è un candidato a conversione in widget Filament, perché non c'è nulla di "chrome" da convertire) ma non la premessa (non è "strutturale e vivo", è probabilmente dead code). Ai fini di questa campagna (solo widget Filament) il trattamento è identico a un Cluster C: **escluso dalla conversione**, nessuna story di conversione a widget.

## Perché non si crea un widget nuovo

Costruire un `ClipWidget` (o `MediaVideoWidget`, come proponeva `LIVEWIRE-WIDGET-CONVERSION.md`) per un componente che non risulta montato da nessuna parte del codice sarebbe scrivere codice nuovo per rimpiazzare codice morto, cioè introdurre superficie senza rimuoverne — l'opposto dell'obiettivo della campagna (ridurre gli alias Livewire nel chrome Filament). Se in futuro emergesse un uso reale di `Clip` in front-office (es. via un tema non ancora ispezionato o un piano di rilascio non ancora mergiato), la story corretta sarebbe comunque valutare quell'uso concreto, non anticipare un widget dashboard che oggi non ha nessun consumatore.

## Story collegate

- `../stories/12.1.media-clip-not-widget.story.md` — story di verdetto/lock di scope aperta dalla sessione concorrente il 21/09/2026, arricchita in questa sessione con Acceptance Criteria citate, Dev Notes e Testing (vedi il file per il dettaglio). Nessuna nuova story di conversione è necessaria: zero candidati reali Cluster A/B nel modulo.

## File paralleli (non SSoT)

Scritti dalla sessione concorrente in parallelo a questa verifica. Non contengono errori di merito (il verdetto coincide), ma sono stub telegrafici senza citazioni: restano come satelliti, questo file è la fonte canonica per chi deve verificare un'affermazione.

- [LIVEWIRE-WIDGET-CONVERSION.md](./LIVEWIRE-WIDGET-CONVERSION.md) — versione precedente (2026-08-25), marcata superseded in questa sessione perché proponeva la conversione senza aver verificato il montaggio.
- livewire-widget-architecture.md, livewire-widget-brainstorming.md, livewire-widget-decision-log.md, livewire-widget-epics.md, livewire-widget-prd.md, livewire-widget-product-brief.md, livewire-widget-project-context.md, livewire-widget-tech-spec.md, livewire-widget-ux.md — stub di una riga ciascuno, coerenti col verdetto qui sopra ma senza citazioni file:riga; non riscritti singolarmente in questa sessione per non entrare in conflitto con la sessione concorrente che li ha appena prodotti e per restare nello scope richiesto (inventario + story).

## Stato del modulo

Il modulo Media ha **1 classe Livewire**, **0 candidati reali** a conversione in Filament widget (0 Cluster A, 0 Cluster B). Non serve nessuna nuova story di implementazione. La traccia scritta della verifica è questo file.
