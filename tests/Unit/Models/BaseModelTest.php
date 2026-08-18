<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Models\BaseModel;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
=======
use Modules\Media\Tests\TestCase;
>>>>>>> laraxot/dev

uses(TestCase::class);

if (! function_exists(__NAMESPACE__.'\\makeMediaTestBaseModel')) {
    function makeMediaTestBaseModel(): BaseModel
    {
        return new class extends BaseModel
        {
            protected $table = 'test_media_table';
        };
    }
}

test('base model extends eloquent model', function (): void {
<<<<<<< HEAD
    Assert::assertInstanceOf(Model::class, makeMediaTestBaseModel());
});

test('base model has correct table name', function (): void {
    Assert::assertSame('test_media_table', makeMediaTestBaseModel()->getTable());
});

test('base model can be instantiated', function (): void {
    Assert::assertInstanceOf(BaseModel::class, makeMediaTestBaseModel());
=======
    expect(makeMediaTestBaseModel())->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function (): void {
    expect(makeMediaTestBaseModel()->getTable())->toBe('test_media_table');
});

test('base model can be instantiated', function (): void {
    expect(makeMediaTestBaseModel())->toBeInstanceOf(BaseModel::class);
>>>>>>> laraxot/dev
});

test('base model has proper inheritance chain', function (): void {
    $model = makeMediaTestBaseModel();
<<<<<<< HEAD
    Assert::assertInstanceOf(BaseModel::class, $model);
    Assert::assertInstanceOf(Model::class, $model);
});

test('base model has timestamps enabled', function (): void {
    Assert::assertTrue(makeMediaTestBaseModel()->usesTimestamps());
=======
    expect($model)->toBeInstanceOf(BaseModel::class);
    expect($model)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function (): void {
    expect(makeMediaTestBaseModel()->usesTimestamps())->toBeTrue();
>>>>>>> laraxot/dev
});
