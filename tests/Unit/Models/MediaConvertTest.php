<?php

declare(strict_types=1);

use Modules\Media\Models\BaseModel;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('MediaConvert Model', function (): void {
    it('extends BaseModel', function (): void {
        Assert::assertInstanceOf(BaseModel::class, new MediaConvert);
    });

    it('has correct fillable fields', function (): void {
        $fillable = (new MediaConvert)->getFillable();

        foreach ([
            'media_id',
            'format',
            'codec_video',
            'codec_audio',
            'preset',
            'bitrate',
            'width',
            'height',
            'threads',
            'speed',
            'percentage',
            'remaining',
            'rate',
            'execution_time',
        ] as $field) {
            Assert::assertContains($field, $fillable);
        }
    });

    it('has media relationship', function (): void {
        Assert::assertContains('media', get_class_methods(MediaConvert::class));
    });

    it('has connection', function (): void {
        Assert::assertSame('media', (new MediaConvert)->getConnectionName());
    });

    it('uses HasXotFactory trait', function (): void {
        $traits = class_uses_recursive(MediaConvert::class);

        Assert::assertTrue(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true));
    });
});
