<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Webmozart\Assert\Assert;

use function Safe\file_put_contents;
use function Safe\tempnam;
use function Safe\unlink;

class SaveAttachmentsAction
{
    /**
     * Save attachments to media library.
     *
     * @param list<string> $attachments
     * @param array<string, string|null> $data
     */
    public function execute(HasMedia $record, array $attachments, array $data, string $disk = 'attachments'): void
    {
        /** @var array<string, string> $dataAttachments */
        $dataAttachments = [];

        foreach ($attachments as $attachment) {
            Assert::string($attachment, '['.__LINE__.']['.class_basename(self::class).']');

            if (! isset($data[$attachment]) || $data[$attachment] === '') {
                continue;
            }

            $path = $data[$attachment];
            Assert::string($path, '['.__LINE__.']['.class_basename(self::class).']');

            $storage = Storage::disk($disk);

            if (! $storage->exists($path)) {
                continue;
            }

            $fileContent = $storage->get($path);
            $tempPath = tempnam(sys_get_temp_dir(), 'media_');

            file_put_contents($tempPath, $fileContent);

            try {
                $media = $record->addMedia($tempPath)->usingFileName(basename($path))->toMediaCollection(
                    $attachment,
                    $disk,
                );

                $dataAttachments[$attachment] = $media->getPathRelativeToRoot();
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
