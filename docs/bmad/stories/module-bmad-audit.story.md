---
id: Media/module-bmad-audit-20261116
title: "Media: audit modulare completo"
status: ready-for-dev
module: Media
epic: module-governance
priority: P1
created: 2026-11-16
references:
  - ../architecture/module-boundary.md
  - ../brainstorming/module-opportunities.md
  - ../epics/module-roadmap.md
  - ../audit.md
  - ../audits/media-audit.md
---
# Story — Media: audit modulare completo

Come manutentore del modulo Media, voglio una baseline BMAD verificabile e un
audit tecnico aggiornato, così da poter pianificare lavoro senza confondere
ipotesi, WIP e comportamento osservato.

## Acceptance criteria

- [ ] Confermare API pubblica e confini con riferimenti a codice reale.
- [ ] Inventariare i flussi critici e collegarli a test Pest.
- [ ] Misurare PHPStan/Pest nel contesto stabile del modulo.
- [ ] Registrare dipendenze, rischi e decisioni nel modulo.
- [ ] Aggiornare lo stato reale in `docs/sprint-status.yaml`.

## Task

- [ ] Revisione architettura.
- [ ] Brainstorming con stakeholder.
- [ ] Decomposizione epic in story più piccole.
- [ ] Quality gate e second-brain write-back.

## Audit tecnico — 2026-11-16

Misurato sul worktree corrente. PHPStan level max su `Modules/Media`: **0 errori**.

### Struttura e conteggi

| Area | Conteggio |
|---|---:|
| File PHP in `app/` | 127 |
| Modelli Eloquent | 4 (`Media`, `MediaConvert`, `TemporaryUpload`, `BaseModel`) |
| Business Action (Spatie Queueable) | 51 in `app/Actions/` (sottodirs: Diagnostic/Aws+S3, Ffmpeg, Image, S3, Storage, Stream, Subtitle, TemporaryUpload, Upload, Video, CloudFront) |
| Filament Resources | 4 (HasMedia, Media, MediaConvert, TemporaryUpload) |
| Pagine Filament | Dashboard, SettingPage + cluster `Test` (AwsTest, S3Test) |
| Migrazioni | 5 |
| File di test Pest | 47 (41 con `test()`/`it()`), 0 `expect(true)` |
| Lang | `it` 25 / `en` 16 / `de` 15 / `es` 4 file |

Nessuna directory `Services/` — logica in Action, coerente con la convenzione Xot.

### Finding

1. **[Docs/code — media] File di backup nel codice**:
   `app/Models/BaseModel.php.backup-20251015-092511` — residuo da rimuovere
   (o spostare in docs se contiene storia utile).
2. **[i18n — media] `lang/en` incompleto**: `it` ha 25 file, `en` 16; mancano
   `admin_panel_provider.php`, `attachment_type_enum.php`, `aws_test.php`,
   `media_converts.php`, `s3_test.php`, `temporary_uploads.php`, `test.php`,
   `attachments_schema_action_test.php`. `de`/`es` sono parziali.
3. **[Filament — bassa] Solo 4 label hardcoded** in
   `app/Filament/Clusters/Test/Pages/AwsTest.php` (pagine diagnostiche del
   cluster Test). Compliance sostanzialmente ok; nessun uso di
   `Filament\Forms\Form` legacy, nessuna classe Filament che estenda classi
   Filament dirette (tutte via base Xot).
4. **[Qualità — bassa] 60 occorrenze `mixed`**, quasi tutte docblock
   `array<string, mixed>` legittimi; 2 `@phpstan-ignore-next-line` in
   `ConvertVideoByConvertDataAction.php:47` e `ConvertVideoByMediaConvertAction.php:55`
   (chiamate a metodi dynamici ffmpeg/MediaConvert — da verificare se
   tipizzabili). Le annotation `@phpstan-require-extends` sui trait sono
   pattern corretto.
5. **[Docs — media] Duplicazione indice**: `docs/bmad/00-INDEX.md` (748 B) e
   `docs/bmad/00-index.md` (3.218 B) coesistono con contenuti diversi — su FS
   case-sensitive sono file distinti e ambigui. Consolidare in un unico
   `00-index.md` kebab-case.
6. **[Docs — bassa] 24 file `.md` datati o con suffisso `-N`** in `docs/`
   (es. `docs-archive-2026/`, `conflict-resolution-*.md`); `docs/` contiene
   510 file markdown — doc sprawl da consolidare.
7. **[Test — ok]** 47 file Pest ben distribuiti (Unit/Actions, Conversions,
   Datas, Enums, Filament, Models, Rules, Support/Ffmpeg; Feature/Filament).
   Il cluster `Test` (AwsTest/S3Test) è diagnostica AWS/S3 esposta in Filament:
   verificare che sia limitata ad ambienti non-prod o dietro permission.

### Rischi

- Le pagine diagnostiche AWS/S3 nel cluster Test possono esporre dettagli di
  configurazione se visibili in produzione.
- Il backup file in `app/Models` può essere scansionato da PHPStan/autoload.

### Next steps (priorizzati)

1. **P1** — Verificare `canView`/permission del cluster Filament `Test`
   (AwsTest, S3Test) e limitarlo a contesti diagnostici.
2. **P1** — Allineare `lang/en` (9 file mancanti) o marcare le chiavi IT-only.
3. **P2** — Rimuovere `BaseModel.php.backup-20251015-092511`.
4. **P2** — Consolidare `00-INDEX.md`/`00-index.md` in un unico indice.
5. **P3** — Valutare se i 2 `@phpstan-ignore-next-line` sono eliminabili con
   tipi espliciti.
