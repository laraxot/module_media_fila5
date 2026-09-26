<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
<<<<<<< HEAD
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> laraxot/dev
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\SelectFilter;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Media\Models\Media;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\BinaryFileResponse;
=======
use Override;
use RuntimeException;
>>>>>>> laraxot/dev
use Webmozart\Assert\Assert;

class ListMedia extends XotBaseListRecords
{
    protected static string $resource = MediaResource::class;

    /**
     * @return array<string, Tables\Columns\Column>
     */
<<<<<<< HEAD
=======
    
>>>>>>> laraxot/dev

    /**
     * @return array<string, BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'collection_name' => SelectFilter::make('collection_name')->options(Media::distinct()->pluck(
                'collection_name',
                'collection_name',
            )->toArray(...)),
            'mime_type' => SelectFilter::make('mime_type')->options(Media::distinct()->pluck(
                'mime_type',
                'mime_type',
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
            'view_attachment' => Action::make('view_attachment')
                ->icon('heroicon-s-eye')
                ->color('gray')
                ->url(static fn (Media $record): string => $record->getUrl())
                ->openUrlInNewTab(true),
            'delete' => DeleteAction::make()->requiresConfirmation(),
            'download' => Action::make('download_attachment')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('primary')
<<<<<<< HEAD
                ->action(static function (Media $record): BinaryFileResponse {
=======
                ->action(static function (mixed $record) {
                    // PHPStan Level 10: isset() per Eloquent magic property
                    if (! is_object($record) || ! method_exists($record, 'getPath') || ! isset($record->file_name)) {
                        throw new RuntimeException('Invalid record for download');
                    }
>>>>>>> laraxot/dev
                    $filePath = $record->getPath();
                    Assert::string($filePath, 'getPath must return string');
                    $fileName = $record->file_name;
                    Assert::string($fileName);

                    return response()->download($filePath, $fileName);
                }),
            'convert' => Action::make('convert')
                ->icon('media-convert')
                ->color('gray')
<<<<<<< HEAD
                ->url(static function (Media $record): string {
=======
                ->url(static function (mixed $record): string {
>>>>>>> laraxot/dev
                    Assert::string($res = static::$resource::getUrl('convert', ['record' => $record]));

                    return $res;
                })
                ->openUrlInNewTab(true),
        ];
    }
}
