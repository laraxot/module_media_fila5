<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Modules\Media\Models\Media;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
=======
use Modules\Media\Tests\TestCase;
>>>>>>> laraxot/dev
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

uses(TestCase::class);

describe('Media Model', function (): void {
    it('extends SpatieMedia', function (): void {
<<<<<<< HEAD
        Assert::assertInstanceOf(SpatieMedia::class, new Media);
=======
        expect(new Media)->toBeInstanceOf(SpatieMedia::class);
>>>>>>> laraxot/dev
    });

    it('uses HasXotFactory trait', function (): void {
        $traits = class_uses_recursive(Media::class);

<<<<<<< HEAD
        Assert::assertContains('Modules\Xot\Models\Traits\HasXotFactory', $traits);
=======
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('uses Updater trait', function (): void {
        $traits = class_uses_recursive(Media::class);

<<<<<<< HEAD
        Assert::assertTrue(in_array('Modules\Xot\Traits\Updater', $traits, true));
=======
        expect(in_array('Modules\Xot\Traits\Updater', $traits, true))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('has media connection', function (): void {
        $model = new Media;

<<<<<<< HEAD
        Assert::assertSame('media', $model->getConnectionName());
    });

    it('has findWithTemporaryUploadInCurrentSession static method', function (): void {
        Assert::assertTrue((new \ReflectionClass(Media::class))->hasMethod('findWithTemporaryUploadInCurrentSession'));
=======
        expect($model->getConnectionName())->toBe('media');
    });

    it('has findWithTemporaryUploadInCurrentSession static method', function (): void {
        expect((new \ReflectionClass(Media::class))->hasMethod('findWithTemporaryUploadInCurrentSession'))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('has temporaryUpload relationship', function (): void {
        $model = new Media;

<<<<<<< HEAD
        Assert::assertTrue((new \ReflectionClass($model))->hasMethod('temporaryUpload'));
=======
        expect((new \ReflectionClass($model))->hasMethod('temporaryUpload'))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('has creator relationship', function (): void {
        $model = new Media;

<<<<<<< HEAD
        Assert::assertTrue((new \ReflectionClass($model))->hasMethod('creator'));
=======
        expect((new \ReflectionClass($model))->hasMethod('creator'))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('has mediaConverts relationship', function (): void {
        $model = new Media;

<<<<<<< HEAD
        Assert::assertTrue((new \ReflectionClass($model))->hasMethod('mediaConverts'));
    });

    it('has getUrlConv method', function (): void {
        Assert::assertTrue((new \ReflectionClass(Media::class))->hasMethod('getUrlConv'));
    });

    it('has getEntryConversionsAttribute accessor', function (): void {
        Assert::assertTrue((new \ReflectionClass(Media::class))->hasMethod('getEntryConversionsAttribute'));
=======
        expect((new \ReflectionClass($model))->hasMethod('mediaConverts'))->toBeTrue();
    });

    it('has getUrlConv method', function (): void {
        expect((new \ReflectionClass(Media::class))->hasMethod('getUrlConv'))->toBeTrue();
    });

    it('has getEntryConversionsAttribute accessor', function (): void {
        expect((new \ReflectionClass(Media::class))->hasMethod('getEntryConversionsAttribute'))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('casts id to string', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
<<<<<<< HEAD
        Assert::assertSame('string', $casts['id'] ?? null);
=======
        expect($casts['id'] ?? null)->toBe('string');
>>>>>>> laraxot/dev
    });

    it('casts uuid to string', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
<<<<<<< HEAD
        Assert::assertSame('string', $casts['uuid'] ?? null);
=======
        expect($casts['uuid'] ?? null)->toBe('string');
>>>>>>> laraxot/dev
    });

    it('casts datetime fields', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
<<<<<<< HEAD
        Assert::assertSame('datetime', $casts['created_at'] ?? null);
        Assert::assertSame('datetime', $casts['updated_at'] ?? null);
        Assert::assertSame('datetime', $casts['deleted_at'] ?? null);
=======
        expect($casts['created_at'] ?? null)->toBe('datetime');
        expect($casts['updated_at'] ?? null)->toBe('datetime');
        expect($casts['deleted_at'] ?? null)->toBe('datetime');
>>>>>>> laraxot/dev
    });

    it('casts user fields to string', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
<<<<<<< HEAD
        Assert::assertSame('string', $casts['updated_by'] ?? null);
        Assert::assertSame('string', $casts['created_by'] ?? null);
        Assert::assertSame('string', $casts['deleted_by'] ?? null);
=======
        expect($casts['updated_by'] ?? null)->toBe('string');
        expect($casts['created_by'] ?? null)->toBe('string');
        expect($casts['deleted_by'] ?? null)->toBe('string');
>>>>>>> laraxot/dev
    });

    it('casts array fields', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
<<<<<<< HEAD
        Assert::assertSame('array', $casts['manipulations'] ?? null);
        Assert::assertSame('array', $casts['custom_properties'] ?? null);
        Assert::assertSame('array', $casts['generated_conversions'] ?? null);
        Assert::assertSame('array', $casts['responsive_images'] ?? null);
=======
        expect($casts['manipulations'] ?? null)->toBe('array');
        expect($casts['custom_properties'] ?? null)->toBe('array');
        expect($casts['generated_conversions'] ?? null)->toBe('array');
        expect($casts['responsive_images'] ?? null)->toBe('array');
>>>>>>> laraxot/dev
    });

    it('has entry_conversions attribute', function (): void {
        // entry_conversions is a dynamic attribute from getEntryConversionsAttribute accessor
<<<<<<< HEAD
        Assert::assertTrue((new \ReflectionClass(Media::class))->hasMethod('getEntryConversionsAttribute'));
=======
        expect((new \ReflectionClass(Media::class))->hasMethod('getEntryConversionsAttribute'))->toBeTrue();
>>>>>>> laraxot/dev
    });
});
