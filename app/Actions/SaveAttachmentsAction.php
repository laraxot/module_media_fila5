<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\file_put_contents;
use function Safe\tempnam;
use function Safe\unlink;

final class SaveAttachmentsAction
{
    use QueueableAction;

    /**
     * Save attachments to media library.
     *
     * @param  list<string>  $attachments
     * @param  array<string, string|null>  $data
     */
    public function execute(HasMedia $record, array $attachments, array $data, string $disk = 'attachments'): void
    {
        /** @var array<string, string> $dataAttachments */
        $dataAttachments = [];

        foreach ($attachments as $attachment) {
            $path = $this->attachmentPath($attachment, $data);

            if ($path === null) {
                continue;
            }

            $storedPath = $this->saveAttachment($record, $attachment, $path, $disk);

            if ($storedPath !== null) {
                $dataAttachments[$attachment] = $storedPath;
            }
        }

        if ($dataAttachments !== []) {
            $record->update($dataAttachments);
        }
    }

    /**
     * @param  array<string, string|null>  $data
     */
    private function attachmentPath(string $attachment, array $data): ?string
    {
        if (! isset($data[$attachment]) || $data[$attachment] === '') {
            return null;
        }

        return $data[$attachment];
    }

    private function saveAttachment(HasMedia $record, string $attachment, string $path, string $disk): ?string
    {
        $storage = Storage::disk($disk);

        if (! $storage->exists($path)) {
            return null;
        }

        $fileContent = $storage->get($path);
        Assert::string($fileContent);

        $tempPath = tempnam(sys_get_temp_dir(), 'media_');
        file_put_contents($tempPath, $fileContent);

        try {
            $media = $record->addMedia($tempPath)->usingFileName(basename($path))->toMediaCollection($attachment, $disk);

            return $media->getPathRelativeToRoot();
        } finally {
            if (file_exists($tempPath)) {
                unlink($tempPath);
            }
        }
    }
}
