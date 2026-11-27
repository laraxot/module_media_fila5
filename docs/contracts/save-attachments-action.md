---
title: "Contratto — SaveAttachmentsAction"
type: contract
action: "Modules\Media\Actions\SaveAttachmentsAction"
<<<<<<< .merge_file_CTvmlD
tags: [contract, action, media, allegati]
created: 2026-11-24
updated: 2026-11-24
=======
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "SaveAttachmentsAction salva allegati media library addMedia record update percorso relativo disco"
>>>>>>> .merge_file_2Yd5k2
---

# SaveAttachmentsAction

<<<<<<< .merge_file_CTvmlD
Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SaveAttachmentsAction.php`.

## Input

- `$record`: un modello `HasMedia` (deve avere anche `update()`, cioe' essere un Eloquent Model).
- `$attachments`: nomi dei campi allegato (sono anche i nomi delle collezioni media).
- `$data`: dati del form, `campo => percorso` del file gia' caricato su `$disk`.
- `$disk`: disco di origine e di destinazione (default `attachments`).
=======
Importa in media library gli allegati caricati su un disco temporaneo e salva sul record il percorso relativo di ciascun media.
Codice: `app/Actions/SaveAttachmentsAction.php:16-78`. Il dato di ingresso tipizzato `Datas/SaveAttachmentsData.php` descrive la stessa
forma, ma l'Action prende ancora gli array paralleli.

Chiamanti in `app/`: nessuno (`rg SaveAttachmentsAction` fuori da `Modules/Media/app/Actions` e dai test non trova riscontri).

## Input

- `HasMedia $record`: un modello Eloquent con media (deve avere anche `update()`; il doppio di test e' `tests/Fixtures/MediaRecordDouble.php`).
- `array<int, string> $attachments`: nomi dei campi allegato; sono anche i nomi delle collezioni media.
- `array<string, mixed> $data`: dati del form, `campo => percorso` del file gia' caricato su `$disk`.
- `string $disk = 'attachments'`: disco di origine e di destinazione.
>>>>>>> .merge_file_2Yd5k2

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_CTvmlD
| MEDIA-ATTACH-INV-1 | Un campo assente da `$data`, vuoto o il cui file non esiste sul disco e' saltato senza errori. | — |
| MEDIA-ATTACH-INV-2 | Il record si aggiorna una sola volta, alla fine, e solo se almeno un allegato e' stato salvato: valore del campo = percorso del media. | — |
| MEDIA-ATTACH-INV-3 | Il file temporaneo in `storage/framework/cache` viene cancellato anche se l'aggiunta del media fallisce (`finally`). | — |
| MEDIA-ATTACH-INV-4 | Il file di origine su `$disk` non viene cancellato. | — |

## Effetti collaterali

- Copia ogni file in un temporaneo e lo aggiunge alla collezione omonima del record (`addMedia()->toMediaCollection($campo, $disk)`):
  riga in `media` e file sul disco.
- `UPDATE` del record con i percorsi dei media.

## Errori

- `UnexpectedValueException` se il valore di un campo non e' una stringa o il file non si legge come stringa.
- Le eccezioni di Media Library (`addMedia`, collezione) risalgono al chiamante: gli allegati gia' aggiunti restano.
=======
| MEDIA-ATTACH-INV-1 | Un campo assente da `$data`, vuoto o il cui file non esiste sul disco e' saltato senza errori. | — (non dimostrato) |
| MEDIA-ATTACH-INV-2 | Il record si aggiorna una sola volta, alla fine, e solo se almeno un allegato e' stato salvato: valore del campo = percorso del media. | — (non dimostrato) |
| MEDIA-ATTACH-INV-3 | Il file temporaneo in `storage/framework/cache` viene cancellato anche se l'aggiunta del media fallisce (`finally`). | — (non dimostrato) |
| MEDIA-ATTACH-INV-4 | Il file di origine su `$disk` non viene cancellato. | `MEDIA-ATTACH-INV-4` |
| MEDIA-ATTACH-INV-5 | Un errore di `addMedia` risale al chiamante senza essere inghiottito. | `MEDIA-ATTACH-INV-5` |

## Effetti collaterali

Per ogni campo presente e con file esistente, nell'ordine:

1. Legge il file dal disco e lo scrive in un temporaneo (`tempnam` in `storage/framework/cache`).
2. `addMedia($tempPath)->usingFileName(basename($path))->toMediaCollection($campo, $disk)`: riga in `media` e file sul disco.
3. Cancella il temporaneo (`finally`).

Alla fine, se almeno un allegato e' stato salvato: un solo `UPDATE` del record con i percorsi dei media.

## Errori

- `UnexpectedValueException` — il valore di un campo presente in `$data` non e' una stringa (anche `null`, `SaveAttachmentsAction.php:44-46`), o il file non si legge come stringa (`:53-55`).
- Le eccezioni di Media Library (`addMedia`, collezione) risalgono al chiamante: gli allegati gia' aggiunti restano (INV-5).
>>>>>>> .merge_file_2Yd5k2

## Non fa

- Non valida mime ne' dimensione (lo fanno il campo Filament e la configurazione di Media).
<<<<<<< .merge_file_CTvmlD
- Non toglie metadati Exif (vedi `StripImageMetadataAction`).
- Non e' transazionale: niente rollback dei media gia' aggiunti se un allegato successivo fallisce.

Debito: `tests/Unit/Actions/SaveAttachmentsActionTest.php` oggi fallisce in 6 casi su 7 (mock di `update()` su
un'interfaccia `HasMedia` che non lo dichiara): nessuna invariante e' coperta finche' il test non usa un modello vero.
=======
- Non toglie metadati Exif (vedi [StripImageMetadataAction](strip-image-metadata-action.md)).
- Non e' transazionale: niente rollback dei media gia' aggiunti se un allegato successivo fallisce.
- Limite noto: il disco `attachments` (default del parametro) non e' definito in `config/filesystems.php` ne' in `config/local/fixcity/filesystems.php`
  (nessuna riga `attachments`, `rg -n attachments`): finche' il tenant non lo configura, `Storage::disk('attachments')` lancia `InvalidArgumentException`.

## Prove

- `MEDIA-ATTACH-INV-1`: parziale, `tests/Unit/Actions/SaveAttachmentsActionTest.php` («skips nonexistent files») copre solo il file inesistente; non coprono campo assente ne' valore vuoto.
- `MEDIA-ATTACH-INV-2`: parziale, «handles empty attachments» e «skips nonexistent files» provano che senza allegati salvati `update` non e' chiamato; nessun test conta le chiamate a `update` nel caso positivo.
- `MEDIA-ATTACH-INV-3`: nessun test; «cleans up temp files» controlla solo che il file di origine esista ancora.
- `MEDIA-ATTACH-INV-4`: stesso file: «executes save attachments successfully», «handles multiple attachments» (verificano che i file di origine esistano ancora).
- `MEDIA-ATTACH-INV-5`: stesso file: «handles storage errors gracefully» (`toThrow(Exception::class, 'Storage error')`).
- Il vecchio debito (6 test su 7 rossi per il mock di `update()` su `HasMedia`) e' superato: i test usano `MediaRecordDouble`. Non rieseguiti in questa passata (Pest vietato).
>>>>>>> .merge_file_2Yd5k2
