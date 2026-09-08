<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources;

use Filament\Resources\Pages\PageRegistration;
use Modules\Media\Filament\Resources\MediaResource\Pages\ConvertMedia;
use Modules\Media\Filament\Resources\MediaResource\Pages\CreateMedia;
use Modules\Media\Filament\Resources\MediaResource\Pages\EditMedia;
use Modules\Media\Filament\Resources\MediaResource\Pages\ListMedia;
use Modules\Media\Filament\Resources\MediaResource\Pages\ViewMedia;
use Modules\Media\Models\Media;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class MediaResource extends XotBaseResource
{
    protected static ?string $model = Media::class;

    /**
     * Elenco esplicito delle pagine: `parent::getPages()` dichiara un
     * `array<string, PageRegistration>` generico (le chiavi sono risolte
     * per convenzione a runtime), quindi PHPStan non può restringere lo
     * spread a questo shape fisso. Le pagine sono elencate qui in modo
     * esplicito perché lo shape sia verificabile staticamente.
     *
     * @return array{index: PageRegistration, create: PageRegistration, edit: PageRegistration, view: PageRegistration, convert: PageRegistration}
     */
    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListMedia::route('/'),
            'create' => CreateMedia::route('/create'),
            'edit' => EditMedia::route('/{record}/edit'),
            'view' => ViewMedia::route('/{record}'),
            'convert' => ConvertMedia::route('/{record}/convert'),
        ];
    }
}
