<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\HasMediaResource\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class HasMediaForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<int|string, Component>
=======
     * @return array<int|string, \Filament\Schemas\Components\Component>
>>>>>>> 9aef2ca (.)
     */
    public static function getFormSchema(): array
    {
        return [
            Section::make([
                'name' => TextInput::make('name'),
            ]),
        ];
    }
}
