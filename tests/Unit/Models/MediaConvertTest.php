<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

uses(\Modules\Media\Tests\TestCase::class);

use Modules\Media\Models\BaseModel;
use Modules\Media\Models\MediaConvert;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

<<<<<<< .merge_file_Dw6aYY
uses(TestCase::class);

describe('MediaConvert Model', function (): void {
    it('extends BaseModel', function (): void {
        Assert::assertInstanceOf(BaseModel::class, new MediaConvert);
=======
describe('MediaConvert Model', function () {
    it('extends BaseModel', function (): void {
        // Assert
        expect(is_a(MediaConvert::class, BaseModel::class, true))->toBeTrue();
>>>>>>> .merge_file_cL9XAx
    });

    it('has correct fillable fields', function (): void {
        // Arrange
        $model = new MediaConvert;

<<<<<<< .merge_file_Dw6aYY
        Assert::assertSame([
            'media_id', 'format', 'codec_video', 'codec_audio', 'preset', 'bitrate',
            'width', 'height', 'threads', 'speed', 'percentage', 'remaining', 'rate',
            'execution_time',
        ], $model->getFillable());
=======
        // Assert
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
>>>>>>> .merge_file_cL9XAx
    });

    it('has media relationship', function (): void {
        // Arrange
        $model = new MediaConvert;

<<<<<<< .merge_file_Dw6aYY
        Assert::assertTrue((new \ReflectionClass($model))->hasMethod('media'));
    });

    it('has getDiskAttribute accessor', function (): void {
        Assert::assertTrue((new \ReflectionClass(MediaConvert::class))->hasMethod('getDiskAttribute'));
    });

    it('has getFileAttribute accessor', function (): void {
        Assert::assertTrue((new \ReflectionClass(MediaConvert::class))->hasMethod('getFileAttribute'));
    });

    it('has getConvertedFileAttribute accessor', function (): void {
        Assert::assertTrue((new \ReflectionClass(MediaConvert::class))->hasMethod('getConvertedFileAttribute'));
=======
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
>>>>>>> .merge_file_cL9XAx
    });

    it('has connection', function (): void {
        // Arrange
        $model = new MediaConvert;

<<<<<<< .merge_file_Dw6aYY
        Assert::assertSame('media', $model->getConnectionName());
=======
        // Assert
        expect($model->getConnectionName())->toBe('media');
>>>>>>> .merge_file_cL9XAx
    });

    it('uses HasXotFactory trait', function (): void {
        // Arrange
        $traits = class_uses_recursive(MediaConvert::class);

<<<<<<< .merge_file_Dw6aYY
        Assert::assertContains('Modules\Xot\Models\Traits\HasXotFactory', $traits);
=======
        // Assert
        expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true))->toBeTrue();
>>>>>>> .merge_file_cL9XAx
    });
});
