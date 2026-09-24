<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
use Filament\Schemas\Components\Component;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Media\Filament\Resources\MediaResource\Schemas\MediaInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
<<<<<<< HEAD
=======
=======
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Override;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

class ConvertMedia extends XotBaseViewRecord
{
    protected static string $resource = MediaResource::class;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(MediaInfolist::class)->getInfolistSchema();
    }
<<<<<<< HEAD
=======
=======
    
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
}
