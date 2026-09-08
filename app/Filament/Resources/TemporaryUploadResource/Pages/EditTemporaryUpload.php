<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

<<<<<<< HEAD
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
>>>>>>> 9b998103 (.)
use Filament\Actions\DeleteAction;
use Modules\Media\Filament\Resources\TemporaryUploadResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditTemporaryUpload extends XotBaseEditRecord
{
    protected static string $resource = TemporaryUploadResource::class;

    /**
<<<<<<< HEAD
     * @return array<DeleteAction>
     *
     * @psalm-return list{DeleteAction}
=======
     * @return array<string, Action|ActionGroup>
>>>>>>> 9b998103 (.)
     */
    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            DeleteAction::make(),
=======
            'delete' => DeleteAction::make(),
>>>>>>> 9b998103 (.)
        ];
    }
}
