<<<<<<< HEAD
# Modulo Media — Documentazione Bridge

Documentazione canonica per il modulo Media: gestione multimediale (immagini, video, documenti, audio) in Laraxot.

## File Canonici

1. **[README.md](README.md)** — questo file, punto di ingresso
2. **[architecture.md](architecture.md)** — architettura, namespace, dipendenze, struttura, funzionalità
3. **[index.md](index.md)** — bridge per discovery (legacy)

## Scopo Modulo

- Memorizzazione, elaborazione, distribuzione file multimediali
- Supporto multi-format (immagini, video, documenti, audio)
- Integrazione CDN e streaming video
- Isolamento tenant
- Conversione automatica (FFmpeg, immagini)

## Linkage

- Dipende da: Xot (base), Tenant, User, UI
- Utilizzato da: temi e moduli applicativi
- Standard di documentazione: vedi `/docs/` root

Per dettagli architetturali, vedi **architecture.md**.
=======
---
title: documentazione modulo media
module: Media
type: index
status: approved
tags: [documentation, readme, modulo, second-brain]
updated: "2026-05-27"
related:
  - ../README.md
---

# Documentazione — modulo Media

> **Mappa knowledge base locale.** Il [README in root](../README.md) è la vetrina (valore, release, onboarding); questo file indica **dove** trovare regole, wiki e audit per chi sviluppa o per gli agenti AI.

## Scopo

Media management module for the Laraxot ecosystem: images, videos, FFmpeg, and Intervention Image.

## Dove iniziare

- [Wiki locale](./wiki/index.md)
- [Audit ridondanza](./code-redundancy-audit.md)
- [Regole architettura](./architecture-rules.md)
- [Disciplina agenti](./agent-edit-discipline.md)


## Struttura tipica

```text
Media/
├── README.md          ← vetrina (root package)
├── docs/
│   ├── README.md      ← questo indice
│   └── wiki/          ← second brain (se presente)
├── app/ o resources/
└── composer.json
```

## Namespace / confini

- Namespace: `Modules\Media`
- Non duplicare qui la filosofia marketing: resta nel README root.

## Collegamenti

- [README root (vetrina)](../README.md)
- [Xot (framework base)](../Xot/docs/)
- [Wiki progetto](../../../docs/wiki/README.md)
- [Standard README doppio](../../../../docs/wiki/standards/module-theme-readme-dual.md)

## Per agenti

1. Leggere scopo in questo file.
2. Aprire `docs/wiki/index.md` se esiste.
3. Seguire [disciplina issue GitHub](../../../docs/wiki/how-to/github-issue-agent-discipline.md) prima di modifiche sostanziali.
>>>>>>> be7d0c3 (.)
