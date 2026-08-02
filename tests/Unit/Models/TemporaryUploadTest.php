<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

uses(\Modules\Media\Tests\TestCase::class);

use Modules\Media\Models\BaseModel;
use Modules\Media\Models\Media;
use Modules\Media\Models\TemporaryUpload;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

<<<<<<< .merge_file_8b19UI
uses(TestCase::class);

describe('TemporaryUpload Model', function (): void {
    it('extends BaseModel', function (): void {
        Assert::assertInstanceOf(BaseModel::class, new TemporaryUpload);
=======
describe('TemporaryUpload Model', function () {
    it('extends BaseModel', function (): void {
        // Assert
        expect(is_a(TemporaryUpload::class, BaseModel::class, true))->toBeTrue();
>>>>>>> .merge_file_tzo4Sm
    });

    it('uses HasXotFactory trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(TemporaryUpload::class);

<<<<<<< .merge_file_8b19UI
        Assert::assertContains('Modules\Xot\Models\Traits\HasXotFactory', $traits);
=======
        // Assert
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
>>>>>>> .merge_file_tzo4Sm
    });

    it('uses InteractsWithMedia trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(TemporaryUpload::class);

<<<<<<< .merge_file_8b19UI
        Assert::assertTrue(in_array('Spatie\MediaLibrary\InteractsWithMedia', $traits, true));
=======
        // Assert
        expect(in_array('Spatie\MediaLibrary\InteractsWithMedia', $traits, true))->toBeTrue();
>>>>>>> .merge_file_tzo4Sm
    });

    it('uses MassPrunable trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(TemporaryUpload::class);

<<<<<<< .merge_file_8b19UI
        Assert::assertTrue(in_array('Illuminate\Database\Eloquent\MassPrunable', $traits, true));
=======
        // Assert
        expect(in_array('Illuminate\Database\Eloquent\MassPrunable', $traits, true))->toBeTrue();
>>>>>>> .merge_file_tzo4Sm
    });

    it('has media connection', function (): void {
        // Arrange
        $upload = new TemporaryUpload;

<<<<<<< .merge_file_8b19UI
        Assert::assertSame('media', $upload->getConnectionName());
=======
        // Assert
        expect($upload->getConnectionName())->toBe('media');
>>>>>>> .merge_file_tzo4Sm
    });

    it('has empty guarded array', function (): void {
        // Arrange
        $upload = new TemporaryUpload;

<<<<<<< .merge_file_8b19UI
        Assert::assertSame([], $upload->getGuarded());
    });

    it('has findByMediaUuid static method', function (): void {
        Assert::assertTrue((new \ReflectionClass(TemporaryUpload::class))->hasMethod('findByMediaUuid'));
    });

    it('has findByMediaUuidInCurrentSession static method', function (): void {
        Assert::assertTrue((new \ReflectionClass(TemporaryUpload::class))->hasMethod('findByMediaUuidInCurrentSession'));
    });

    it('has createForFile static method', function (): void {
        Assert::assertTrue((new \ReflectionClass(TemporaryUpload::class))->hasMethod('createForFile'));
    });

    it('has createForRemoteFile static method', function (): void {
        Assert::assertTrue((new \ReflectionClass(TemporaryUpload::class))->hasMethod('createForRemoteFile'));
    });

    it('has registerMediaConversions method', function (): void {
        Assert::assertTrue((new \ReflectionClass(TemporaryUpload::class))->hasMethod('registerMediaConversions'));
    });

    it('has moveMedia method', function (): void {
        Assert::assertTrue((new \ReflectionClass(TemporaryUpload::class))->hasMethod('moveMedia'));
    });

    it('has static disk property', function (): void {
        Assert::assertTrue((new \ReflectionClass(TemporaryUpload::class))->hasProperty('disk'));
    });

    it('has static manipulatePreview property', function (): void {
        Assert::assertTrue((new \ReflectionClass(TemporaryUpload::class))->hasProperty('manipulatePreview'));
=======
        // Assert
        expect($upload->getGuarded())->toBe([]);
    });

    it('has findByMediaUuid static method', function (): void {
        // Assert
        expect(method_exists(TemporaryUpload::class, 'findByMediaUuid'))->toBeTrue();
    });

    it('has findByMediaUuidInCurrentSession static method', function (): void {
        // Assert
        expect(method_exists(TemporaryUpload::class, 'findByMediaUuidInCurrentSession'))->toBeTrue();
    });

    it('has createForFile static method', function (): void {
        // Assert
        expect(method_exists(TemporaryUpload::class, 'createForFile'))->toBeTrue();
    });

    it('has createForRemoteFile static method', function (): void {
        // Assert
        expect(method_exists(TemporaryUpload::class, 'createForRemoteFile'))->toBeTrue();
    });

    it('has registerMediaConversions method', function (): void {
        // Assert
        expect(method_exists(TemporaryUpload::class, 'registerMediaConversions'))->toBeTrue();
    });

    it('has moveMedia method', function (): void {
        // Assert
        expect(method_exists(TemporaryUpload::class, 'moveMedia'))->toBeTrue();
    });

    it('has static disk property', function (): void {
        // Assert
        expect(property_exists(TemporaryUpload::class, 'disk'))->toBeTrue();
    });

    it('has static manipulatePreview property', function (): void {
        // Assert
        expect(property_exists(TemporaryUpload::class, 'manipulatePreview'))->toBeTrue();
>>>>>>> .merge_file_tzo4Sm
    });
});
