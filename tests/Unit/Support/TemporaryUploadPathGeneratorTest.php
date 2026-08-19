<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Support;

use Modules\Media\Models\Media;
use Modules\Media\Support\TemporaryUploadPathGenerator;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

/*
 * Generatore dei path temporanei. Lavora sugli attributi del model, non lo
 * persiste: il Media qui non viene mai salvato, quindi nessuna query.
 *
 * `getKey()` e `->id` di un model sono `mixed` per l'analisi statica: i path
 * attesi si ricostruiscono dalle costanti tipizzate assegnate al model, non
 * rileggendole dal model stesso.
 */

uses(TestCase::class);

const MEDIA_PATH_ID = 42;
const MEDIA_PATH_UUID = '0d0d5b7a-1b4e-4f2a-9a1e-6f0f8b2c3d4e';

function mediaPathGeneratorRecord(int $id = MEDIA_PATH_ID, string $uuid = MEDIA_PATH_UUID): Media
{
    $media = new Media;
    $media->id = $id;
    $media->uuid = $uuid;

    return $media;
}

function mediaPathGeneratorBase(int $id = MEDIA_PATH_ID, string $uuid = MEDIA_PATH_UUID): string
{
    return 'tmp/'.md5($uuid.$id);
}

test('the original path hangs off the media base path and ends with a slash', function (): void {
    $path = (new TemporaryUploadPathGenerator)->getPath(mediaPathGeneratorRecord());

    Assert::assertSame(
        mediaPathGeneratorBase().'/'.md5(MEDIA_PATH_ID.MEDIA_PATH_UUID.'original').'/',
        $path,
    );
});

test('conversions and responsive images get distinct sibling folders', function (): void {
    $generator = new TemporaryUploadPathGenerator;
    $media = mediaPathGeneratorRecord();

    $conversions = $generator->getPathForConversions($media);
    $responsive = $generator->getPathForResponsiveImages($media);

    Assert::assertSame(
        mediaPathGeneratorBase().'/'.md5(MEDIA_PATH_ID.MEDIA_PATH_UUID.'conversion'),
        $conversions,
    );
    Assert::assertSame(
        mediaPathGeneratorBase().'/'.md5(MEDIA_PATH_ID.MEDIA_PATH_UUID.'responsive'),
        $responsive,
    );
    Assert::assertNotSame($conversions, $responsive);
});

test('all three paths share the same base folder', function (): void {
    $generator = new TemporaryUploadPathGenerator;
    $media = mediaPathGeneratorRecord();
    $base = mediaPathGeneratorBase().'/';

    foreach ([
        $generator->getPath($media),
        $generator->getPathForConversions($media),
        $generator->getPathForResponsiveImages($media),
    ] as $path) {
        Assert::assertStringStartsWith($base, $path);
    }
});

test('two media with the same uuid but different ids never collide', function (): void {
    $generator = new TemporaryUploadPathGenerator;

    Assert::assertNotSame(
        $generator->getPath(mediaPathGeneratorRecord(1, MEDIA_PATH_UUID)),
        $generator->getPath(mediaPathGeneratorRecord(2, MEDIA_PATH_UUID)),
    );
});
