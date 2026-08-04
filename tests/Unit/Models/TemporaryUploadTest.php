<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Modules\Media\Models\BaseModel;
use Modules\Media\Models\TemporaryUpload;
<<<<<<< HEAD
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('TemporaryUpload Model', function () {
    it('extends BaseModel', function (): void {
        // Assert
        expect(is_a(TemporaryUpload::class, BaseModel::class, true))->toBeTrue();
    });

    it('uses HasXotFactory trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(TemporaryUpload::class);

        // Assert
=======

uses(\Modules\Media\Tests\TestCase::class);

describe('TemporaryUpload Model', function (): void {
    it('extends BaseModel', function (): void {
        expect(new TemporaryUpload)->toBeInstanceOf(BaseModel::class);
    });

    it('uses HasXotFactory trait', function (): void {
        $traits = class_uses_recursive(TemporaryUpload::class);

>>>>>>> be7d0c3 (.)
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
    });

    it('uses InteractsWithMedia trait', function (): void {
<<<<<<< HEAD
        // Arrange
        $traits = class_uses_recursive(TemporaryUpload::class);

        // Assert
=======
        $traits = class_uses_recursive(TemporaryUpload::class);

>>>>>>> be7d0c3 (.)
        expect(in_array('Spatie\MediaLibrary\InteractsWithMedia', $traits, true))->toBeTrue();
    });

    it('uses MassPrunable trait', function (): void {
<<<<<<< HEAD
        // Arrange
        $traits = class_uses_recursive(TemporaryUpload::class);

        // Assert
=======
        $traits = class_uses_recursive(TemporaryUpload::class);

>>>>>>> be7d0c3 (.)
        expect(in_array('Illuminate\Database\Eloquent\MassPrunable', $traits, true))->toBeTrue();
    });

    it('has media connection', function (): void {
<<<<<<< HEAD
        // Arrange
        $upload = new TemporaryUpload;

        // Assert
=======
        $upload = new TemporaryUpload;

>>>>>>> be7d0c3 (.)
        expect($upload->getConnectionName())->toBe('media');
    });

    it('has empty guarded array', function (): void {
<<<<<<< HEAD
        // Arrange
        $upload = new TemporaryUpload;

        // Assert
=======
        $upload = new TemporaryUpload;

>>>>>>> be7d0c3 (.)
        expect($upload->getGuarded())->toBe([]);
    });

    it('has findByMediaUuid static method', function (): void {
<<<<<<< HEAD
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
=======
        expect((new \ReflectionClass(TemporaryUpload::class))->hasMethod('findByMediaUuid'))->toBeTrue();
    });

    it('has findByMediaUuidInCurrentSession static method', function (): void {
        expect((new \ReflectionClass(TemporaryUpload::class))->hasMethod('findByMediaUuidInCurrentSession'))->toBeTrue();
    });

    it('has createForFile static method', function (): void {
        expect((new \ReflectionClass(TemporaryUpload::class))->hasMethod('createForFile'))->toBeTrue();
    });

    it('has createForRemoteFile static method', function (): void {
        expect((new \ReflectionClass(TemporaryUpload::class))->hasMethod('createForRemoteFile'))->toBeTrue();
    });

    it('has registerMediaConversions method', function (): void {
        expect((new \ReflectionClass(TemporaryUpload::class))->hasMethod('registerMediaConversions'))->toBeTrue();
    });

    it('has moveMedia method', function (): void {
        expect((new \ReflectionClass(TemporaryUpload::class))->hasMethod('moveMedia'))->toBeTrue();
    });

    it('has static disk property', function (): void {
        expect((new \ReflectionClass(TemporaryUpload::class))->hasProperty('disk'))->toBeTrue();
    });

    it('has static manipulatePreview property', function (): void {
        expect((new \ReflectionClass(TemporaryUpload::class))->hasProperty('manipulatePreview'))->toBeTrue();
>>>>>>> be7d0c3 (.)
    });
});
