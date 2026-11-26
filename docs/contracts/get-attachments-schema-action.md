---
title: "Contratto — GetAttachmentsSchemaAction"
type: contract
action: "Modules\Media\Actions\GetAttachmentsSchemaAction"
module: Media
status: accepted
created: 2026-11-24
updated: 2026-11-26
qmd: "GetAttachmentsSchemaAction schema form FileUpload allegati mime size MediaConfigData Filament"
---

# GetAttachmentsSchemaAction

Costruisce un `FileUpload` Filament per ogni nome di allegato, con i limiti letti da `MediaConfigData`. Codice: `app/Actions/GetAttachmentsSchemaAction.php:14-69`.

Chiamante: `Modules/Xot/app/Filament/Resources/XotBaseResource.php:439`, che passa sempre il disco `attachments`.

## Input

- `array<array-key, string> $attachments`: nomi dei campi (uno per allegato).
- `string $disk = 'attachments'`: disco di destinazione.

## Output

- `list<FileUpload>`: un componente per allegato, nello stesso ordine.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-ATTACHMENTS-SCHEMA-INV-1 | Ogni componente e' obbligatorio, singolo (`multiple(false)`), non riordinabile, con anteprima e download, e accetta almeno uno dei tipi MIME di `MediaConfigData`. | `GET-ATTACHMENTS-SCHEMA-INV-1` |
| GET-ATTACHMENTS-SCHEMA-INV-2 | Il percorso di upload e' `temp`, la visibilita' `public`, il disco `attachments` se non indicato. | `GET-ATTACHMENTS-SCHEMA-INV-2` |
| GET-ATTACHMENTS-SCHEMA-INV-3 | Nella callback `afterStateUpdated` uno stato vuoto non viene toccato; uno stato valorizzato viene normalizzato in lista e riscritto nel campo con `Set`. | — (non dimostrato) |
| GET-ATTACHMENTS-SCHEMA-INV-4 | La dimensione massima e' `attachment_max_size_kb` di `MediaConfigData` (default 10240 KB), passata a `maxSize()` in KB. | — (non dimostrato) |

## Effetti collaterali

- Nessuno sul database. La callback scrive lo stato del form Filament, non il record.

## Errori

- `Assert::string` nella callback: lancia se il nome dell'allegato non è stringa (in pratica non accade con l'input tipizzato).

## Non fa

- Non salva né valida i file oltre le regole di `FileUpload`.
- Pur con `multiple(false)`, la callback memorizza lo stato come array.
- Limite noto: il disco `attachments` (default del parametro e valore fisso di `XotBaseResource`) non e' definito in `config/filesystems.php` ne' in `config/local/fixcity/filesystems.php` (nessuna riga `attachments`, `rg -n attachments`): finche' il tenant non lo configura, `Storage::disk('attachments')` lancia `InvalidArgumentException`.

## Prove

- `GET-ATTACHMENTS-SCHEMA-INV-1`: `tests/Unit/Actions/GetAttachmentsSchemaActionTest.php`: «has correct validation» (obbligatorio e almeno un tipo MIME atteso tra quelli accettati), «has correct multiple setting», «has correct preview setting», «has correct download setting», «has correct reorder setting».
- `GET-ATTACHMENTS-SCHEMA-INV-2`: stesso file: «has correct storage», «has correct directory», «has correct visibility».
- `GET-ATTACHMENTS-SCHEMA-INV-3`: nessun test sulla callback `afterStateUpdated`.
- `GET-ATTACHMENTS-SCHEMA-INV-4`: nessun test valido: «has correct max size» (`tests/Unit/Actions/GetAttachmentsSchemaActionTest.php`) asserisce `10 * 1024 * 1024`, ma l'Action passa 10240 e `BaseFileUpload::getMaxSize()` restituisce il valore memorizzato senza conversione (`vendor/filament/forms/src/Components/BaseFileUpload.php:636-639`): per lettura il test non puo' passare. Non eseguito (Pest vietato); correzione del test fuori da questa passata.
