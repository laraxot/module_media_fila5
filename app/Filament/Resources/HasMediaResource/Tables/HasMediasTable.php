<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\HasMediaResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class HasMediasTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @return array<int|string, Column>
=======
     * @return array<int|string, \Filament\Tables\Columns\Column>
>>>>>>> 9aef2ca (.)
     */
    public function getTableColumns(): array
    {
    /**
     * @return array<int\|string, \Filament\Tables\Columns\Column>
     */
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
