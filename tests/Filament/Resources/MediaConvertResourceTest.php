<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Filament\Resources;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Modules\Media\Filament\Resources\MediaConvertResource\Schemas\MediaConvertForm;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('get form schema returns expected components', function (): void {
    $form = app(MediaConvertForm::class)->getFormSchema();

    Assert::assertIsArray($form);
    Assert::assertNotEmpty($form);

    $componentClasses = array_map(get_class(...), array_values($form));

    Assert::assertContains(Radio::class, $componentClasses);
    Assert::assertContains(TextInput::class, $componentClasses);
});
