<<<<<<< HEAD
---
<<<<<<< HEAD
<<<<<<< HEAD
title: "Stream 1"
module: "Media"
type: concept
tags: [stream, 1]
created: 2026-07-14
updated: 2026-07-14
qmd: "stream 1"
related:
  - "./webm.md"
---
https://laravel-news.com/temporary-directory
=======
=======
>>>>>>> 766d652 (.)
module: theme
topic: stream-1
canonical: ../../../Themes/docs/shared-components/stream-1.md
---
<<<<<<< HEAD
>>>>>>> 33a3006 (.)
=======
>>>>>>> 766d652 (.)

See canonical documentation: ../../../Themes/docs/shared-components/stream-1.md
=======
https://laravel-news.com/temporary-directory

-----------------------------------------------

use Illuminate\Support\Facades\Http;
use Spatie\TemporaryDirectory\TemporaryDirectory;

// Normalize the video and get the filename
$videoUrl = str($videoUrl)->replace(' ', '%20');
$tmpFile = $videoUrl->afterLast('/');

// Create a temporary directory and download a file to that path
$tmpDir = TemporaryDirectory::make();
$tmpPath = $tmpDir->path($tmpFile);
Http::sink($tmpPath)->throw()->get($videoUrl->toString());

// Process the file

// Cleanup the temporary file
$tmpFile->delete();

----------------------------------------------------------------------------
>>>>>>> 7605234 (.)
