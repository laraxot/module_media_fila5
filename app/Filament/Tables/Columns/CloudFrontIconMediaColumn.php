<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Tables\Columns;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Actions\CloudFront\GetCloudFrontSignedUrlAction;
use Modules\Xot\Filament\Tables\Columns\XotBaseIconColumn as IconColumn;

// phpmd: CyclomaticComplexity, NPathComplexity — setUp Filament con branching mime/icon
class CloudFrontIconMediaColumn extends IconColumn
{
    protected function setUp(): void
    {
        parent::setUp();
        $attachment = $this->getName();

        $this->default(static function (?Model $record) use ($attachment) {
            if ($record !== null && method_exists($record, 'getFirstMedia')) {
                return $record->getFirstMedia($attachment);
            }
        })
            ->icon('heroicon-o-document-text')
            ->color(static function (?Model $record) use ($attachment): string {
                if ($record !== null && method_exists($record, 'getFirstMedia')) {
                    return $record->getFirstMedia($attachment) ? 'success' : 'danger';
                }

                return 'danger';
            })
            ->tooltip(static function (?Model $record) use ($attachment): string {
                if ($record !== null && method_exists($record, 'getFirstMedia')) {
                    $media = $record->getFirstMedia($attachment);
                    if (is_object($media) && isset($media->file_name) && is_string($media->file_name)) {
                        return $media->file_name;
                    }
                }

                return 'Documento non caricato';
            })
            ->url(static function (?Model $record) use ($attachment): ?string {
                if ($record === null || ! method_exists($record, 'getFirstMedia')) {
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
