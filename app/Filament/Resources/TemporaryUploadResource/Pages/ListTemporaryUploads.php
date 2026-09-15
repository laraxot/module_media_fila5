<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
<<<<<<< HEAD
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> laraxot/dev
use Filament\Tables\Filters\SelectFilter;
use Modules\Media\Filament\Resources\TemporaryUploadResource;
use Modules\Media\Models\TemporaryUpload;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListTemporaryUploads extends XotBaseListRecords
{
    protected static string $resource = TemporaryUploadResource::class;

    /**
<<<<<<< HEAD
     * @return array<string, SelectFilter>
     */
    #[Override]
=======
     * @return array<string, TextColumn>
     */
    

    /**
     * @return array<string, SelectFilter>
     */
>>>>>>> laraxot/dev
    public function getTableFilters(): array
    {
        return [
            'folder' => SelectFilter::make('folder')->options(TemporaryUpload::distinct()->pluck(
                'folder',
                'folder',
            )->toArray(...)),
        ];
    }

    /**
     * @return array<string, ViewAction|EditAction|DeleteAction>
     */
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> laraxot/dev
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
