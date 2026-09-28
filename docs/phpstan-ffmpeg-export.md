---
title: "phpstan ffmpeg export"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "phpstan ffmpeg export"
issues: []
discussions: []
---

# PHPStan: FFMpeg Export save()

## Contesto

L'action `ConvertVideoByConvertDataAction` usa `ProtoneMedia\LaravelFFMpeg`. Il metodo `save()` sulla catena Export non è riconosciuto da PHPStan.

## Soluzione

Aggiunto `@phpstan-ignore-next-line method.notFound` sulla chiamata a `->save()`:

```php
->addFilter('-preset', 'ultrafast')
// @phpstan-ignore-next-line method.notFound (pbmedia/laravel-ffmpeg Export API)
->save($file_new, $formatInstance);
```

## Motivazione

L'API di pbmedia/laravel-ffmpeg espone `save()` sul builder Export ma PHPStan non la rileva. L'ignore è circoscritto e documentato.
