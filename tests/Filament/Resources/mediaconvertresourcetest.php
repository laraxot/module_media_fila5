<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Filament\Resources;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Modules\Media\Filament\Resources\MediaConvertResource;
use Tests\TestCase;

uses(TestCase::class);

test('get form schema returns expected components', function (): void {
<<<<<<< HEAD
    $form = MediaConvertResource::getFormSchema();

    expect($form)->toBeArray();
=======
    $form = app(MediaConvertResource::class)->getFormSchema();
>>>>>>> laraxot/dev
    expect($form)->not->toBeEmpty();

    $componentClasses = array_map(get_class(...), $form);

    expect($componentClasses)->toContain(Radio::class);
    expect($componentClasses)->toContain(TextInput::class);
});
