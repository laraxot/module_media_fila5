<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

use Modules\Media\Filament\Resources\MediaResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\Media\Filament\Resources\MediaResource\Schemas\MediaInfolist;

class ConvertMedia extends XotBaseViewRecord
{
    protected static string $resource = MediaResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(MediaInfolist::class)->getInfolistSchema();
    }
}
