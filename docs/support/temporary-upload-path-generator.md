---
title: "Temporary Upload Path Generation — Media Module"
module: "Media"
type: concept
tags: [temporary, upload, path, generator, queueable-action]
created: 2026-07-14
updated: 2026-07-20
qmd: "temporary upload path generator actions"
related:
  - "../queueable-actions.md"
  - "../wiki/concepts/no-services-no-support-queueable-actions.md"
---

# Temporary Upload Path Generation — Media Module

## Stato attuale

**Non esiste più una classe `Support\TemporaryUploadPathGenerator`.** La generazione dei
path per gli upload temporanei è stata migrata (regola "no Services / no Support", vedi
[no-services-no-support-queueable-actions.md](../wiki/concepts/no-services-no-support-queueable-actions.md))
su tre Queueable Action indipendenti in `app/Actions/TemporaryUpload/`:

- `GetTemporaryUploadPathAction` — path del file originale
- `GetTemporaryUploadConversionPathAction` — path per le conversioni
- `GetTemporaryUploadResponsivePathAction` — path per le immagini responsive

Non esiste un metodo `getBasePath()`: era descritto nella versione precedente di questo
documento ma non ha mai avuto un corrispettivo nel codice attuale.

Il contratto che descrive l'API di generazione path è
`app/Contracts/PathGeneratorContract.php` (metodi `getPath()`, `getPathForConversions()`,
`getPathForResponsiveImages()`), usato da chi implementa un path generator custom per
Spatie MediaLibrary.

## Logica di generazione

Ogni Action riceve un `Media $media`, calcola `$key = md5($media->uuid.$id)` e restituisce
un path sotto `tmp/{$key}/` con un secondo hash md5 che varia per scopo (`original`,
`conversion`, `responsive`):

```php
app(GetTemporaryUploadPathAction::class)->execute($media);
// tmp/{md5(uuid.id)}/{md5(id.uuid.'original')}/

app(GetTemporaryUploadConversionPathAction::class)->execute($media);
// tmp/{md5(uuid.id)}/{md5(id.uuid.'conversion')}

app(GetTemporaryUploadResponsivePathAction::class)->execute($media);
// tmp/{md5(uuid.id)}/{md5(id.uuid.'responsive')}
```

`Assert::string($media->getKey())` garantisce che l'id sia una stringa/castabile prima
dell'hashing (fail-fast se il modello usa una PK non compatibile).

## Sicurezza

- Path basati su hash MD5 di `uuid` + `id`: non enumerabili senza conoscere entrambi.
- Ogni Action è isolata, senza stato condiviso tra chiamate.
- Nessuna pulizia automatica dei file temporanei in queste Action: la responsabilità di
  cancellazione resta al ciclo di vita del modello `TemporaryUpload` / risorsa Filament.

## Utilizzo

```php
use Modules\Media\Actions\TemporaryUpload\GetTemporaryUploadPathAction;
use Modules\Media\Models\Media;

$media = Media::find(1);
$path = app(GetTemporaryUploadPathAction::class)->execute($media);
```

Vedi [queueable-actions.md](../queueable-actions.md) per le regole generali sulle Actions
del modulo.
