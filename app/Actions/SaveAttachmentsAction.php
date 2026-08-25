<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Webmozart\Assert\Assert;

use function Safe\file_put_contents;
use function Safe\tempnam;
use function Safe\unlink;

// phpmd: UnusedLocalVariable — $full_path legacy path debug (branch commentato in execute)
class SaveAttachmentsAction
{
    /**
     * Save attachments to media library.
     *
<<<<<<< HEAD
    * @param  list<string>  $attachments
=======
     * @param  list<string>  $attachments
>>>>>>> laraxot/dev
     * @param  array<string, string|null>  $data
     */
    public function execute(HasMedia $record, array $attachments, array $data, string $disk = 'attachments'): void
    {
        /** @var array<string, string> $dataAttachments */
        $dataAttachments = [];

        foreach ($attachments as $attachment) {
            Assert::string($attachment, '['.__LINE__.']['.class_basename(self::class).']');

<<<<<<< HEAD
           if (! isset($data[$attachment]) || $data[$attachment] === '') {
=======
            if (! isset($data[$attachment]) || $data[$attachment] === '') {
>>>>>>> laraxot/dev
                continue;
            }

            $path = $data[$attachment];
            Assert::string($path, '['.__LINE__.']['.class_basename(self::class).']');

            // Metodo compatibile con Laravel 9+ e Flysystem 3.x
            $storage = Storage::disk($disk);

            if (! $storage->exists($path)) {
                continue;
            }

            // Ottieni il contenuto del file prima che venga eliminato
            $fileContent = $storage->get($path);
<<<<<<< HEAD
           $tempPath = tempnam(sys_get_temp_dir(), 'media_');
=======
            $tempPath = tempnam(sys_get_temp_dir(), 'media_');
>>>>>>> laraxot/dev

            file_put_contents($tempPath, $fileContent);

            try {
                $media = $record->addMedia($tempPath)->usingFileName(basename($path))->toMediaCollection(
                    $attachment,
                    $disk,
                );

                $dataAttachments[$attachment] = $media->getPathRelativeToRoot();
            } finally {
                // Cleanup del file temporaneo
                if (file_exists($tempPath)) {
                    unlink($tempPath);
                }
            }
        }

<<<<<<< HEAD
       if ($dataAttachments !== []) {
=======
        if ($dataAttachments !== []) {
>>>>>>> laraxot/dev
            $record->update($dataAttachments);
        }
    }
}
