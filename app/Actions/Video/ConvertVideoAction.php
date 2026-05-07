<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions\Video;

use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class ConvertVideoAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $disk_mp4, string $file_mp4, string $file_new): string
    {
        /** @var MediaOpener $media */
        $media = FFMpeg::fromDisk($disk_mp4);

        /** @var MediaOpener $openedMedia */
        $openedMedia = $media->open($file_mp4);

        /** @var MediaExporter $exportedMedia */
        $exportedMedia = $openedMedia->export();

        $format = new X264;
        $format->setKiloBitrate(1000);

<<<<<<< Updated upstream
        $toDiskMedia = $exportedMedia->toDisk($disk_mp4);

        $formattedMedia = $toDiskMedia->inFormat($format);

        $formattedMedia->save($file_new);
=======
        $toDisk = $exportedMedia->toDisk($disk_mp4);
        Assert::isInstanceOf($toDisk, MediaExporter::class);

        $formatted = $toDisk->inFormat($format);

        $formatted->save($file_new);
>>>>>>> Stashed changes

        return Storage::disk($disk_mp4)->url($file_new);
    }
}
