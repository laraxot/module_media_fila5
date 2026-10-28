<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Tables\Columns;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
use Filament\Tables\Columns\IconColumn;
>>>>>>> ec2b884b (.)
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Modules\Xot\Filament\Tables\Columns\XotBaseIconColumn;

<<<<<<< HEAD
// phpmd: CyclomaticComplexity, NPathComplexity — setUp Filament con branching mime/icon
class IconMediaColumn extends XotBaseIconColumn
=======
class IconMediaColumn extends IconColumn
>>>>>>> ec2b884b (.)
{
    protected function setUp(): void
    {
        parent::setUp();
        $attachment = $this->getName();

<<<<<<< HEAD
        $this->default(static function (?Model $record) use ($attachment) {
=======
        $this->default(function (mixed $record) use ($attachment) {
>>>>>>> ec2b884b (.)
            if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                return $record->getFirstMedia($attachment);
            }

        })
            ->icon('heroicon-o-document-text')
<<<<<<< HEAD
            ->color(static function (?Model $record) use ($attachment): string {
=======
            ->color(function (mixed $record) use ($attachment): string {
>>>>>>> ec2b884b (.)
                if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                    return $record->getFirstMedia($attachment) ? 'success' : 'danger';
                }

                return 'danger';
            })
<<<<<<< HEAD
            ->tooltip(static function (?Model $record) use ($attachment): string {
=======
            ->tooltip(function (mixed $record) use ($attachment): string {
>>>>>>> ec2b884b (.)
                if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                    $media = $record->getFirstMedia($attachment);
                    if (is_object($media) && isset($media->file_name) && is_string($media->file_name)) {
                        return $media->file_name;
                    }
                }

                return 'Documento non caricato';
            })
            ->action(function (array $arguments, Request $request) use ($attachment) {
                // Skip action if record is not available or doesn't have media capabilities
                if (! isset($arguments['record'])) {
                    return;
                }

                $record = $arguments['record'];

                // Verify record is an object and has the required method
                if (! is_object($record) || ! method_exists($record, 'getFirstMedia')) {
                    return;
                }

                /** @var Media|null $media */
                $media = $record->getFirstMedia($attachment);
                if ($media === null) {
                    return;
                }

                return $media->toInlineResponse($request);

                // return $media->toResponse($request);
                // return Storage::disk($media->disk)->download($media->getPathRelativeToRoot());
                // return Storage::disk($media->disk)
                //    ->temporaryUploadUrl($media->getPathRelativeToRoot(),now()->addMinutes(5));
                // return response()->streamDownload(function () use ($media) {
                //    echo $media->get();
                // }, $media->file_name);
                // $headers=[
                //    'Content-Type' => $media->mime_type,
                //    'Content-Disposition' => 'inline; filename="' . basename($media->getPathRelativeToRoot()) . '"'
                // ];
                // $path = Storage::disk($media->disk)->path($media->getPathRelativeToRoot());
                // return response()->file($path, $headers);

                // return Storage::disk($media->disk)->response($media->getPathRelativeToRoot(), null, $headers);
            });
    }
}
