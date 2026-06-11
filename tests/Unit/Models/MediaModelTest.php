<?php

declare(strict_types=1);

use Modules\Media\Models\Media;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

uses(TestCase::class);

describe('Media Model', function (): void {
    it('extends SpatieMedia', function (): void {
        Assert::assertInstanceOf(SpatieMedia::class, new Media);
    });

    it('uses HasXotFactory trait', function (): void {
        $traits = class_uses_recursive(Media::class);

        Assert::assertTrue(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true));
    });

    it('uses Updater trait', function (): void {
        $traits = class_uses_recursive(Media::class);

        Assert::assertTrue(in_array('Modules\Xot\Traits\Updater', $traits, true));
    });

    it('has media connection', function (): void {
        $model = new Media;

        Assert::assertSame('media', $model->getConnectionName());
    });

    it('exposes expected helper relations and methods', function (): void {
        $methods = get_class_methods(Media::class);

        Assert::assertContains('findWithTemporaryUploadInCurrentSession', $methods);
        Assert::assertContains('temporaryUpload', $methods);
        Assert::assertContains('creator', $methods);
        Assert::assertContains('mediaConverts', $methods);
        Assert::assertContains('getUrlConv', $methods);
        Assert::assertContains('getEntryConversionsAttribute', $methods);
    });

    it('casts id to string', function (): void {
        $casts = (new Media)->getCasts();

        Assert::assertSame('string', $casts['id'] ?? null);
    });

    it('casts uuid to string', function (): void {
        $casts = (new Media)->getCasts();

        Assert::assertSame('string', $casts['uuid'] ?? null);
    });

    it('casts datetime fields', function (): void {
        $casts = (new Media)->getCasts();

        Assert::assertSame('datetime', $casts['created_at'] ?? null);
        Assert::assertSame('datetime', $casts['updated_at'] ?? null);
        Assert::assertSame('datetime', $casts['deleted_at'] ?? null);
    });

    it('casts user fields to string', function (): void {
        $casts = (new Media)->getCasts();

        Assert::assertSame('string', $casts['updated_by'] ?? null);
        Assert::assertSame('string', $casts['created_by'] ?? null);
        Assert::assertSame('string', $casts['deleted_by'] ?? null);
    });

    it('casts array fields', function (): void {
        $casts = (new Media)->getCasts();

        Assert::assertSame('array', $casts['manipulations'] ?? null);
        Assert::assertSame('array', $casts['custom_properties'] ?? null);
        Assert::assertSame('array', $casts['generated_conversions'] ?? null);
        Assert::assertSame('array', $casts['responsive_images'] ?? null);
    });
});
