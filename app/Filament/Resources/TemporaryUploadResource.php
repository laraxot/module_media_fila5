<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources;

// use Modules\Media\Filament\Resources\TemporaryUploadResource\RelationManagers;
// use Filament\Forms;
use Modules\Media\Models\TemporaryUpload;
use Modules\Xot\Filament\Resources\XotBaseResource;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class TemporaryUploadResource extends XotBaseResource
{
    protected static ?string $model = TemporaryUpload::class;
}
