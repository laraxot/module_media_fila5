<<<<<<< HEAD
---
module: theme
topic: --stream
canonical: ../../../Themes/docs/shared-components/.gitkeep-Modules
title: "stream"
type: note
status: stub
updated: 2026-10-08
tags: [docs, media]
qmd: "stream media"
---

See canonical documentation: ../../../Themes/docs/shared-components/.gitkeep-Modules
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
>>>>>>> ec2b884b (.)
