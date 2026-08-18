<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Filament\Resources;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Modules\Media\Filament\Resources\MediaConvertResource;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
=======
use Modules\Media\Tests\TestCase;
>>>>>>> laraxot/dev

uses(TestCase::class);

test('get form schema returns expected components', function (): void {
    $form = MediaConvertResource::getFormSchema();

<<<<<<< HEAD
    Assert::assertNotEmpty($form);

    $componentClasses = array_map(get_class(...), $form);

    Assert::assertContains(Radio::class, $componentClasses);
    Assert::assertContains(TextInput::class, $componentClasses);
=======
    expect($form)->toBeArray();
    expect($form)->not->toBeEmpty();

    $componentClasses = array_map(get_class(...), $form);

    expect($componentClasses)->toContain(Radio::class);
    expect($componentClasses)->toContain(TextInput::class);
>>>>>>> laraxot/dev
});
