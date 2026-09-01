# 🎞️ Media — l'unico posto dove un file smette di essere un problema

[![PHP](https://img.shields.io/badge/PHP-%5E8.2-777BB4.svg)](composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-13.30-FF2D20.svg)](../../composer.lock)
[![Filament](https://img.shields.io/badge/Filament-5.7-FDAB3D.svg)](../../composer.lock)
[![PHPStan](https://img.shields.io/badge/PHPStan-0%20errori-brightgreen.svg)](../../phpstan.neon)
[![strict_types](https://img.shields.io/badge/declare-strict__types%3D1-informational.svg)](#)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

> Ogni modulo ha bisogno di caricare un'immagine, generare una thumbnail, servire
> un video. Nessuno dovrebbe reinventarlo. Media è dove quel problema è stato
> risolto una volta — e dove, se guardi bene, è ancora solo mezzo risolto.

I badge sopra sono misurati, non incollati: `phpstan analyse Modules/Media`,
l'1 settembre 2026, a tree fermo (dato di `base-ptvx-fila5-80`, riproducibile
con `cd laravel && ./vendor/bin/phpstan analyse Modules/Media`).

---

## Perché

Immagini, video, allegati: ogni modulo del progetto ne genera, prima o poi.
Senza un posto unico, ognuno inventa il proprio upload, il proprio disco, la
propria convenzione di naming — e la migrazione a S3 diventa venti migrazioni
diverse invece di una. Media esiste per essere quel posto: upload, conversioni,
storage multiplo (locale, S3, Minio), un'unica volta.

## Logica

`app/Actions` fa il lavoro, `app/Conversions` decide come una immagine o un
video diventano derivati (thumbnail, formati, bitrate), `app/Datas` porta i
dati tipizzati fra i due. Nessuna business logic nei controller, nessuna nei
model: se serve capire cosa succede quando arriva un file, si legge una
Action, non si segue un `boot()` nascosto in un observer.

## Filosofia

**Un file caricato non è un file salvato finché non è verificato.** MIME type,
dimensione, estensione: la validazione sta prima dell'attach, non dopo, perché
un file malevolo dentro lo storage è un problema che si eredita per sempre,
mentre uno rifiutato all'ingresso è solo un errore utente. La stessa logica
vale per le conversioni: se FFmpeg fallisce su un video, il fallimento deve
essere esplicito, non un file corrotto silenziosamente accettato.

## Religione

**Un numero non misurato non è un numero.** Il vecchio `docs/coverage.md` di
questo modulo aveva la data scritta come `[DATE]` — un placeholder mai
riempito, mai controllato, rimasto lì per settimane. Non è un dettaglio: è la
prova che nessuno l'ha mai riletto dopo averlo scritto. Da oggi ogni cifra qui
sotto viene da un comando eseguito lo stesso giorno, o non compare.

## Politica

`laravel/phpstan.neon` è sacro: nessun agente lo tocca. Le run di verifica
sono nude — niente `-c`, niente `--level` custom — perché un numero ottenuto
bypassando la config di progetto non certifica niente.

## Zen

Un modulo che sposta byte per vivere non ha bisogno di essere elegante: ha
bisogno che i byte arrivino integri. La bellezza qui è l'assenza di sorprese,
non l'astrazione.

---

## Stato misurato — 1 settembre 2026

| Metrica | Valore | Comando |
|---|---:|---|
| File PHP in `app/` | 124 | `find app -name '*.php' \| wc -l` |
| Casi di test | 314 | `./vendor/bin/pest Modules/Media` |
| PHPStan | **0 errori**, `level: max` | `./vendor/bin/phpstan analyse Modules/Media` |
| `@phpstan-ignore` residui | 0 | — |
| PHPInsights — Code | 91.8 % | `./tools/phpinsights.sh Modules/Media` |
| PHPInsights — Architecture | **100.0 %** | idem |
| PHPMD su `app/` | 171 rilievi reali | `./tools/phpmd.sh Modules/Media/app` |
| Coverage `app/` | **0.00 %** (0/2140 statement) ⚠️ | `Modules/Media/docs/coverage.md` |

**L'Architecture al 100% non è un premio, è una scala.** Media ha 124 file
contro i 1654 di Xot: un modulo piccolo e ben ritagliato ottiene facilmente un
punteggio alto perché ha meno superficie in cui accumulare debito. Non
significa "impeccabile", significa "non ancora abbastanza grande per
mostrare le crepe" — vale la pena ricontrollarlo quando il modulo crescerà.

**Lo 0.00% di coverage è il numero vero da guardare.** 314 test passano, ma
la misura di riga su `app/Media` risulta zero: sintomo noto nel progetto
(perimetro di coverage che punta a `app/` della root Laravel, non del
modulo — vedi la memoria di second brain
`project-coverage-perimeter-is-app-only`), non prova che il codice sia
davvero non testato. Finché non si misura col comando giusto, resta un
numero onesto ma inutile: non si arrotonda a "ok perché i test passano".

## Cosa contiene

- **`app/Actions`** — upload, attach, conversioni: la logica vera, testabile
  in isolamento.
- **`app/Conversions`** — pipeline immagini (Intervention Image) e video
  (FFmpeg): resize, formati, thumbnail, bitrate adattivo.
- **`app/Datas`** — DTO tipizzati (Spatie Laravel Data) fra Action e Filament,
  niente array associativi non tipizzati in giro.
- **`app/Filament`** — media library, bulk operation, batch processing per
  l'admin.

## Come si verifica (non fidarti di questo file)

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Media       # 0 errori atteso
./tools/phpmd.sh Modules/Media/app               # NON la root del modulo
./tools/phpinsights.sh Modules/Media
./vendor/bin/pest Modules/Media
```

## Documentazione

| | |
|---|---|
| Coverage (misura storica, da rifare col perimetro giusto) | [`docs/coverage.md`](docs/coverage.md) |
| Architettura | [`docs/architecture.md`](docs/architecture.md) |
| FFmpeg | [`docs/ffmpeg-usage.md`](docs/ffmpeg-usage.md) |
| Wiki tecnica | [`docs/`](docs/) |

---

**Modulo** `media` · **Laraxot / FixCity Platform** · licenza MIT
