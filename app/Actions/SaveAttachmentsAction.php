<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use function Safe\file_put_contents;
use function Safe\tempnam;
use function Safe\unlink;
use Spatie\MediaLibrary\HasMedia;
use Webmozart\Assert\Assert;

// phpmd: UnusedLocalVariable — $full_path legacy path debug (branch commentato in execute)
=======
use Exception;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Webmozart\Assert\Assert;

use function Safe\file_put_contents;
use function Safe\tempnam;
use function Safe\unlink;

>>>>>>> provtv/dev
class SaveAttachmentsAction
{
    /**
     * Save attachments to media library.
     *
<<<<<<< HEAD
     * @param  list<string>  $attachments
     * @param  array<string, string|null>  $data
     */
    public function execute(HasMedia $record, array $attachments, array $data, string $disk = 'attachments'): void
    {
        /** @var array<string, string> $dataAttachments */
=======
     * @param  array<int, string>  $attachments
     * @param  array<string, mixed>  $data
     */
    public function execute(HasMedia $record, array $attachments, array $data, string $disk = 'attachments'): void
    {
>>>>>>> provtv/dev
        $dataAttachments = [];

        foreach ($attachments as $attachment) {
            Assert::string($attachment, '['.__LINE__.']['.class_basename(self::class).']');

<<<<<<< HEAD
            if (! isset($data[$attachment]) || $data[$attachment] === '') {
=======
            if (empty($data[$attachment])) {
>>>>>>> provtv/dev
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
            $tempPath = tempnam(sys_get_temp_dir(), 'media_');

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
            $record->update($dataAttachments);
        }
    }
=======
        if (! empty($dataAttachments)) {
            /** @var array<string, string> $dataAttachments */
            $record->update($dataAttachments);
        }
    }

    /**
     * @param  array<int, string>  $attachments
     * @param  array<string, mixed>  $data
     */
    public function executeOLD(HasMedia $record, array $attachments, array $data, string $disk = 'attachments'): void
    {
        $data_attachments = [];
        foreach ($attachments as $attachment) {
            Assert::string($attachment, '['.__LINE__.']['.class_basename(self::class).']');
            $path = $data[$attachment];
            Assert::string($path, '['.__LINE__.']['.class_basename(self::class).']');
            $full_path = Storage::disk($disk)->path($path);
            // *
            dddx([
                'exists' => Storage::disk($disk)->exists($path),
                'path' => $path,
                'disk' => $disk,
                'full_path' => Storage::disk($disk)->path($path),
            ]);
            // */
            if (! method_exists($record, 'addMediaFromDisk')) {
                throw new Exception('Method addMediaFromDisk not found');
            }
            $fileAdder = $record->addMediaFromDisk($path, $disk);
            // $media=$record->addMediaFromRequest($attachment)

            // $media=$record->addMedia($full_path)
            if ($fileAdder === null) {
                continue;
            }
            /** @phpstan-ignore-next-line - Spatie MediaLibrary fluent API */
            $media = $fileAdder->toMediaCollection($attachment);
            /** @phpstan-ignore-next-line - Spatie MediaLibrary Media model */
            $data_attachments[$attachment] = $media->getPathRelativeToRoot();
        }
        /** @var array<string, string> $data_attachments */
        $record->update($data_attachments);
    }
>>>>>>> provtv/dev
}
