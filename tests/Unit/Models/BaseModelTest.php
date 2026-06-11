<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Models\BaseModel;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;
use ReflectionClass;

class BaseModelTest extends TestCase
{
    #[Test]
    public function base_model_extends_eloquent_model(): void
    {
        $reflection = new ReflectionClass(BaseModel::class);

        Assert::assertTrue($reflection->isSubclassOf(Model::class));
    }

    #[Test]
    public function base_model_can_be_extended_with_custom_table(): void
    {
        $model = new class extends BaseModel
        {
            protected $table = 'test_media_table';
        };

        Assert::assertSame('test_media_table', $model->getTable());
    }

    #[Test]
    public function base_model_has_timestamps_enabled(): void
    {
        $model = new class extends BaseModel
        {
            protected $table = 'test_media_table';
        };

        Assert::assertTrue($model->usesTimestamps());
    }
}
