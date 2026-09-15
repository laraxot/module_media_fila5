<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;

class GetAttachmentsSchemaAction
{
    /**
     * @param  array<string|int, string>  $attachments
     * @return array<int, FileUpload>
     */
    public function execute(array $attachments, string $disk = 'attachments'): array
    {
        $form = [];

        foreach ($attachments as $attachment) {
            $attachmentStr = (string) $attachment;
            $fileUpload = FileUpload::make($attachmentStr)
<<<<<<< HEAD
=======
                // $fileUpload=SpatieMediaLibraryFileUpload::make($attachmentStr)
>>>>>>> laraxot/dev
                ->directory('temp')
                ->disk($disk)
                ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                ->maxSize(10 * 1024)
                ->visibility('public')
                ->preserveFilenames()
                ->required()
                ->previewable(true)
                ->downloadable(true)
                ->reorderable(false)
                ->multiple(false)
<<<<<<< HEAD
                ->afterStateUpdated(function (mixed $state, Set $set) use ($attachment): void {
=======
                ->afterStateUpdated(function ($state, Set $set) use ($attachment): void {
>>>>>>> laraxot/dev
                    if (! $state) {
                        return;
                    }
                    $state = Arr::wrap($state);

                    $sessionFiles = [];

                    foreach ($state as $file) {
                        $sessionFiles[] = $file;
                    }

                    Assert::string($attachment, 'Attachment must be string');
                    $set($attachment, $sessionFiles);
                });

            $form[] = $fileUpload;
        }

        return $form;
    }
}
