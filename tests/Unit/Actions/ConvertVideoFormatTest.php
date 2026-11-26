<?php

declare(strict_types=1);

/**
 * Le due Action di conversione devono applicare il formato descritto da ConvertData
 * (codec, bitrate, preset) con `inFormat()` e salvare solo il percorso.
 *
 * Senza ffmpeg sul server di sviluppo la catena FFMpeg e' simulata: il test controlla quale
 * formato arriva all'esportatore, non l'encoding.
 *
 * @see Modules/Media/docs/contracts/convert-video-by-convert-data-action.md
 * @see Modules/Media/docs/contracts/convert-video-by-media-convert-action.md
 */

use FFMpeg\Format\Video\DefaultVideo;
use Illuminate\Support\Facades\Storage;
use Mockery\MockInterface;
use Modules\Media\Actions\Video\ConvertVideoByConvertDataAction;
use Modules\Media\Actions\Video\ConvertVideoByMediaConvertAction;
use Modules\Media\Datas\ConvertData;
use Modules\Media\Models\Media;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Tests\TestCase;
use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use RuntimeException;

uses(TestCase::class);

if (! function_exists('mediaConvertFixtureData')) {
    function mediaConvertFixtureData(): ConvertData
    {
        Storage::fake('video');
        Storage::disk('video')->put('in.mp4', 'x');

        return ConvertData::from([
            'disk' => 'video',
            'file' => 'in.mp4',
            'format' => 'webm',
            'codec_video' => 'libvpx-vp9',
            'codec_audio' => 'libvorbis',
            'preset' => 'veryfast',
            'bitrate' => '1000',
        ]);
    }
}

if (! function_exists('mediaConvertFakeFfmpeg')) {
    /**
     * Simula FFMpeg::fromDisk()->open()->export() e cattura il formato passato a inFormat().
     *
     * @param  list<string>  $extraCalls  metodi dell'esportatore ammessi oltre a inFormat/save
     */
    function mediaConvertFakeFfmpeg(?DefaultVideo &$capturedFormat, string $savedPath, array $extraCalls = []): void
    {
        $exporter = Mockery::mock(MediaExporter::class);
        TestCase::mockExpectation($exporter, 'inFormat')
            ->once()
            ->with(Mockery::on(static function (DefaultVideo $format) use (&$capturedFormat): bool {
                $capturedFormat = $format;

                return true;
            }))
            ->andReturn($exporter);
        TestCase::mockExpectation($exporter, 'save')->once()->with($savedPath)->andReturnNull();
        foreach ($extraCalls as $method) {
            TestCase::mockExpectation($exporter, $method)->andReturn($exporter);
        }

        $opener = Mockery::mock(MediaOpener::class);
        TestCase::mockExpectation($opener, 'open')->once()->with('in.mp4')->andReturn($opener);
        TestCase::mockExpectation($opener, 'export')->once()->andReturn($exporter);

        FFMpeg::shouldReceive('fromDisk')->once()->with('video')->andReturn($opener);
    }
}

describe('ConvertVideoByConvertDataAction applica il formato di ConvertData', function (): void {
    it('passa a inFormat() il formato con codec, bitrate e preset scelti', function (): void {
        $capturedFormat = null;
        mediaConvertFakeFfmpeg($capturedFormat, 'in.webm');

        $result = (new ConvertVideoByConvertDataAction)->execute(mediaConvertFixtureData());

        expect($result)->toBe('in.webm');
        if (! $capturedFormat instanceof DefaultVideo) {
            throw new RuntimeException('formato non catturato da inFormat()');
        }
        expect($capturedFormat->getVideoCodec())->toBe('libvpx-vp9');
        expect($capturedFormat->getAudioCodec())->toBe('libvorbis');
        expect($capturedFormat->getKiloBitrate())->toBe(1000);
        expect($capturedFormat->getAdditionalParameters())->toBe(['-preset', 'veryfast']);
    });
});

describe('ConvertVideoByMediaConvertAction applica il formato di ConvertData', function (): void {
    it('passa a inFormat() il formato con codec, bitrate e preset scelti', function (): void {
        $capturedFormat = null;
        mediaConvertFakeFfmpeg($capturedFormat, 'm/conversions/in_7.webm', ['onProgress']);

        // `converted_file` e' un accessor calcolato dal Media collegato (MediaConvertMutator).
        $media = (new Media)->forceFill(['disk' => 'video', 'path' => 'm', 'file_name' => 'in.mp4']);
        /** @var MediaConvert&MockInterface $record */
        $record = Mockery::mock(MediaConvert::class);
        $record->makePartial();
        $record->forceFill(['id' => 7, 'format' => 'webm'])->setRelation('media', $media);
        // La fine si registra in `percentage`: `onProgress` non scatta a 100 e `status` non e' una colonna.
        TestCase::mockExpectation($record, 'update')->once()->with(['percentage' => 100])->andReturnTrue();

        $result = (new ConvertVideoByMediaConvertAction)->execute(mediaConvertFixtureData(), $record);

        expect($result)->toBe('m/conversions/in_7.webm');
        if (! $capturedFormat instanceof DefaultVideo) {
            throw new RuntimeException('formato non catturato da inFormat()');
        }
        expect($capturedFormat->getKiloBitrate())->toBe(1000);
        expect($capturedFormat->getAdditionalParameters())->toBe(['-preset', 'veryfast']);
    });
});
