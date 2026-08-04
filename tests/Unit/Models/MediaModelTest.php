<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Modules\Media\Models\Media;
<<<<<<< HEAD
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

uses(TestCase::class);

describe('Media Model', function () {
    it('extends SpatieMedia', function (): void {
        // Assert
        expect(is_a(Media::class, SpatieMedia::class, true))->toBeTrue();
    });

    it('uses HasXotFactory trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(Media::class);

        // Assert
=======
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

uses(\Modules\Media\Tests\TestCase::class);

describe('Media Model', function (): void {
    it('extends SpatieMedia', function (): void {
        expect(new Media)->toBeInstanceOf(SpatieMedia::class);
    });

    it('uses HasXotFactory trait', function (): void {
        $traits = class_uses_recursive(Media::class);

>>>>>>> be7d0c3 (.)
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
    });

    it('uses Updater trait', function (): void {
<<<<<<< HEAD
        // Arrange
        $traits = class_uses_recursive(Media::class);

        // Assert
=======
        $traits = class_uses_recursive(Media::class);

>>>>>>> be7d0c3 (.)
        expect(in_array('Modules\Xot\Traits\Updater', $traits, true))->toBeTrue();
    });

    it('has media connection', function (): void {
<<<<<<< HEAD
        // Arrange
        $model = new Media;

        // Assert
=======
        $model = new Media;

>>>>>>> be7d0c3 (.)
        expect($model->getConnectionName())->toBe('media');
    });

    it('has findWithTemporaryUploadInCurrentSession static method', function (): void {
<<<<<<< HEAD
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
=======
        expect((new \ReflectionClass(Media::class))->hasMethod('findWithTemporaryUploadInCurrentSession'))->toBeTrue();
    });

    it('has temporaryUpload relationship', function (): void {
        $model = new Media;

        expect((new \ReflectionClass($model))->hasMethod('temporaryUpload'))->toBeTrue();
    });

    it('has creator relationship', function (): void {
        $model = new Media;

        expect((new \ReflectionClass($model))->hasMethod('creator'))->toBeTrue();
    });

    it('has mediaConverts relationship', function (): void {
        $model = new Media;

        expect((new \ReflectionClass($model))->hasMethod('mediaConverts'))->toBeTrue();
    });

    it('has getUrlConv method', function (): void {
        expect((new \ReflectionClass(Media::class))->hasMethod('getUrlConv'))->toBeTrue();
    });

    it('has getEntryConversionsAttribute accessor', function (): void {
        expect((new \ReflectionClass(Media::class))->hasMethod('getEntryConversionsAttribute'))->toBeTrue();
    });

    it('casts id to string', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
        expect($casts['id'] ?? null)->toBe('string');
    });

    it('casts uuid to string', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
        expect($casts['uuid'] ?? null)->toBe('string');
    });

    it('casts datetime fields', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
        expect($casts['created_at'] ?? null)->toBe('datetime');
        expect($casts['updated_at'] ?? null)->toBe('datetime');
        expect($casts['deleted_at'] ?? null)->toBe('datetime');
    });

    it('casts user fields to string', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
        expect($casts['updated_by'] ?? null)->toBe('string');
        expect($casts['created_by'] ?? null)->toBe('string');
        expect($casts['deleted_by'] ?? null)->toBe('string');
    });

    it('casts array fields', function (): void {
        $model = new Media;

        $casts = $model->getCasts();
        expect($casts['manipulations'] ?? null)->toBe('array');
        expect($casts['custom_properties'] ?? null)->toBe('array');
        expect($casts['generated_conversions'] ?? null)->toBe('array');
        expect($casts['responsive_images'] ?? null)->toBe('array');
    });

    it('has entry_conversions attribute', function (): void {
        // entry_conversions is a dynamic attribute from getEntryConversionsAttribute accessor
        expect((new \ReflectionClass(Media::class))->hasMethod('getEntryConversionsAttribute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
    });
});
