<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Filament\Forms\Components\FileUpload;
<<<<<<< HEAD
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Arr;
use Modules\Media\Datas\MediaConfigData;
use Webmozart\Assert\Assert;
=======
use Spatie\QueueableAction\QueueableAction;
>>>>>>> ec2b884b (.)

class GetAttachmentsSchemaAction
{
    use QueueableAction;

    /**
     * @param  array<array-key, string>  $attachments
     * @return list<FileUpload>
     */
    public function execute(array $attachments, string $disk = 'attachments'): array
    {
        $form = [];
        // Limiti dalla SettingPage di Media (prima scritti qui: 10 MB, pdf/doc/docx).
        $config = MediaConfigData::make();

        foreach ($attachments as $attachment) {
            $form[] = FileUpload::make($attachment)
                ->directory('temp')
                ->disk($disk)
<<<<<<< HEAD
                ->acceptedFileTypes($config->attachment_mime_types)
                ->maxSize($config->attachment_max_size_kb)
=======
                ->acceptedFileTypes([
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                ])
                ->maxSize(10 * 1024 * 1024)
>>>>>>> ec2b884b (.)
                ->visibility('public')
                ->preserveFilenames()
                ->required()
                ->previewable()
                ->downloadable()
                ->reorderable(false)
<<<<<<< HEAD
                ->multiple(false)
                /**
                 * `mixed $state` voluto: lo stato FileUpload e' eterogeneo
                 * (TemporaryUploadedFile|array|string|null) — Arr::wrap lo normalizza.
                 */
                ->afterStateUpdated(function (mixed $state, Set $set) use ($attachment): void {
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
=======
                ->multiple(false);
>>>>>>> ec2b884b (.)
        }

        return $form;
    }
}
