<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Illuminate\Support\Facades\Storage;
use Modules\Media\Datas\SaveAttachmentsData;
use Spatie\MediaLibrary\HasMedia;

use function Safe\file_put_contents;
use function Safe\tempnam;
use function Safe\unlink;

class SaveAttachmentsAction
{
    /**
     * Save attachments to media library.
     */
    public function execute(HasMedia $record, SaveAttachmentsData $data): void
    {
        /** @var array<string, string> $dataAttachments */
        $dataAttachments = [];

        foreach ($data->attachments as $attachment) {
            $path = $attachment->path;

            if ($path === null || $path === '') {
                continue;
            }

            $storage = Storage::disk($data->disk);

            if (! $storage->exists($path)) {
                continue;
            }

            $fileContent = $storage->get($path);
            $tempPath = tempnam(sys_get_temp_dir(), 'media_');

            file_put_contents($tempPath, $fileContent);

            try {
                $media = $record->addMedia($tempPath)->usingFileName(basename($path))->toMediaCollection(
                    $attachment->name,
                    $data->disk,
                );

                $dataAttachments[$attachment->name] = $media->getPathRelativeToRoot();
            } finally {
                if (file_exists($tempPath)) {
                    unlink($tempPath);
                }
            }
        }

        if ($dataAttachments !== []) {
            $record->update($dataAttachments);
        }
    }
}
