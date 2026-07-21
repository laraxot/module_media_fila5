# Media: il modulo che trasforma complessita in vantaggio operativo

Media management module for the Laraxot ecosystem: images, videos, FFmpeg, and Intervention Image.

## Perche guardarlo adesso

- Riduce attrito operativo con convenzioni Laraxot gia pronte.
- Porta documentazione, release e changelog nello stesso flusso verificabile.
- Aiuta team e agenti AI a capire subito scopo, confini e prossime mosse.
- E pensato per crescere: semantic versioning, auto release e changelog automatico sono gia configurati.

## Cosa promette

Questo modulo non e solo codice: e una vetrina operativa. Mostra dove intervenire, cosa leggere, come rilasciare e come mantenere alta la confidenza tecnica.

## Release automation

- Workflow: [Semantic Release](./.github/workflows/semantic-release.yml)
- Config: [.releaserc.json](./.releaserc.json)
- Changelog: [CHANGELOG.md](./CHANGELOG.md)


## Documentazione tecnica

- [Indice docs](./docs/README.md) — mappa knowledge base locale (wiki, audit, regole)

## Documentazione essenziale

- [Second brain locale](./docs/wiki/index.md)
- [Audit ridondanza](./docs/code-redundancy-audit.md)
- [Protocollo confidenza](./docs/agent-confidence-protocol.md)
- [Disciplina agenti](./docs/agent-edit-discipline.md)
- [  Stream](./docs/--stream.md)
- [ Competitors](./docs/-competitors.md)
- [00 Index](./docs/00-INDEX.md)
- [00 Index](./docs/00-index.md)
- [Bad Practices](./docs/BAD_PRACTICES.md)
- [Changelog](./docs/CHANGELOG.md)

## Filosofia

Scopo prima del codice. DRY prima dell'orgoglio. KISS prima dell'astrazione. La release automatica non sostituisce il giudizio: lo rende tracciabile.
Media <── User      (avatar, documenti utente)
Media <── Notify    (allegati email)
Media ──> CloudStorage (storage S3/CloudFront)
Media ──> Job       (conversioni video in coda)
Media ──> Activity  (audit trail operazioni file)
```

---

## Quick Start

```bash
php artisan module:enable Media
php artisan migrate

# Configurare S3 in .env (opzionale)
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=

# FFMpeg per conversioni video
sudo apt install ffmpeg
```

---

## Metriche

| Metrica | Valore |
|---------|--------|
| **Modelli** | 3 |
| **Azioni** | 17 |
| **Resource Filament** | 3 |
| **Componenti Filament** | 6 (widget, columns, actions, relation manager) |
| **DTO** | 2 (ConvertData, CloudFrontData) |
| **Servizi** | 2 (VideoStream, SubtitleService) |
| **Enum** | 1 (AttachmentTypeEnum) |
| **Artisan Commands** | 1 |
| **PHPStan Level** | 10 |

---

## Documentazione

| Guida | Link |
|-------|------|
| **Indice** | [docs/00-index.md](docs/00-index.md) |
| **Architettura** | [docs/architecture/structure.md](docs/architecture/structure.md) |
| **Configurazione** | [docs/configuration.md](docs/configuration.md) |
| **Core Functionality** | [docs/core-functionality.md](docs/core-functionality.md) |
| **Best Practices** | [docs/best-practices.md](docs/best-practices.md) |

---

**Module Type**: File & Media Management
**Architecture**: Spatie Media Library, FFMpeg conversions, S3/CloudFront, session-based uploads
**Quality**: PHPStan Level 10

*Gestione media enterprise: da upload temporaneo a streaming video, da S3 a CloudFront, con conversioni FFMpeg tracciate.*
