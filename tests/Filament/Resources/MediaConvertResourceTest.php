<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Filament\Resources;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Modules\Media\Filament\Resources\MediaConvertResource;
=======
use Modules\Media\Filament\Resources\MediaConvertResource\Schemas\MediaConvertForm;
>>>>>>> laraxot/dev
use Modules\Media\Tests\TestCase;

uses(TestCase::class);

test('get form schema returns expected components', function (): void {
<<<<<<< HEAD
    $form = (new \Modules\Media\Filament\Resources\MediaConvertResource\Schemas\MediaConvertForm())->getFormSchema();
=======
    $form = (new MediaConvertForm)->getFormSchema();
>>>>>>> laraxot/dev

    expect($form)->not->toBeEmpty();

    $componentClasses = array_map(get_class(...), $form);

    expect($componentClasses)->toContain(Radio::class);
    expect($componentClasses)->toContain(TextInput::class);
});
