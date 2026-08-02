<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

uses(TestCase::class);

use Modules\Media\Models\Media;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

describe('Media Model', function () {
    it('extends SpatieMedia', function (): void {
        // Assert
        expect(is_a(Media::class, SpatieMedia::class, true))->toBeTrue();
    });

    it('uses HasXotFactory trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(Media::class);

        // Assert
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
    });

    it('uses Updater trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(Media::class);

        // Assert
        expect(in_array('Modules\Xot\Traits\Updater', $traits, true))->toBeTrue();
    });

    it('has media connection', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        expect($model->getConnectionName())->toBe('media');
    });

    it('has findWithTemporaryUploadInCurrentSession static method', function (): void {
        // Assert
        expect(method_exists(Media::class, 'findWithTemporaryUploadInCurrentSession'))->toBeTrue();
    });

    it('has temporaryUpload relationship', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        expect(method_exists($model, 'temporaryUpload'))->toBeTrue();
    });

    it('has creator relationship', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        expect(method_exists($model, 'creator'))->toBeTrue();
    });

    it('has mediaConverts relationship', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        expect(method_exists($model, 'mediaConverts'))->toBeTrue();
    });

    it('has getUrlConv method', function (): void {
        // Assert
        expect(method_exists(Media::class, 'getUrlConv'))->toBeTrue();
    });

    it('has getEntryConversionsAttribute accessor', function (): void {
        // Assert
        expect(method_exists(Media::class, 'getEntryConversionsAttribute'))->toBeTrue();
    });

    it('casts id to string', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        $casts = $model->getCasts();
        Assert::assertSame('string', $casts['id'] ?? null);
    });

    it('casts uuid to string', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        $casts = $model->getCasts();
        Assert::assertSame('string', $casts['uuid'] ?? null);
    });

    it('casts datetime fields', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        $casts = $model->getCasts();
        Assert::assertSame('datetime', $casts['created_at'] ?? null);
        Assert::assertSame('datetime', $casts['updated_at'] ?? null);
        Assert::assertSame('datetime', $casts['deleted_at'] ?? null);
    });

    it('casts user fields to string', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        $casts = $model->getCasts();
        Assert::assertSame('string', $casts['updated_by'] ?? null);
        Assert::assertSame('string', $casts['created_by'] ?? null);
        Assert::assertSame('string', $casts['deleted_by'] ?? null);
    });

    it('casts array fields', function (): void {
        // Arrange
        $model = new Media;

        // Assert
        $casts = $model->getCasts();
        Assert::assertSame('array', $casts['manipulations'] ?? null);
        Assert::assertSame('array', $casts['custom_properties'] ?? null);
        Assert::assertSame('array', $casts['generated_conversions'] ?? null);
        Assert::assertSame('array', $casts['responsive_images'] ?? null);
    });

    it('has entry_conversions attribute', function (): void {
        // Assert - entry_conversions is a dynamic attribute from getEntryConversionsAttribute accessor
        expect(method_exists(Media::class, 'getEntryConversionsAttribute'))->toBeTrue();
    });
});
