# Media Module — Mappa Graphify

**Versione:** 1.0.0 | **Modulo:** Media | **Data:** 2026-08-02

---

## 📌 Cosa fa il modulo Media

Il modulo **Media** gestisce:
- Upload file, gestione metadati, storage S3/MinIO e conversione media/video

---

## 🏗️ Architettura Essenziale

### Entry Points

| Tipo | Classe | Path |
|------|--------|------|
| **Model** | `Media` | `app/Models/Media.php` |
| **Model** | `TemporaryUpload` | `app/Models/TemporaryUpload.php` |
| **Model** | `MediaConvert` | `app/Models/MediaConvert.php` |
| **Action** | `AttachMediaAction` | `app/Actions/AttachMediaAction.php` |
| **Action** | `GenerateTemporaryUploadPathAction` | `app/Actions/GenerateTemporaryUploadPathAction.php` |
| **Action** | `SaveAttachmentsAction` | `app/Actions/SaveAttachmentsAction.php` |
| **Action** | `GetAttachmentsSchemaAction` | `app/Actions/GetAttachmentsSchemaAction.php` |
| **Service** | `VideoStream` | `app/Services/VideoStream.php` |
| **Service** | `SubtitleService` | `app/Services/SubtitleService.php` |
| **Filament** | `MediaResource` | `app/Filament/MediaResource.php` |
| **Filament** | `IconMediaColumn` | `app/Filament/IconMediaColumn.php` |
| **Filament** | `VideoEntry` | `app/Filament/VideoEntry.php` |

### Dependencies (Incoming)

```
Activity → Media (allegati)
Indennita → Media (file PDF stampati)
```

### Dependencies (Outgoing)

```
Media → S3 (cloud storage)
Media → FFmpeg (conversione)
```

---

## 📊 Grafo Locale (Query Rapide)

### Scoprire Entità Core

```bash
graphify query "Media module models and actions"
```

### Tracciare Flussi

```bash
graphify path --from "Media" --to "AttachMediaAction"
```

### Trovare Dipendenze

```bash
graphify query "Media dependencies"
```

---

## 🎯 Task Comuni + Graphify

### Task 1: Estendere o Modificare Architettura Media

**Domanda Graphify:**
```bash
graphify query "Media module architecture and entry points"
```

**Workflow:**
1. Ispeziona classi in `app/Models` o `app/Actions`
2. Esegui query `graphify query "Media dependencies"` per verificare impatto
3. Esegui test del modulo

---

## 📋 Test Coverage Map

```bash
graphify query "Media module test coverage"
```

---

## 🚀 Comandi Rapidi

```bash
# Esplora architettura
graphify query "Media module architecture"

# Test coverage
graphify query "Media test coverage"

# Complexity
graphify query "Media high complexity"
```

---

## 📚 Riferimenti

- **Graphify Central:** `docs/graphify-integration.md`
- **Module Discipline:** `docs/wiki/rules/module-naming-discipline.md`

---

**Responsabile:** @marco76tv | **Last updated:** 2026-08-02
