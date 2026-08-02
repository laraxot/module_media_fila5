<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

uses(\Modules\Media\Tests\TestCase::class);

use Modules\Media\Models\Media;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

<<<<<<< .merge_file_F1AkNg
uses(TestCase::class);

describe('Media Model', function (): void {
    it('extends SpatieMedia', function (): void {
        Assert::assertInstanceOf(SpatieMedia::class, new Media);
=======
describe('Media Model', function () {
    it('extends SpatieMedia', function (): void {
        // Assert
        expect(is_a(Media::class, SpatieMedia::class, true))->toBeTrue();
>>>>>>> .merge_file_uoOXkI
    });

    it('uses HasXotFactory trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(Media::class);

<<<<<<< .merge_file_F1AkNg
        Assert::assertContains('Modules\Xot\Models\Traits\HasXotFactory', $traits);
=======
        // Assert
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
>>>>>>> .merge_file_uoOXkI
    });

    it('uses Updater trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(Media::class);

<<<<<<< .merge_file_F1AkNg
        Assert::assertTrue(in_array('Modules\Xot\Traits\Updater', $traits, true));
=======
        // Assert
        expect(in_array('Modules\Xot\Traits\Updater', $traits, true))->toBeTrue();
>>>>>>> .merge_file_uoOXkI
    });

    it('has media connection', function (): void {
        // Arrange
        $model = new Media;

<<<<<<< .merge_file_F1AkNg
        Assert::assertSame('media', $model->getConnectionName());
    });

    it('has findWithTemporaryUploadInCurrentSession static method', function (): void {
        Assert::assertTrue((new \ReflectionClass(Media::class))->hasMethod('findWithTemporaryUploadInCurrentSession'));
=======
        // Assert
        expect($model->getConnectionName())->toBe('media');
    });

    it('has findWithTemporaryUploadInCurrentSession static method', function (): void {
        // Assert
        expect(method_exists(Media::class, 'findWithTemporaryUploadInCurrentSession'))->toBeTrue();
>>>>>>> .merge_file_uoOXkI
    });

    it('has temporaryUpload relationship', function (): void {
        // Arrange
        $model = new Media;

<<<<<<< .merge_file_F1AkNg
        Assert::assertTrue((new \ReflectionClass($model))->hasMethod('temporaryUpload'));
=======
        // Assert
        expect(method_exists($model, 'temporaryUpload'))->toBeTrue();
>>>>>>> .merge_file_uoOXkI
    });

    it('has creator relationship', function (): void {
        // Arrange
        $model = new Media;

<<<<<<< .merge_file_F1AkNg
        Assert::assertTrue((new \ReflectionClass($model))->hasMethod('creator'));
=======
        // Assert
        expect(method_exists($model, 'creator'))->toBeTrue();
>>>>>>> .merge_file_uoOXkI
    });

    it('has mediaConverts relationship', function (): void {
        // Arrange
        $model = new Media;

<<<<<<< .merge_file_F1AkNg
        Assert::assertTrue((new \ReflectionClass($model))->hasMethod('mediaConverts'));
    });

    it('has getUrlConv method', function (): void {
        Assert::assertTrue((new \ReflectionClass(Media::class))->hasMethod('getUrlConv'));
    });

    it('has getEntryConversionsAttribute accessor', function (): void {
        Assert::assertTrue((new \ReflectionClass(Media::class))->hasMethod('getEntryConversionsAttribute'));
=======
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
>>>>>>> .merge_file_uoOXkI
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
<<<<<<< .merge_file_F1AkNg
        // entry_conversions is a dynamic attribute from getEntryConversionsAttribute accessor
        Assert::assertTrue((new \ReflectionClass(Media::class))->hasMethod('getEntryConversionsAttribute'));
=======
        // Assert - entry_conversions is a dynamic attribute from getEntryConversionsAttribute accessor
        expect(method_exists(Media::class, 'getEntryConversionsAttribute'))->toBeTrue();
>>>>>>> .merge_file_uoOXkI
    });
});
