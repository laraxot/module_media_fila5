<<<<<<< HEAD

https://laravel-news.com/temporary-directory

=======
https://laravel-news.com/temporary-directory


>>>>>>> provtv/dev
-----------------------------------------------

use Illuminate\Support\Facades\Http;
use Spatie\TemporaryDirectory\TemporaryDirectory;
<<<<<<< HEAD

// Normalize the video and get the filename
$videoUrl = str($videoUrl)->replace(' ', '%20');
$tmpFile = $videoUrl->afterLast('/');

=======
 
// Normalize the video and get the filename
$videoUrl = str($videoUrl)->replace(' ', '%20');
$tmpFile = $videoUrl->afterLast('/');
 
>>>>>>> provtv/dev
// Create a temporary directory and download a file to that path
$tmpDir = TemporaryDirectory::make();
$tmpPath = $tmpDir->path($tmpFile);
Http::sink($tmpPath)->throw()->get($videoUrl->toString());
<<<<<<< HEAD

// Process the file

// Cleanup the temporary file
$tmpFile->delete();

----------------------------------------------------------------------------
=======
 
// Process the file
 
// Cleanup the temporary file
$tmpFile->delete();

----------------------------------------------------------------------------
>>>>>>> provtv/dev
