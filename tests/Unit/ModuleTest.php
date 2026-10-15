<?php
namespace Modules\Media\Tests\Unit;

use Modules\Media\Tests\TestCase;
use Modules\Media\Models\Media;

it('has main model class', function () {
    expect(class_exists(Media::class))->toBeTrue();
});
