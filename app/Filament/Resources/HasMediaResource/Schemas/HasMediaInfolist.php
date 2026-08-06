<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\HasMediaResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> 7605234 (.)
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class HasMediaInfolist extends XotBaseResourceInfolist
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> 33a3006 (.)
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> 766d652 (.)
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> 7605234 (.)
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
        ];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 7605234 (.)
