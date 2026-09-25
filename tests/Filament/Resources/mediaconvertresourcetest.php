<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Filament\Resources;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Modules\Media\Filament\Resources\MediaConvertResource;
use Tests\TestCase;

uses(TestCase::class);

test('get form schema returns expected components', function (): void {
<<<<<<< .merge_file_0XoCW3
    $form = app(MediaConvertResource::class)->getFormSchema();

=======
    $form = MediaConvertResource::getFormSchema();

    expect($form)->toBeArray();
>>>>>>> .merge_file_NKN0Ei
    expect($form)->not->toBeEmpty();

    $componentClasses = array_map(get_class(...), $form);

    expect($componentClasses)->toContain(Radio::class);
    expect($componentClasses)->toContain(TextInput::class);
});
