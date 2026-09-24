<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Models\BaseModel;
use Modules\Media\Tests\TestCase;
use Modules\Xot\Models\XotBaseModel;

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
    expect(get_parent_class(BaseModel::class))->toBe(XotBaseModel::class);
});

test('base model has correct table name', function (): void {
    expect(makeMediaTestBaseModel()->getTable())->toBe('test_media_table');
});

test('base model can be instantiated', function (): void {
    expect(get_class(makeMediaTestBaseModel()))->toContain('@anonymous');
});

test('base model has proper inheritance chain', function (): void {
    $model = makeMediaTestBaseModel();
    expect(get_class($model))->toContain('@anonymous');
    expect(is_subclass_of(get_class($model), Model::class))->toBeTrue();
});

test('base model has timestamps enabled', function (): void {
    expect(makeMediaTestBaseModel()->usesTimestamps())->toBeTrue();
});
