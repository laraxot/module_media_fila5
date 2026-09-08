<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

<<<<<<< HEAD
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
                ->afterStateUpdated(function (mixed $state, Set $set) use ($attachment): void {
=======
use Webmozart\Assert\Assert;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GetAttachmentsSchemaAction
{
    public function execute(array $attachments, string $disk = 'attachments'): array
    {
        $form = [];
        $sessionId = session()->getId();
        $prefix = Config::string('media-library.prefix');

        $sessionDir = "session-uploads/{$sessionId}";
        if ($prefix !== '') {
            $sessionDir = $prefix.'/'.$sessionDir;
        }
        foreach ($attachments as $attachment) {
            $attachmentStr = (string) $attachment;
            $form[$attachmentStr] = FileUpload::make($attachmentStr)
                // $form[$attachment]=SpatieMediaLibraryFileUpload::make($attachment)
                ->directory($sessionDir)
                ->disk($disk)
                ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'])
                ->maxSize(5120 * 2)
                ->preserveFilenames()
                ->required()
                ->previewable(false)
                // ->saveUploadedFiles()
                ->afterStateUpdated(function ($state, Set $set) use ($attachment, $sessionDir, $disk): void {
>>>>>>> 4e14511d (.)
                    if (! $state) {
                        return;
                    }
                    $state = Arr::wrap($state);

                    $sessionFiles = [];

                    foreach ($state as $file) {
<<<<<<< HEAD
                        $sessionFiles[] = $file;
                    }

                    Assert::string($attachment, 'Attachment must be string');
                    $set($attachment, $sessionFiles);
                });

            $form[] = $fileUpload;
=======
                        if ($file instanceof TemporaryUploadedFile) {
                            // Salva direttamente nella directory di sessione
                            $fileName = time().'_'.$file->getClientOriginalName();
                            $sessionPath = $file->storeAs($sessionDir, $fileName, $disk);
                            $sessionFiles[] = $sessionPath;
                        } else {
                            // È già un percorso salvato
                            $sessionFiles[] = $file;
                        }
                    }

                    // Set expects Component|string, pass attachment as string
                    Assert::string($attachment, 'Attachment must be string');
                    $set($attachment, $sessionFiles);
                });
>>>>>>> 4e14511d (.)
        }

        return $form;
    }
}
