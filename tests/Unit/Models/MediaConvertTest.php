<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Modules\Media\Models\BaseModel;
use Modules\Media\Models\MediaConvert;
<<<<<<< HEAD
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('MediaConvert Model', function () {
    it('extends BaseModel', function (): void {
        // Assert
        expect(is_a(MediaConvert::class, BaseModel::class, true))->toBeTrue();
    });

    it('has correct fillable fields', function (): void {
        // Arrange
        $model = new MediaConvert;

        // Assert
=======

uses(\Modules\Media\Tests\TestCase::class);

describe('MediaConvert Model', function (): void {
    it('extends BaseModel', function (): void {
        expect(new MediaConvert)->toBeInstanceOf(BaseModel::class);
    });

    it('has correct fillable fields', function (): void {
        $model = new MediaConvert;

>>>>>>> be7d0c3 (.)
        expect($model->getFillable())->toContain('media_id');
        expect($model->getFillable())->toContain('format');
        expect($model->getFillable())->toContain('codec_video');
        expect($model->getFillable())->toContain('codec_audio');
        expect($model->getFillable())->toContain('preset');
        expect($model->getFillable())->toContain('bitrate');
        expect($model->getFillable())->toContain('width');
        expect($model->getFillable())->toContain('height');
        expect($model->getFillable())->toContain('threads');
        expect($model->getFillable())->toContain('speed');
        expect($model->getFillable())->toContain('percentage');
        expect($model->getFillable())->toContain('remaining');
        expect($model->getFillable())->toContain('rate');
        expect($model->getFillable())->toContain('execution_time');
    });

    it('has media relationship', function (): void {
<<<<<<< HEAD
        // Arrange
        $model = new MediaConvert;

        // Assert
        expect(method_exists($model, 'media'))->toBeTrue();
    });

    it('has getDiskAttribute accessor', function (): void {
        // Assert
        expect(method_exists(MediaConvert::class, 'getDiskAttribute'))->toBeTrue();
    });

    it('has getFileAttribute accessor', function (): void {
        // Assert
        expect(method_exists(MediaConvert::class, 'getFileAttribute'))->toBeTrue();
    });

    it('has getConvertedFileAttribute accessor', function (): void {
        // Assert
        expect(method_exists(MediaConvert::class, 'getConvertedFileAttribute'))->toBeTrue();
    });

    it('has connection', function (): void {
        // Arrange
        $model = new MediaConvert;

        // Assert
=======
        $model = new MediaConvert;

        expect((new \ReflectionClass($model))->hasMethod('media'))->toBeTrue();
    });

    it('has getDiskAttribute accessor', function (): void {
        expect((new \ReflectionClass(MediaConvert::class))->hasMethod('getDiskAttribute'))->toBeTrue();
    });

    it('has getFileAttribute accessor', function (): void {
        expect((new \ReflectionClass(MediaConvert::class))->hasMethod('getFileAttribute'))->toBeTrue();
    });

    it('has getConvertedFileAttribute accessor', function (): void {
        expect((new \ReflectionClass(MediaConvert::class))->hasMethod('getConvertedFileAttribute'))->toBeTrue();
    });

    it('has connection', function (): void {
        $model = new MediaConvert;

>>>>>>> be7d0c3 (.)
        expect($model->getConnectionName())->toBe('media');
    });

    it('uses HasXotFactory trait', function (): void {
<<<<<<< HEAD
        // Arrange
        $traits = class_uses_recursive(MediaConvert::class);

        // Assert
=======
        $traits = class_uses_recursive(MediaConvert::class);

>>>>>>> be7d0c3 (.)
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
    });
});
