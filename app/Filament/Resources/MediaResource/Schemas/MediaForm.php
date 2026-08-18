<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Schemas;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
=======
use Filament\Schemas\Components\Component;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class MediaForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> laraxot/dev
     */
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name'),
            'file_name' => TextInput::make('file_name'),
            'mime_type' => TextInput::make('mime_type'),
            'disk' => TextInput::make('disk'),
            'size' => TextInput::make('size')->numeric(),
            'collection_name' => TextInput::make('collection_name'),
        ];
    }
}
