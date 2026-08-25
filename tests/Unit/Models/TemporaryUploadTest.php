<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Modules\Media\Models\BaseModel;
use Modules\Media\Models\TemporaryUpload;
use Modules\Media\Tests\TestCase;

<<<<<<< HEAD
ses(TestCase::class);
=======
uses(TestCase::class);
>>>>>>> laraxot/dev

describe('TemporaryUpload Model', function (): void {
    it('extends BaseModel', function (): void {
        expect((new \ReflectionClass(TemporaryUpload::class))->isSubclassOf(BaseModel::class))->toBeTrue();
    });

    it('uses HasXotFactory trait', function (): void {
        $traits = class_uses_recursive(TemporaryUpload::class);

        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
    });

    it('uses InteractsWithMedia trait', function (): void {
<<<<<<< HEAD
       $traits = class_uses_recursive(TemporaryUpload::class);
=======
        $traits = class_uses_recursive(TemporaryUpload::class);
>>>>>>> laraxot/dev

        expect(in_array('Spatie\MediaLibrary\InteractsWithMedia', $traits, true))->toBeTrue();
    });

    it('uses MassPrunable trait', function (): void {
<<<<<<< HEAD
       $traits = class_uses_recursive(TemporaryUpload::class);
=======
        $traits = class_uses_recursive(TemporaryUpload::class);
>>>>>>> laraxot/dev

        expect(in_array('Illuminate\Database\Eloquent\MassPrunable', $traits, true))->toBeTrue();
    });

    it('has media connection', function (): void {
<<<<<<< HEAD
       $upload = new TemporaryUpload;
=======
        $upload = new TemporaryUpload;
>>>>>>> laraxot/dev

        expect($upload->getConnectionName())->toBe('media');
    });

    it('has empty guarded array', function (): void {
<<<<<<< HEAD
       $upload = new TemporaryUpload;
=======
        $upload = new TemporaryUpload;
>>>>>>> laraxot/dev

        expect($upload->getGuarded())->toBe([]);
    });

    it('has findByMediaUuid static method', function (): void {
<<<<<<< HEAD
       expect((new \ReflectionClass(TemporaryUpload::class))->hasMethod('findByMediaUuid'))->toBeTrue();
=======
        expect((new \ReflectionClass(TemporaryUpload::class))->hasMethod('findByMediaUuid'))->toBeTrue();
>>>>>>> laraxot/dev
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
    });
});
