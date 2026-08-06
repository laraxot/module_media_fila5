<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
=======
>>>>>>> laraxot/dev
use Filament\Actions\DeleteAction;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditMedia extends XotBaseEditRecord
{
    protected static string $resource = MediaResource::class;

    /**
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
=======
     * @return array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
>>>>>>> laraxot/dev
     */
    protected function getHeaderActions(): array
    {
        return [
            'delete' => DeleteAction::make(),
        ];
    }
}
