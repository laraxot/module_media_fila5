<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Filament\Resources;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Modules\Media\Filament\Resources\MediaConvertResource;
<<<<<<< .merge_file_WXhHZL
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
=======
use Tests\TestCase;
>>>>>>> .merge_file_tzlzx9

uses(TestCase::class);

test('get form schema returns expected components', function (): void {
    $form = MediaConvertResource::getFormSchema();

    Assert::assertNotEmpty($form);

    $componentClasses = array_map(get_class(...), $form);

    Assert::assertContains(Radio::class, $componentClasses);
    Assert::assertContains(TextInput::class, $componentClasses);
});
