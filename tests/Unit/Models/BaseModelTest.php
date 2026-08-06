<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Models\BaseModel;
use Modules\Media\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
if (! function_exists(__NAMESPACE__.'\\makeMediaTestBaseModel')) {
    function makeMediaTestBaseModel(): BaseModel
=======
beforeEach(function () {
    $this->baseModel = new class extends BaseModel
>>>>>>> d2bb446 (.)
=======
if (! function_exists(__NAMESPACE__.'\\makeMediaTestBaseModel')) {
    function makeMediaTestBaseModel(): BaseModel
>>>>>>> 7605234 (.)
    {
        return new class extends BaseModel
        {
            protected $table = 'test_media_table';
        };
    }
}

test('base model extends eloquent model', function (): void {
    expect(makeMediaTestBaseModel())->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function (): void {
    expect(makeMediaTestBaseModel()->getTable())->toBe('test_media_table');
});

test('base model can be instantiated', function (): void {
    expect(makeMediaTestBaseModel())->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function (): void {
    $model = makeMediaTestBaseModel();
    expect($model)->toBeInstanceOf(BaseModel::class);
    expect($model)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function (): void {
    expect(makeMediaTestBaseModel()->usesTimestamps())->toBeTrue();
});
