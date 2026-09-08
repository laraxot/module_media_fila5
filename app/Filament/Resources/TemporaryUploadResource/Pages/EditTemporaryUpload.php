<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
=======
>>>>>>> 4e14511d (.)
use Filament\Actions\DeleteAction;
use Modules\Media\Filament\Resources\TemporaryUploadResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditTemporaryUpload extends XotBaseEditRecord
{
    protected static string $resource = TemporaryUploadResource::class;

    /**
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
=======
     * @return array<DeleteAction>
     *
     * @psalm-return list{DeleteAction}
>>>>>>> 4e14511d (.)
     */
    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            'delete' => DeleteAction::make(),
=======
            DeleteAction::make(),
>>>>>>> 4e14511d (.)
        ];
    }
}
