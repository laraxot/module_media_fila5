<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Modules\Media\Models\BaseModel;
use Modules\Media\Models\TemporaryUpload;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
=======
use Modules\Media\Tests\TestCase;
>>>>>>> laraxot/dev

uses(TestCase::class);

describe('TemporaryUpload Model', function (): void {
    it('extends BaseModel', function (): void {
<<<<<<< HEAD
        Assert::assertInstanceOf(BaseModel::class, new TemporaryUpload);
=======
        expect(new TemporaryUpload)->toBeInstanceOf(BaseModel::class);
>>>>>>> laraxot/dev
    });

    it('uses HasXotFactory trait', function (): void {
        $traits = class_uses_recursive(TemporaryUpload::class);

<<<<<<< HEAD
        Assert::assertContains('Modules\Xot\Models\Traits\HasXotFactory', $traits);
=======
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('uses InteractsWithMedia trait', function (): void {
        $traits = class_uses_recursive(TemporaryUpload::class);

<<<<<<< HEAD
        Assert::assertTrue(in_array('Spatie\MediaLibrary\InteractsWithMedia', $traits, true));
=======
        expect(in_array('Spatie\MediaLibrary\InteractsWithMedia', $traits, true))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('uses MassPrunable trait', function (): void {
        $traits = class_uses_recursive(TemporaryUpload::class);

<<<<<<< HEAD
        Assert::assertTrue(in_array('Illuminate\Database\Eloquent\MassPrunable', $traits, true));
=======
        expect(in_array('Illuminate\Database\Eloquent\MassPrunable', $traits, true))->toBeTrue();
>>>>>>> laraxot/dev
    });

    it('has media connection', function (): void {
        $upload = new TemporaryUpload;

<<<<<<< HEAD
        Assert::assertSame('media', $upload->getConnectionName());
=======
        expect($upload->getConnectionName())->toBe('media');
>>>>>>> laraxot/dev
    });

    it('has empty guarded array', function (): void {
        $upload = new TemporaryUpload;

<<<<<<< HEAD
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
        expect($upload->getGuarded())->toBe([]);
    });

    it('has findByMediaUuid static method', function (): void {
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
>>>>>>> laraxot/dev
    });
});
