<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\HasMediaResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Media\Models\Media;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class HasMediasTable extends XotBaseResourceTable
{
    /**
     * Nessuna HasMediaResource esiste (vedi MediaRelationManager): questa Table
     * non e' mai risolta da XotBaseResource::getTableClass(), ma la relazione
     * 'media' che dovrebbe alimentarla restituisce sempre record Media.
     *
     * @var class-string<Media>
     */
    protected static string $model = Media::class;

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable()->wrap(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
