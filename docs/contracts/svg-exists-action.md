---
title: "Contratto — SvgExistsAction"
type: contract
action: "Modules\Media\Actions\Image\SvgExistsAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "SvgExistsAction verifica icona SVG BladeUI Icons registro set GetAllIconsAction"
---

# SvgExistsAction

Dice se un nome di icona è registrato in uno dei set BladeUI Icons. Codice: `app/Actions/Image/SvgExistsAction.php:11-55`.

## Input

- `string $svgName`: nome completo, es. `heroicon-o-user`.

## Output

- `bool`: `true` se il nome è nella lista di almeno un set.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SVG-EXISTS-INV-1 | Stringa vuota (`empty()`) restituisce `false` senza interrogare il registro. Attenzione: `empty('0')` è vero, quindi anche `'0'` restituisce `false`. | — (non dimostrato) |
| SVG-EXISTS-INV-2 | Il confronto è esatto e case-sensitive sul nome. | — (non dimostrato) |
| SVG-EXISTS-INV-3 | La struttura dei set (array con chiave `icons` iterabile) è verificata con `Assert`; una struttura diversa lancia eccezione. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `Webmozart\Assert` lancia se `GetAllIconsAction` restituisce una struttura non valida.

## Non fa

- Non controlla che il file SVG esista sul disco: legge solo il registro dei nomi.
- Dipende da `Modules\UI\Actions\Icon\GetAllIconsAction` (modulo UI).
- Non ha chiamanti in `Media` o altri moduli (verificato con grep: l'omonimo in `Xot` è un'altra classe).

## Prove

- `SVG-EXISTS-INV-1`: nessuno.
- `SVG-EXISTS-INV-2`: nessuno.
- `SVG-EXISTS-INV-3`: nessuno.
