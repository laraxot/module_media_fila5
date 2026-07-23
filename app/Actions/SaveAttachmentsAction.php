<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Illuminate\Support\Facades\Storage;
use Modules\Media\Datas\SaveAttachmentsData;
use function Safe\file_put_contents;
use function Safe\tempnam;
use function Safe\unlink;
use Spatie\MediaLibrary\HasMedia;
use Webmozart\Assert\Assert;

// phpmd: UnusedLocalVariable — $full_path legacy path debug (branch commentato in execute)
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

            // Ottieni il contenuto del file prima che venga eliminato
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
                // Cleanup del file temporaneo
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
