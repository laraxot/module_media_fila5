<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaConvertResource\Pages;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Modules\Job\Filament\Widgets\ClockWidget;
use Modules\Media\Filament\Resources\MediaConvertResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListMediaConverts extends XotBaseListRecords
{
    protected static string $resource = MediaConvertResource::class;

    /**
     * @return array<string, Tables\Columns\Column>
     */
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable(),
            'media.file_name' => TextColumn::make('media.file_name')->sortable(),
            'format' => TextColumn::make('format')->searchable(),
            'codec_video' => TextColumn::make('codec_video')->searchable(),
            'codec_audio' => TextColumn::make('codec_audio')->searchable(),
            'preset' => TextColumn::make('preset')->searchable(),
            'bitrate' => TextColumn::make('bitrate'),
            'width' => TextColumn::make('width')->numeric(),
            'height' => TextColumn::make('height')->numeric(),
            'threads' => TextColumn::make('threads')->numeric(),
            'speed' => TextColumn::make('speed')->numeric(),
            'percentage' => TextColumn::make('percentage')->numeric(),
            'remaining' => TextColumn::make('remaining')->numeric(),
            'rate' => TextColumn::make('rate')->numeric(),
            'execution_time' => TextColumn::make('execution_time')->numeric(),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getHeaderWidgets(): array
    {
        return [
            ClockWidget::class,
        ];
    }
}
