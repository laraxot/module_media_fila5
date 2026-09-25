<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Models\BaseModel;
use Modules\Media\Tests\TestCase;

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
<<<<<<< .merge_file_v9eEPL
    expect(get_parent_class(BaseModel::class))->toBe(Model::class);
=======
    expect(makeMediaTestBaseModel())->toBeInstanceOf(Model::class);
>>>>>>> .merge_file_loTIKN
});

test('base model has correct table name', function (): void {
    expect(makeMediaTestBaseModel()->getTable())->toBe('test_media_table');
});

<<<<<<< .merge_file_v9eEPL
=======
test('base model can be instantiated', function (): void {
    expect(makeMediaTestBaseModel())->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function (): void {
    $model = makeMediaTestBaseModel();
    expect($model)->toBeInstanceOf(BaseModel::class);
    expect($model)->toBeInstanceOf(Model::class);
});

>>>>>>> .merge_file_loTIKN
test('base model has timestamps enabled', function (): void {
    expect(makeMediaTestBaseModel()->usesTimestamps())->toBeTrue();
});
