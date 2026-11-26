---
title: "Contratti del modulo Media"
type: index
tags: [contracts, actions, interfaces, media]
module: Media
status: active
created: 2026-11-18
updated: 2026-11-26
qmd: "media contracts readme azioni invarianti pest group upload percorsi s3 diagnostica"
---

# Contratti del modulo Media

Cosa promettono le Action di `app/Actions` e le interfacce di `app/Contracts`. Ogni Action ha il suo contratto e porta nel
docblock il marker `@contract docs/contracts/<file>.md`: il controllo e' in
`Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php`. Tabella operativa con la copertura Pest: [index.md](index.md).

Leggili prima di chiamare o imitare il salvataggio degli allegati, il trattamento delle foto, la conversione dei video, i
percorsi degli upload temporanei o le diagnostiche AWS/S3: «Non fa» dice cosa l'Action lascia ad altri (validazione,
conversioni, transazioni) e «Limite noto» dice dove il codice di oggi non fa quello che ci si aspetta.

## Formato

Un file per Action, nome in kebab-case della classe (`strip-image-metadata-action.md`), frontmatter `type: contract` e
`action: <FQCN>`, queste sei sezioni nell'ordine `Input`, `Output`, `Invarianti`, `Effetti collaterali`, `Errori`, `Non fa`, e una
sezione finale `Prove` che dice quale test dimostra quale invariante (o perche' nessuno).

- Ogni invariante ha un ID stabile `<OPERAZIONE>-INV-<N>` (non si rinumera; un'invariante nuova prende il numero successivo).
  La colonna «Group Pest» contiene l'ID solo se un test lo ha come `->group('<ID>')`, altrimenti «— (non dimostrato)».
- Gli ID `RESOLVE-*` di `get-aws-s3-error-solution-action` e `get-media-exporter-action` restano quelli di prima del rename in `Get*`
  ([ADR Xot 0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md)).
- Contratto, codice e test cambiano nello stesso commit.
- Regola canonica: [action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md); standard:
  [contract-authoring-standard](../../../Xot/docs/contracts/contract-authoring-standard.md); governance:
  [ADR 0012](../../../Xot/docs/adr/0012-behavioral-contract-governance.md); scheletro:
  [behavioral-contract-template](../../../Xot/docs/contracts/behavioral-contract-template.md).

Lanciare le invarianti provate, da `laravel/`: `vendor/bin/pest Modules/Media/tests --group=<ID>` (per le altre darebbe zero test).
Pest scrive sul DB: usare il runner `bashscripts/tools/pest-scratch-db.sh`.

## Contratti

### Allegati, upload e percorsi

- [attach-media-action](attach-media-action.md) — Classe vuota che usa solo il trait `QueueableAction`. Invarianti provate: 0/1.
- [generate-temporary-upload-path-action](generate-temporary-upload-path-action.md) — Genera il percorso di storage sotto `tmp/` per originale, conversioni e immagini responsive di un `Media`. Invarianti provate: 3/4.
- [get-attachments-schema-action](get-attachments-schema-action.md) — Costruisce un `FileUpload` Filament per ogni nome di allegato, con i limiti letti da `MediaConfigData`. Invarianti provate: 2/4.
- [get-effective-upload-limit-action](get-effective-upload-limit-action.md) — Calcola il numero massimo di byte che un upload temporaneo Livewire può davvero portare nella richiesta web. Invarianti provate: 3/4.
- [get-temporary-upload-conversion-path-action](get-temporary-upload-conversion-path-action.md) — Calcola il percorso `tmp/` delle conversioni di un upload temporaneo. Invarianti provate: 0/2.
- [get-temporary-upload-path-action](get-temporary-upload-path-action.md) — Calcola il percorso `tmp/` dell'upload originale di un media. Invarianti provate: 0/2.
- [get-temporary-upload-responsive-path-action](get-temporary-upload-responsive-path-action.md) — Calcola il percorso `tmp/` delle immagini responsive di un upload temporaneo. Invarianti provate: 0/2.
- [save-attachments-action](save-attachments-action.md) — Importa in media library gli allegati caricati su un disco temporaneo e salva sul record il percorso relativo di ciascun media. Invarianti provate: 2/5.

### Immagini, video e sottotitoli

- [convert-srt-to-vtt-action](convert-srt-to-vtt-action.md) — Converte un file SRT in WebVTT: aggiunge l'intestazione `WEBVTT` e cambia la virgola in punto nei timestamp. Invarianti provate: 2/2.
- [convert-video-action](convert-video-action.md) — Converte un video su un disco in X264 a 1000 kbps e restituisce l'URL del file prodotto. Invarianti provate: 0/2.
- [convert-video-by-convert-data-action](convert-video-by-convert-data-action.md) — Converte un video secondo un `ConvertData` e restituisce il nome del file prodotto. Invarianti provate: 1/3.
- [convert-video-by-media-convert-action](convert-video-by-media-convert-action.md) — Converte un video secondo `ConvertData`, aggiorna il record `MediaConvert` con il progresso e ne registra la fine con `percentage = 100`. Invarianti provate: 2/4.
- [extract-subtitle-plain-text-action](extract-subtitle-plain-text-action.md) — Estrae il testo di un file di sottotitoli XML concatenando gli `item` di ogni `sentence`. Invarianti provate: 1/2.
- [get-media-exporter-action](get-media-exporter-action.md) — Verifica che il valore prodotto da una catena fluent FFmpeg sia un `MediaExporter` e lo restituisce invariato. Invarianti provate: 2/2.
- [get-video-duration-action](get-video-duration-action.md) — Restituisce la durata in secondi di un video sul disco. Invarianti provate: 0/1.
- [get-video-frame-content-action](get-video-frame-content-action.md) — Restituisce il contenuto binario del fotogramma a un dato secondo, in cache per un'ora. Invarianti provate: 0/2.
- [get-video-screenshot-action](get-video-screenshot-action.md) — Classe senza logica: dichiara solo la proprietà `$backoff = 3` e usa il trait `QueueableAction`. Invarianti provate: 0/1.
- [merge](merge.md) — Unisce più immagini in verticale in un unico file PNG. Espone due punti di ingresso: `handle()` con percorsi assoluti e `execute()` con percorsi relativi a `public_path()`. Invarianti provate: 0/3.
- [parse-subtitle-xml-action](parse-subtitle-xml-action.md) — Legge un file di sottotitoli XML e produce una riga per ogni `item`, con inizio, fine, intervallo `HH:MM:SS,mmm` e testo. Invarianti provate: 3/3.
- [stream-video-action](stream-video-action.md) — Invia un file video dal disco al client con supporto all'header `Range`. Invarianti provate: 0/4.
- [strip-image-metadata-action](strip-image-metadata-action.md) — Riscrive l'originale JPEG o PNG di un media senza metadati (EXIF, posizione GPS, fotocamera, XMP, chunk di testo). Invarianti provate: 5/5.
- [svg-exists-action](svg-exists-action.md) — Dice se un nome di icona è registrato in uno dei set BladeUI Icons. Invarianti provate: 0/3.
- [update-model-subtitle-field-action](update-model-subtitle-field-action.md) — Estrae il testo di un sottotitolo e lo salva in un campo del modello. Invarianti provate: 1/1.

### Storage S3 e CloudFront

- [base-s3-action](base-s3-action.md) — Classe astratta base delle Action S3: costruisce il client S3 e risolve bucket, region e credenziali. Invarianti provate: 0/2.
- [check-file-exists-action](check-file-exists-action.md) — Dice se una chiave esiste nel bucket con `headObject`. Invarianti provate: 0/2.
- [delete-file-action](delete-file-action.md) — Cancella un oggetto dal bucket e restituisce un array di esito. Invarianti provate: 0/2.
- [get-cloud-front-signed-url-action](get-cloud-front-signed-url-action.md) — Genera un URL CloudFront firmato per una chiave S3. Invarianti provate: 0/2.
- [get-file-info-action](get-file-info-action.md) — Legge i metadati di un oggetto con `headObject`, senza scaricarlo. Invarianti provate: 0/2.
- [get-filesystem-adapter-action](get-filesystem-adapter-action.md) — Restituisce un disco come `FilesystemAdapter`, il tipo che espone `mimeType()`, `url()` e `temporaryUrl()`. Invarianti provate: 0/1.
- [upload-file-action](upload-file-action.md) — Carica un file locale su S3 con `ObjectUploader` (multipart automatico per i file grandi). Invarianti provate: 0/3.

### Diagnostica AWS e S3

- [build-config-debug-data-action](build-config-debug-data-action.md) — Compone il blocco «Configurazione» della diagnostica S3, mostrando i valori senza esporre i segreti. Invarianti provate: 0/2.
- [check-bucket-policy-action](check-bucket-policy-action.md) — Legge la policy del bucket e la mostra formattata. Invarianti provate: 0/2.
- [create-filesystem-s3-client-action](create-filesystem-s3-client-action.md) — Costruisce il client S3 e legge il nome del bucket dalla configurazione del disco `s3`. Invarianti provate: 0/2.
- [create-filesystem-sts-client-action](create-filesystem-sts-client-action.md) — Costruisce il client STS con le stesse credenziali e region del disco `s3`. Invarianti provate: 0/1.
- [format-debug-output-action](format-debug-output-action.md) — Trasforma i blocchi di diagnostica in testo leggibile. Invarianti provate: 2/3.
- [get-aws-config-snapshot-action](get-aws-config-snapshot-action.md) — Restituisce uno snapshot delle variabili AWS e CloudFront, con la chiave di accesso troncata. Invarianti provate: 0/2.
- [get-aws-s3-error-solution-action](get-aws-s3-error-solution-action.md) — Traduce un codice di errore AWS S3 in un suggerimento testuale. Invarianti provate: 2/2.
- [run-full-aws-diagnostic-action](run-full-aws-diagnostic-action.md) — Esegue in sequenza sette diagnostiche AWS e raccoglie i risultati per chiave. Invarianti provate: 0/1.
- [run-s3-save-test-action](run-s3-save-test-action.md) — Salva un file di prova sul disco `s3`, genera URL CloudFront e temporanei, poi cancella il file di prova. Invarianti provate: 0/2.
- [test-bucket-permissions-action](test-bucket-permissions-action.md) — Prova in sequenza i permessi del bucket: list, put, get, delete di un oggetto di prova. Invarianti provate: 0/2.
- [test-cloud-front-config-action](test-cloud-front-config-action.md) — Mostra i valori CloudFront letti dalla config, senza verificarli. Invarianti provate: 0/2.
- [test-cloud-front-connection-action](test-cloud-front-connection-action.md) — Controlla che la config CloudFront sia completa e genera un URL firmato di prova. Invarianti provate: 0/2.
- [test-cloud-front-signed-urls-action](test-cloud-front-signed-urls-action.md) — Controlla che siano presenti URL base, key pair e chiave privata CloudFront. Invarianti provate: 0/2.
- [test-connection-details-action](test-connection-details-action.md) — Verifica il bucket con `headBucket`, legge la sua region con `getBucketLocation` e la confronta con la config. Invarianti provate: 0/2.
- [test-credentials-action](test-credentials-action.md) — Verifica le credenziali con STS `GetCallerIdentity` e restituisce account e ARN. Invarianti provate: 0/2.
- [test-file-upload-download-action](test-file-upload-download-action.md) — Prova upload, download, confronto del contenuto, esistenza e dimensione di un file su S3. Invarianti provate: 0/2.
- [test-iam-credentials-action](test-iam-credentials-action.md) — Verifica le credenziali chiamando STS `GetCallerIdentity`. Invarianti provate: 0/2.
- [test-iam-policies-action](test-iam-policies-action.md) — Verifica indirettamente le policy IAM provando `headBucket` e `listObjectsV2` sul bucket. Invarianti provate: 0/1.
- [test-s3-connection-action](test-s3-connection-action.md) — Verifica la raggiungibilità del bucket con `headBucket`. Invarianti provate: 0/2.
- [test-s3-file-operations-action](test-s3-file-operations-action.md) — Prova su S3 un ciclo completo: scrittura di un file di test, lettura, cancellazione. Invarianti provate: 0/2.
- [test-s3-permissions-action](test-s3-permissions-action.md) — Verifica il permesso di listare il bucket con `listObjectsV2` (`MaxKeys=1`). Invarianti provate: 0/1.

### Interfacce

- [path-generator](path-generator.md) — Interfacce in `app/Contracts/PathGenerator.php` e `app/Contracts/PathGeneratorContract.php`: tre metodi che restituiscono la cartella di un `Modules\Media\Models\Media`. Invarianti provate: 0/2.

## Stato di copertura

- 52 contratti: 51 Action e 1 per le interfacce di `app/Contracts`; ogni Action di `app/Actions` ha il marker `@contract` tranne i due doppioni `Resolve*` (vedi sotto).
- Invarianti: **31 provate su 117** (26%): per ciascuna esiste un `->group('<ID>')` in un test che la verifica per lettura.
  Le 86 restanti sono dichiarate «— (non dimostrato)».
- I test sono stati abbinati leggendoli, non eseguendoli (Pest non e' stato lanciato nella passata che li ha annotati).
  Prima di fidarsi di un gruppo: `vendor/bin/pest Modules/Media/tests --group=<ID>`.
- I contratti delle 51 Action erano stati cancellati dal working tree dalla sync dell'altra macchina (commit `9a3f852f`,
  «tetto 100 md»); sono stati riscritti dalla versione di `0b4d7d39`, riletti uno a uno contro il codice di oggi e portati al
  formato corrente. Il testo storico compresso resta in [../digests/overflow-history.md](../digests/overflow-history.md) (fonte da verificare, non verita').

## Backlog contract

- Nessuna Action di `app/Actions` e' senza contratto, tranne due file doppioni da eliminare (non sono contratti da scrivere):
  `app/Actions/Ffmpeg/ResolveMediaExporterAction.php` e `app/Actions/Diagnostic/Aws/ResolveAwsS3ErrorSolutionAction.php`, senza chiamanti e
  copie delle classi `Get*` (vietato `Resolve*Action` da [ADR Xot 0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md)).
- Le due interfacce di `app/Contracts` hanno il contratto [path-generator](path-generator.md); la proposta e' eliminarle (nessun uso).

## Backlog test

Nessun test nuovo e' stato scritto: ogni riga e' un'invariante da dimostrare con un test Pest che porti `->group('<ID>')`.
«Nessun test» (67 invarianti) = nessun test tocca la regola; «debole o difettoso» (19) = un test tocca la classe ma non la regola, o la prova solo in parte, o e' scritto in modo da passare comunque (dettaglio nella sezione `Prove` del contratto). Gli ID sono `<SCOPE>-INV-<N>`: lo scope e' nel contratto.

| Contratto | Nessun test | Test debole o difettoso (vedi `Prove`) |
|---|---|---|
| [attach-media-action](attach-media-action.md) | `INV-1` | — |
| [base-s3-action](base-s3-action.md) | `INV-2` | `INV-1` |
| [build-config-debug-data-action](build-config-debug-data-action.md) | `INV-1`, `INV-2` | — |
| [check-bucket-policy-action](check-bucket-policy-action.md) | `INV-1`, `INV-2` | — |
| [check-file-exists-action](check-file-exists-action.md) | `INV-2` | `INV-1` |
| [convert-video-action](convert-video-action.md) | `INV-2` | `INV-1` |
| [convert-video-by-convert-data-action](convert-video-by-convert-data-action.md) | `INV-1`, `INV-2` | — |
| [convert-video-by-media-convert-action](convert-video-by-media-convert-action.md) | `INV-1`, `INV-3` | — |
| [create-filesystem-s3-client-action](create-filesystem-s3-client-action.md) | `INV-2` | `INV-1` |
| [create-filesystem-sts-client-action](create-filesystem-sts-client-action.md) | — | `INV-1` |
| [delete-file-action](delete-file-action.md) | `INV-2` | `INV-1` |
| [extract-subtitle-plain-text-action](extract-subtitle-plain-text-action.md) | `INV-1` | — |
| [format-debug-output-action](format-debug-output-action.md) | `INV-3` | — |
| [generate-temporary-upload-path-action](generate-temporary-upload-path-action.md) | — | `INV-1` |
| [get-attachments-schema-action](get-attachments-schema-action.md) | `INV-3` | `INV-4` |
| [get-aws-config-snapshot-action](get-aws-config-snapshot-action.md) | `INV-1`, `INV-2` | — |
| [get-cloud-front-signed-url-action](get-cloud-front-signed-url-action.md) | `INV-1`, `INV-2` | — |
| [get-effective-upload-limit-action](get-effective-upload-limit-action.md) | — | `INV-2` |
| [get-file-info-action](get-file-info-action.md) | `INV-1` | `INV-2` |
| [get-filesystem-adapter-action](get-filesystem-adapter-action.md) | `INV-1` | — |
| [get-temporary-upload-conversion-path-action](get-temporary-upload-conversion-path-action.md) | `INV-1`, `INV-2` | — |
| [get-temporary-upload-path-action](get-temporary-upload-path-action.md) | `INV-1`, `INV-2` | — |
| [get-temporary-upload-responsive-path-action](get-temporary-upload-responsive-path-action.md) | `INV-1`, `INV-2` | — |
| [get-video-duration-action](get-video-duration-action.md) | `INV-1` | — |
| [get-video-frame-content-action](get-video-frame-content-action.md) | `INV-2` | `INV-1` |
| [get-video-screenshot-action](get-video-screenshot-action.md) | — | `INV-1` |
| [merge](merge.md) | `INV-1`, `INV-2`, `INV-3` | — |
| [path-generator](path-generator.md) | — | `INV-1`, `INV-2` |
| [run-full-aws-diagnostic-action](run-full-aws-diagnostic-action.md) | `INV-1` | — |
| [run-s3-save-test-action](run-s3-save-test-action.md) | `INV-1`, `INV-2` | — |
| [save-attachments-action](save-attachments-action.md) | `INV-3` | `INV-1`, `INV-2` |
| [stream-video-action](stream-video-action.md) | `INV-2`, `INV-4` | `INV-1`, `INV-3` |
| [svg-exists-action](svg-exists-action.md) | `INV-1`, `INV-2`, `INV-3` | — |
| [test-bucket-permissions-action](test-bucket-permissions-action.md) | `INV-1`, `INV-2` | — |
| [test-cloud-front-config-action](test-cloud-front-config-action.md) | `INV-1`, `INV-2` | — |
| [test-cloud-front-connection-action](test-cloud-front-connection-action.md) | `INV-1`, `INV-2` | — |
| [test-cloud-front-signed-urls-action](test-cloud-front-signed-urls-action.md) | `INV-1`, `INV-2` | — |
| [test-connection-details-action](test-connection-details-action.md) | `INV-1`, `INV-2` | — |
| [test-credentials-action](test-credentials-action.md) | `INV-1`, `INV-2` | — |
| [test-file-upload-download-action](test-file-upload-download-action.md) | `INV-1`, `INV-2` | — |
| [test-iam-credentials-action](test-iam-credentials-action.md) | `INV-1`, `INV-2` | — |
| [test-iam-policies-action](test-iam-policies-action.md) | `INV-1` | — |
| [test-s3-connection-action](test-s3-connection-action.md) | `INV-1`, `INV-2` | — |
| [test-s3-file-operations-action](test-s3-file-operations-action.md) | `INV-1`, `INV-2` | — |
| [test-s3-permissions-action](test-s3-permissions-action.md) | `INV-1` | — |
| [upload-file-action](upload-file-action.md) | `INV-2`, `INV-3` | `INV-1` |

Difetti di test visti: `tests/Unit/Actions/GetAttachmentsSchemaActionTest.php` («has correct max size») asserisce byte contro un valore in KB;
`tests/Unit/MediaCoverage100RemainingTest.php` avvolge molte chiamate in `try/catch (\Throwable)` e passa anche se l'Action lancia.

## Da ripulire (richiede una decisione umana)

- `INDEX.md`, `index.md` e questo README descrivono lo stesso elenco: proposta, tenere solo il README.
- `path-generator-1.md.old`: copia con suffisso numerico di `path-generator.md`; proposta, eliminarla.
