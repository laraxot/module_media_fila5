<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\Media\Models\TemporaryUpload;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Override;

class TemporaryUploadsTable extends XotBaseResourceTable
{
    /**
     * @return array<string, Column>
     */
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'file_name' => TextColumn::make('file_name')->searchable()->sortable()->wrap(),
            'mime_type' => TextColumn::make('mime_type')->searchable()->sortable()->badge(),
            'file_size' => TextColumn::make('file_size')->numeric()->sortable()->suffix(' B'),
            'status' => TextColumn::make('status')->searchable()->sortable()->badge(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }

    /**
     * @return array<string, SelectFilter>
     */
    #[Override]
    public function getTableFilters(): array
    {
        return [
            'status' => SelectFilter::make('status')->options(TemporaryUpload::distinct()->pluck(
                'status',
                'status',
            )->toArray(...)),
        ];
    }

    /**
     * @return array<string, ViewAction|EditAction|DeleteAction>
     */
    #[Override]
    public function getTableActions(): array
    {
        return [
            'view' => ViewAction::make(),
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }

    /**
     * @return array<string, DeleteBulkAction>
     */
    #[Override]
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
