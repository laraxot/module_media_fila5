<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Media\Filament\Resources\MediaResource\Schemas\MediaInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
=======
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Override;
>>>>>>> laraxot/dev

class ConvertMedia extends XotBaseViewRecord
{
    protected static string $resource = MediaResource::class;

<<<<<<< HEAD
    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(MediaInfolist::class)->getInfolistSchema();
    }
=======
    
>>>>>>> laraxot/dev
}
