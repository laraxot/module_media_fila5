<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Filament\Forms\Components\FileUpload;
use Spatie\QueueableAction\QueueableAction;

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

        foreach ($attachments as $attachment) {
            $form[] = FileUpload::make($attachment)
                ->directory('temp')
                ->disk($disk)
                ->acceptedFileTypes([
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                ])
                ->maxSize(10 * 1024 * 1024)
                ->visibility('public')
                ->preserveFilenames()
                ->required()
                ->previewable()
                ->downloadable()
                ->reorderable(false)
                ->multiple(false);
        }

        return $form;
    }
}
