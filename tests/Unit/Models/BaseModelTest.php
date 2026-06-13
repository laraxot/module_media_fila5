<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Models\BaseModel;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Media\Tests\TestCase::class);

describe('Base Model', function (): void {
    test('base model extends eloquent model', function (): void {
$reflection = new \ReflectionClass(BaseModel::class);

        Assert::assertTrue($reflection->isSubclassOf(Model::class));
    });

    test('base model can be extended with custom table', function (): void {
$model = new class extends BaseModel
        {
            protected $table = 'test_media_table';
        };

        Assert::assertSame('test_media_table', $model->getTable());
    });

    test('base model has timestamps enabled', function (): void {
$model = new class extends BaseModel
        {
            protected $table = 'test_media_table';
        };

        Assert::assertTrue($model->usesTimestamps());
    });
});
