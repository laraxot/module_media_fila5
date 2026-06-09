## [2026-06-05] docs | HackerNoon harness — tips 001-022 in wiki locale

- Stub/checklist: second-brain → canon Xot, ai-harness, [hackernoon map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md), [llm-wiki.txt](../../../../../bashscripts/tools/prompts/llm-wiki.txt)
- GitHub: [#272](https://github.com/laraxot/base_fixcity_fila5/issues/272) / [D#273](https://github.com/laraxot/base_fixcity_fila5/discussions/273)

---
title: "Media Wiki Activity Log"
module: "Media"
---

# Media - Wiki Activity Log

## [2026-05-21] governance | owner html2pdf canonico

- Documentazione Html2Pdf completa solo in `docs/html2pdf/` (+ `README.md`).
- Altri moduli: stub DRY verso Media. Campagna: `bashscripts/tools/dedup_module_docs.py`.
- How-to: [module-docs-deduplication](../../../../../docs/wiki/how-to/module-docs-deduplication.md).

## [2026-05-11] Wiki Structure Created

- Created wiki structure: rules/, skills/, commands/, memories/, concepts/
- Created INDEX.md for each section
- Created module index.md
- Ready for on-demand loading via QMD

## [2026-05-21] Troubleshooting — class redeclaration across `_bases`

- Aggiunta [multibase-class-redeclare-runtime.md](troubleshooting/multibase-class-redeclare-runtime.md) per FatalError `Cannot redeclare class` quando nello stack compaiono due percorsi `base_*_fila5` nello stesso processo PHP.
- Aggiornato [wiki/index.md](index.md) con sezione Troubleshooting.

