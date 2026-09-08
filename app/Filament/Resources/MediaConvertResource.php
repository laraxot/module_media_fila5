<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources;

use Modules\Media\Models\MediaConvert;
use Modules\Xot\Filament\Resources\XotBaseResource;

class MediaConvertResource extends XotBaseResource
{
    protected static ?string $model = MediaConvert::class;
}
