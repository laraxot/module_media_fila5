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
    expect((new \ReflectionClass(BaseModel::class))->isSubclassOf(Model::class))->toBeTrue();
});

test('base model has correct table name', function (): void {
    expect(makeMediaTestBaseModel()->getTable())->toBe('test_media_table');
});

test('base model can be instantiated', function (): void {
    // La fixture e' una classe anonima che estende BaseModel: cio' che il test puo'
    // verificare e' che la classe base sia istanziabile per derivazione, non che
    // `new` restituisca il proprio tipo.
    expect((new \ReflectionClass(makeMediaTestBaseModel()))->isSubclassOf(BaseModel::class))->toBeTrue();
});

test('base model has proper inheritance chain', function (): void {
    $reflection = new \ReflectionClass(makeMediaTestBaseModel());

    expect($reflection->isSubclassOf(BaseModel::class))->toBeTrue();
    expect($reflection->isSubclassOf(Model::class))->toBeTrue();
});

test('base model has timestamps enabled', function (): void {
    expect(makeMediaTestBaseModel()->usesTimestamps())->toBeTrue();
});
