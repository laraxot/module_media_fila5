<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaConvertResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Media\Actions\Video\ConvertVideoByMediaConvertAction;
use Modules\Media\Datas\ConvertData;
use Modules\Media\Models\MediaConvert;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Spatie\QueueableAction\ActionJob;

class MediaConvertsTable extends XotBaseResourceTable
{
  
    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
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
     * @return array<string, BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'format' => SelectFilter::make('format')->options(MediaConvert::distinct()->pluck(
                'format',
                'format',
            )->toArray(...)),
            'codec_video' => SelectFilter::make('codec_video')->options(MediaConvert::distinct()->pluck(
                'codec_video',
                'codec_video',
            )->toArray(...)),
            'codec_audio' => SelectFilter::make('codec_audio')->options(MediaConvert::distinct()->pluck(
                'codec_audio',
                'codec_audio',
            )->toArray(...)),
        ];
    }

    /**
     * @return array<string, Action|ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            'view' => ViewAction::make(),
            'edit' => EditAction::make(),
            'convert' => Action::make('convert')->action(function (MediaConvert $record): void {
                $record->update(['percentage' => 0]);
                $data = ConvertData::from([
                    'file' => $record->file,
                    'disk' => $record->disk,
                ]);
                // `QueueableAction::onQueue()` restituisce una classe anonima non tipizzata:
                // PHPStan la vede `mixed` e ogni chiamata su di essa e' un errore. Il job
                // che quel proxy costruisce e' pubblico, quindi lo si accoda direttamente.
                dispatch(new ActionJob(app(ConvertVideoByMediaConvertAction::class), [$data, $record]));
            }),
        ];
    }

    /**
     * @return array<string, BulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }

   

    /**
     * @return array<string, Action|ActionGroup>
     */

}
