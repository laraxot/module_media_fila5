---
title: "PHPStan: FFMpeg Export save()"
module: "Media"
type: concept
tags: [phpstan, ffmpeg, export]
created: 2026-07-14
updated: 2026-07-14
qmd: "phpstan ffmpeg export"
related:
  - "./webm.md"
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
