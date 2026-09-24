<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Schemas\Components\Component;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Media\Filament\Resources\MediaResource\Schemas\MediaInfolist;
use Modules\Media\Filament\Resources\MediaResource\Widgets\ConvertWidget;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewMedia extends XotBaseViewRecord
{
    protected static string $resource = MediaResource::class;

    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(MediaInfolist::class)->getInfolistSchema();
    }

    /**
     * @return array<string, DeleteAction>
     */
    protected function getHeaderActions(): array
    {
        return [
            'delete' => DeleteAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ConvertWidget::make(['record' => $this->record]),
        ];
    }
}
