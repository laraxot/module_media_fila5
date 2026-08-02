<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 * Azione per convertire un video utilizzando il modello MediaConvert.
 */

declare(strict_types=1);

namespace Modules\Media\Actions\Video;

use Exception;
use Modules\Media\Datas\ConvertData;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Support\Ffmpeg\MediaExporterResolver;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;

/**
 * Classe per convertire video utilizzando MediaConvert e tenere traccia del progresso.
 */
class ConvertVideoByMediaConvertAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(ConvertData $data, MediaConvert $record): string
    {
        if (! $data->exists()) {
            throw new Exception('Il file non esiste');
        }

        $format = $data->getFFMpegFormat();
        $file_new = $record->converted_file;

        if (! $file_new) {
            throw new Exception('Il nome del file convertito non è stato specificato');
        }

        $exportedMedia = FFMpeg::fromDisk($data->disk)
            ->open($data->file)
            ->export();

        $exportedMedia->onProgress(function (float $percentage, float $remaining, float $rate) use ($record): void {
            $record->update([
                'percentage' => $percentage,
                'remaining' => $remaining,
                'rate' => $rate,
            ]);
        });

        $exportedMedia = MediaExporterResolver::from(
            $exportedMedia->toDisk($data->disk)
        );
        $exportedMedia->addFilter('-preset', 'ultrafast');
        $exportedMedia->inFormat($format);
        $exportedMedia->save($file_new);

        $record->update([
            'status' => 'completed',
        ]);

        return $file_new;
    }
}
