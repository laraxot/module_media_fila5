<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Support;

use Modules\Media\Models\Media;
use Modules\Media\Support\TemporaryUploadPathGenerator;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-media-db');

/**
 * Media non persistito: il generator legge solo `id` e `uuid`, non tocca il database.
 *
 * `id` è `int` sul modello — è esattamente il caso su cui `getBasePath()` sollevava,
 * finché l'assert interno pretendeva una stringa.
 */
function temporaryUploadPathGeneratorMedia(int $id = 7, string $uuid = 'e2b1f0a4'): Media
{
<<<<<<< HEAD
<<<<<<< .merge_file_gj7zHs
    $media = new Media();
=======
<<<<<<< .merge_file_knEikG
    $media = new Media();
=======
<<<<<<< .merge_file_tnZ3t9
    $media = new Media();
=======
    $media = new Media;
>>>>>>> .merge_file_CRcbz8
>>>>>>> .merge_file_OomiHL
>>>>>>> .merge_file_xGh3dC
=======
    $media = new Media();
>>>>>>> laraxot/dev
    $media->id = $id;
    $media->uuid = $uuid;

    return $media;
}

describe('TemporaryUploadPathGenerator', function (): void {
    it('accepts the integer primary key the model actually declares', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_gj7zHs
        $path = (new TemporaryUploadPathGenerator())->getPath(temporaryUploadPathGeneratorMedia());
=======
<<<<<<< .merge_file_knEikG
        $path = (new TemporaryUploadPathGenerator())->getPath(temporaryUploadPathGeneratorMedia());
=======
<<<<<<< .merge_file_tnZ3t9
        $path = (new TemporaryUploadPathGenerator())->getPath(temporaryUploadPathGeneratorMedia());
=======
        $path = (new TemporaryUploadPathGenerator)->getPath(temporaryUploadPathGeneratorMedia());
>>>>>>> .merge_file_CRcbz8
>>>>>>> .merge_file_OomiHL
>>>>>>> .merge_file_xGh3dC
=======
        $path = (new TemporaryUploadPathGenerator())->getPath(temporaryUploadPathGeneratorMedia());
>>>>>>> laraxot/dev

        Assert::assertStringStartsWith('tmp/'.md5('e2b1f0a4'.'7').'/', $path);
    });

    it('closes the original path with a slash', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_gj7zHs
        $path = (new TemporaryUploadPathGenerator())->getPath(temporaryUploadPathGeneratorMedia());
=======
<<<<<<< .merge_file_knEikG
        $path = (new TemporaryUploadPathGenerator())->getPath(temporaryUploadPathGeneratorMedia());
=======
<<<<<<< .merge_file_tnZ3t9
        $path = (new TemporaryUploadPathGenerator())->getPath(temporaryUploadPathGeneratorMedia());
=======
        $path = (new TemporaryUploadPathGenerator)->getPath(temporaryUploadPathGeneratorMedia());
>>>>>>> .merge_file_CRcbz8
>>>>>>> .merge_file_OomiHL
>>>>>>> .merge_file_xGh3dC
=======
        $path = (new TemporaryUploadPathGenerator())->getPath(temporaryUploadPathGeneratorMedia());
>>>>>>> laraxot/dev

        Assert::assertStringEndsWith('/', $path);
        Assert::assertStringContainsString(md5('7'.'e2b1f0a4'.'original'), $path);
    });

    it('uses a distinct segment for conversions', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_gj7zHs
        $path = (new TemporaryUploadPathGenerator())->getPathForConversions(temporaryUploadPathGeneratorMedia());
=======
<<<<<<< .merge_file_knEikG
        $path = (new TemporaryUploadPathGenerator())->getPathForConversions(temporaryUploadPathGeneratorMedia());
=======
<<<<<<< .merge_file_tnZ3t9
        $path = (new TemporaryUploadPathGenerator())->getPathForConversions(temporaryUploadPathGeneratorMedia());
=======
        $path = (new TemporaryUploadPathGenerator)->getPathForConversions(temporaryUploadPathGeneratorMedia());
>>>>>>> .merge_file_CRcbz8
>>>>>>> .merge_file_OomiHL
>>>>>>> .merge_file_xGh3dC
=======
        $path = (new TemporaryUploadPathGenerator())->getPathForConversions(temporaryUploadPathGeneratorMedia());
>>>>>>> laraxot/dev

        Assert::assertStringContainsString(md5('7'.'e2b1f0a4'.'conversion'), $path);
    });

    it('uses a distinct segment for responsive images', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_gj7zHs
        $path = (new TemporaryUploadPathGenerator())->getPathForResponsiveImages(temporaryUploadPathGeneratorMedia());
=======
<<<<<<< .merge_file_knEikG
        $path = (new TemporaryUploadPathGenerator())->getPathForResponsiveImages(temporaryUploadPathGeneratorMedia());
=======
<<<<<<< .merge_file_tnZ3t9
        $path = (new TemporaryUploadPathGenerator())->getPathForResponsiveImages(temporaryUploadPathGeneratorMedia());
=======
        $path = (new TemporaryUploadPathGenerator)->getPathForResponsiveImages(temporaryUploadPathGeneratorMedia());
>>>>>>> .merge_file_CRcbz8
>>>>>>> .merge_file_OomiHL
>>>>>>> .merge_file_xGh3dC
=======
        $path = (new TemporaryUploadPathGenerator())->getPathForResponsiveImages(temporaryUploadPathGeneratorMedia());
>>>>>>> laraxot/dev

        Assert::assertStringContainsString(md5('7'.'e2b1f0a4'.'responsive'), $path);
    });

    it('keeps the three paths distinct for the same media', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_gj7zHs
        $generator = new TemporaryUploadPathGenerator();
=======
<<<<<<< .merge_file_knEikG
        $generator = new TemporaryUploadPathGenerator();
=======
<<<<<<< .merge_file_tnZ3t9
        $generator = new TemporaryUploadPathGenerator();
=======
        $generator = new TemporaryUploadPathGenerator;
>>>>>>> .merge_file_CRcbz8
>>>>>>> .merge_file_OomiHL
>>>>>>> .merge_file_xGh3dC
=======
        $generator = new TemporaryUploadPathGenerator();
>>>>>>> laraxot/dev
        $media = temporaryUploadPathGeneratorMedia();

        $paths = [
            $generator->getPath($media),
            $generator->getPathForConversions($media),
            $generator->getPathForResponsiveImages($media),
        ];

        Assert::assertCount(3, array_unique($paths));
    });

    it('separates two media that share the uuid but not the key', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_gj7zHs
        $generator = new TemporaryUploadPathGenerator();
=======
<<<<<<< .merge_file_knEikG
        $generator = new TemporaryUploadPathGenerator();
=======
<<<<<<< .merge_file_tnZ3t9
        $generator = new TemporaryUploadPathGenerator();
=======
        $generator = new TemporaryUploadPathGenerator;
>>>>>>> .merge_file_CRcbz8
>>>>>>> .merge_file_OomiHL
>>>>>>> .merge_file_xGh3dC
=======
        $generator = new TemporaryUploadPathGenerator();
>>>>>>> laraxot/dev

        $first = $generator->getPath(temporaryUploadPathGeneratorMedia(7, 'aaaa'));
        $second = $generator->getPath(temporaryUploadPathGeneratorMedia(8, 'aaaa'));

        Assert::assertNotSame($first, $second);
    });

    it('shares the base path across the three variants of the same media', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_gj7zHs
        $generator = new TemporaryUploadPathGenerator();
=======
<<<<<<< .merge_file_knEikG
        $generator = new TemporaryUploadPathGenerator();
=======
<<<<<<< .merge_file_tnZ3t9
        $generator = new TemporaryUploadPathGenerator();
=======
        $generator = new TemporaryUploadPathGenerator;
>>>>>>> .merge_file_CRcbz8
>>>>>>> .merge_file_OomiHL
>>>>>>> .merge_file_xGh3dC
=======
        $generator = new TemporaryUploadPathGenerator();
>>>>>>> laraxot/dev
        $media = temporaryUploadPathGeneratorMedia();
        $base = 'tmp/'.md5('e2b1f0a4'.'7');

        Assert::assertStringStartsWith($base, $generator->getPath($media));
        Assert::assertStringStartsWith($base, $generator->getPathForConversions($media));
        Assert::assertStringStartsWith($base, $generator->getPathForResponsiveImages($media));
    });
});
