<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\HasMediaResource\Schemas;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
=======
use Filament\Schemas\Components\Component;
>>>>>>> laraxot/dev
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class HasMediaForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<int|string, \Filament\Schemas\Components\Component>
     */

=======
     * @return array<int|string, Component>
     */
>>>>>>> laraxot/dev
    public static function getFormSchema(): array
    {
        return [
            Section::make([
                'name' => TextInput::make('name'),
            ]),
        ];
    }
}
