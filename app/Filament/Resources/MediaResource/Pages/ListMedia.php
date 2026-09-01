<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListMedia extends XotBaseListRecords
{
    protected static string $resource = MediaResource::class;

    /**
     * @return array<string, Tables\Columns\Column>
     */
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable()->searchable(),
            'model_type' => TextColumn::make('model_type')->searchable(),
            'model_id' => TextColumn::make('model_id')->searchable(),
            'collection_name' => TextColumn::make('collection_name')->searchable(),
            'name' => TextColumn::make('name')->searchable(),
            'file_name' => TextColumn::make('file_name')->searchable(),
            'mime_type' => TextColumn::make('mime_type')->searchable(),
            'disk' => TextColumn::make('disk')->searchable(),
            'size' => TextColumn::make('size')->formatStateUsing(fn (string $state): string => number_format(
                ((int) $state) / 1024,
                2,
            ).' KB'),
            'created_at' => TextColumn::make('created_at')->dateTime(),
        ];
    }
}
