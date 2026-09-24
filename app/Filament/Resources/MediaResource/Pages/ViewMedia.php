<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Modules\Media\Datas\ConvertData;
use Modules\Media\Filament\Infolists\VideoEntry;
use Modules\Media\Filament\Resources\MediaConvertResource\Schemas\MediaConvertForm;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Media\Filament\Resources\MediaResource\Widgets\ConvertWidget;
use Modules\Media\Models\Media;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Override;
use UnexpectedValueException;

class ViewMedia extends XotBaseViewRecord
{
    protected static string $resource = MediaResource::class;

    /**
     * Restituisce lo schema dell'infolist per la visualizzazione dei dettagli del record.
     *
     * @return array<string, Component>
     */
    #[Override]
    protected function getInfolistSchema(): array
    {
        return [
            'media_grid' => Grid::make(2)
                ->schema([
                    'media_preview' => Section::make()->schema([
                        ImageEntry::make('url')
                            ->defaultImageUrl(fn (Media $record): string => $record->getUrl())
                            ->imageSize(500)
                            ->visible(fn (Media $record): bool => $record->type === 'image'),
                        VideoEntry::make('url')
                            ->defaultImageUrl(fn (Media $record): string => $record->getUrl())
                            ->size(500)
                            ->visible(fn (Media $record): bool => $record->type === 'video'),
                    ]),
                    'media_details' => Section::make()->schema([
                        Actions::make([
                            Action::make('convert')
                                ->tooltip('convert')
                                ->icon('heroicon-o-scale')
                                ->schema(app(MediaConvertForm::class)->getFormSchema())
                                ->action(function (Media $record, array $data): void {
                                    $convertData = ConvertData::from([
                                        ...$data,
                                        'disk' => $record->disk,
                                        'file' => $record->getPathRelativeToRoot(),
                                    ]);

                                    $record->mediaConverts()->create([
                                        'format' => $convertData->format,
                                        'codec_video' => $convertData->codec_video,
                                        'codec_audio' => $convertData->codec_audio,
                                        'preset' => $convertData->preset,
                                        'bitrate' => $convertData->bitrate,
                                        'width' => $convertData->width,
                                        'height' => $convertData->height,
                                        'threads' => $convertData->threads,
                                        'speed' => $convertData->speed,
                                    ]);
                                }),
                        ]),
                        TextEntry::make('name'),
                        TextEntry::make('collection_name'),
                        TextEntry::make('mime_type'),
                        TextEntry::make('human_readable_size'),
                        TextEntry::make('created_at'),
                    ]),
                ]),
            'conversions' => RepeatableEntry::make('entry_conversions')
                ->schema([
                    TextEntry::make('name'),
                    TextEntry::make('src'),
                    ImageEntry::make('src'),
                ])
                ->columns(4),
        ];
    }

    /**
     * @return array<string, Action|ActionGroup>
     */
    protected function getHeaderActions(): array
    {
        return [
            'delete' => DeleteAction::make(),
        ];
    }

    /**
     * @return array<class-string<Widget>|WidgetConfiguration>
     */
    protected function getHeaderWidgets(): array
    {
        $record = $this->getRecord();
        if (! $record instanceof Media) {
            throw new UnexpectedValueException('The media view requires a Media record.');
        }

        return [
            ConvertWidget::make(['record' => $record]),
        ];
    }
}
