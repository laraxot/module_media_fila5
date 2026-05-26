<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 * Azione per convertire un video utilizzando ConvertData.
 */

declare(strict_types=1);

namespace Modules\Media\Actions\Video;

use Exception;
use Modules\Media\Datas\ConvertData;
use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Classe per convertire video utilizzando i dati di conversione specificati.
 */
class ConvertVideoByConvertDataAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(ConvertData $data): string
    {
        if (! $data->exists()) {
            throw new Exception('Il file non esiste');
        }

        $format = $data->getFFMpegFormat();
        $file_new = $data->getConvertedFilename();

        if (! $file_new) {
            throw new Exception('Il nome del file convertito non è stato specificato');
        }

        // Instanziamo il formato prima di usarlo
        $formatInstance = new $format;

        /** @var MediaOpener $media */
        $media = FFMpeg::fromDisk($data->disk);

        /** @var MediaOpener $opened */
        $opened = $media->open($data->file);

        /** @var MediaExporter $export */
        $export = $opened->export();

        $export->onProgress(function (float $percentage, float $remaining, float $rate): void {
            // Gestione del progresso
            $msg = "{$percentage}% transcoded";
            $msg .= "{$remaining} seconds left at rate: {$rate}";

            // Log o notifica del progresso
        });

        $export->addFilter('-preset', 'ultrafast');

        $export = $export->inFormat($formatInstance);
        Assert::isInstanceOf($export, MediaExporter::class);

        $export->save($file_new);

        // Restituisci il percorso del file senza usare il metodo url()
        return $file_new;
    }
}
