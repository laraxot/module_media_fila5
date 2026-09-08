<?php

<<<<<<< HEAD
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

=======
>>>>>>> 9b998103 (.)
declare(strict_types=1);

namespace Modules\Media\Actions\Video;

<<<<<<< HEAD
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
=======
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Support\Ffmpeg\MediaExporterResolver;
>>>>>>> 9b998103 (.)
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;

class ConvertVideoAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $disk_mp4, string $file_mp4, string $file_new): string
    {
        $media = FFMpeg::fromDisk($disk_mp4);

        $openedMedia = $media->open($file_mp4);

        $exportedMedia = $openedMedia->export();

<<<<<<< HEAD
        $format = new X264;
        $format->setKiloBitrate(1000);

        /** @phpstan-ignore-next-line - FFMpeg fluent API */
        $toDiskMedia = $exportedMedia->toDisk($disk_mp4);

        /** @phpstan-ignore-next-line - FFMpeg fluent API */
        $formattedMedia = $toDiskMedia->inFormat($format);

        /** @phpstan-ignore-next-line - FFMpeg fluent API */
=======
        $format = new X264();
        $format->setKiloBitrate(1000);

        $exportedMedia->toDisk($disk_mp4);
        $exportedMedia->inFormat($format);
        $exportedMedia->save($file_new);
        $format = new X264();
        $formattedMedia = MediaExporterResolver::from(
            $exportedMedia->toDisk($disk_mp4)
        )->inFormat($format);
>>>>>>> 9b998103 (.)
        $formattedMedia->save($file_new);

        return Storage::disk($disk_mp4)->url($file_new);
    }
}
