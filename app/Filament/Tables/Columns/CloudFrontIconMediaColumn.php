<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Tables\Columns;

<<<<<<< HEAD
use Modules\Media\Actions\CloudFront\GetCloudFrontSignedUrlAction;
use Modules\Xot\Filament\Tables\Columns\XotBaseIconColumn as IconColumn;

// phpmd: CyclomaticComplexity, NPathComplexity — setUp Filament con branching mime/icon
=======
use Filament\Tables\Columns\IconColumn;
use Modules\Media\Actions\CloudFront\GetCloudFrontSignedUrlAction;

>>>>>>> 4e14511d (.)
class CloudFrontIconMediaColumn extends IconColumn
{
    protected function setUp(): void
    {
        parent::setUp();
        $attachment = $this->getName();

<<<<<<< HEAD
        $this->default(static function (mixed $record) use ($attachment) {
            if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                return $record->getFirstMedia($attachment);
            }
        })
            ->icon('heroicon-o-document-text')
            ->color(static function (mixed $record) use ($attachment): string {
=======
        $this->default(function ($record) use ($attachment) {
            if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                return $record->getFirstMedia($attachment);
            }

            return null;
        })
            ->icon('heroicon-o-document-text')
            ->color(function ($record) use ($attachment): string {
>>>>>>> 4e14511d (.)
                if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                    return $record->getFirstMedia($attachment) ? 'success' : 'danger';
                }

                return 'danger';
            })
<<<<<<< HEAD
            ->tooltip(static function (mixed $record) use ($attachment): string {
=======
            ->tooltip(function ($record) use ($attachment): string {
>>>>>>> 4e14511d (.)
                if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                    $media = $record->getFirstMedia($attachment);
                    if (is_object($media) && isset($media->file_name) && is_string($media->file_name)) {
                        return $media->file_name;
                    }
                }

                return 'Documento non caricato';
            })
<<<<<<< HEAD
            ->url(static function (mixed $record) use ($attachment): ?string {
=======
            ->url(function ($record) use ($attachment): ?string {
>>>>>>> 4e14511d (.)
                if (! is_object($record) || ! method_exists($record, 'getFirstMedia')) {
                    return null;
                }

                $media = $record->getFirstMedia($attachment);
                if (! is_object($media) || ! method_exists($media, 'getPath')) {
                    return null;
                }

                $path = $media->getPath();
                if (! is_string($path)) {
                    return null;
                }

                return app(GetCloudFrontSignedUrlAction::class)->execute($path, 60);
            })
            ->openUrlInNewTab();
    }
}
