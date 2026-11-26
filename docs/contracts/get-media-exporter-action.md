---
title: "Contratto — GetMediaExporterAction"
type: contract
action: "Modules\Media\Actions\Ffmpeg\GetMediaExporterAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "ResolveMediaExporterAction FFmpeg MediaExporter normalizza catena fluent eccezione RuntimeException"
---

# GetMediaExporterAction

Verifica che il valore prodotto da una catena fluent FFmpeg sia un `MediaExporter` e lo restituisce invariato. Codice: `app/Actions/Ffmpeg/GetMediaExporterAction.php:11-35`.

Era `ResolveMediaExporterAction`: rinominata in `Get*` dall'[ADR Xot 0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md); gli ID `RESOLVE-*` restano invariati (ID stabili). Il vecchio file `Ffmpeg/ResolveMediaExporterAction.php` e' un doppione senza chiamanti, da eliminare.

## Input

- `mixed $value`: risultato della catena fluent.

## Output

- `MediaExporter`: lo stesso oggetto ricevuto.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| RESOLVE-MEDIA-EXPORTER-INV-1 | Un `MediaExporter` è restituito senza modifiche (stessa istanza). | `RESOLVE-MEDIA-EXPORTER-INV-1` |
| RESOLVE-MEDIA-EXPORTER-INV-2 | Ogni altro valore lancia `RuntimeException` con il tipo ricevuto nel messaggio. | `RESOLVE-MEDIA-EXPORTER-INV-2` |

## Effetti collaterali

- Nessuno.

## Errori

- `RuntimeException`: «La catena FFmpeg deve restituire un MediaExporter; ricevuto: <tipo>.»

## Non fa

- Non esegue FFmpeg né converte il valore.

## Prove

- `RESOLVE-MEDIA-EXPORTER-INV-1`: `tests/Unit/Support/Ffmpeg/MediaExporterResolverTest.php` («returns the value unchanged when it is already a MediaExporter», `assertSame`).
- `RESOLVE-MEDIA-EXPORTER-INV-2`: stesso file: «rejects a value that is not a MediaExporter», «names the received type in the error message» (oggetto e scalare), «rejects null».
