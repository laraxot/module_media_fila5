<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

use Filament\Schemas\Components\Component;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Media\Filament\Resources\MediaResource\Schemas\MediaInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ConvertMedia extends XotBaseViewRecord
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
}
