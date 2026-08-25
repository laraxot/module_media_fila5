<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Exception;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Models\Media;
use Modules\Media\Tests\TestCase;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

use function Safe\glob;

uses(TestCase::class);

beforeEach(function (): void {
    Storage::fake('attachments');
});

it('executes save attachments successfully', function (): void {
    // Arrange
    $action = new SaveAttachmentsAction;

   $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->method('addMedia')->willReturn($fileAdder);
    $record->method('update')->willReturn(true);

    $attachments = ['invoice', 'contract'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
        'contract' => 'temp/contract.pdf',
    ];

    // Crea file temporanei
    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert
    expect(Storage::disk('attachments')->exists('temp/invoice.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/contract.pdf'))->toBeTrue();
});

it('handles empty attachments', function (): void {
    // Arrange
    $action = new SaveAttachmentsAction;

   $record = $this->makeHasMediaRecordMock();
    $record->expects($this->never())->method('update');

    // Act + Assert: senza allegati `$dataAttachments` resta vuoto, quindi
    // `update()` non viene mai chiamato. Lo verifica l'aspettativa sul mock.
    $action->execute($record, [], [], 'attachments');
});

it('skips nonexistent files', function (): void {
    // Arrange
    $action = new SaveAttachmentsAction;

   $record = $this->makeHasMediaRecordMock();
    $record->expects($this->never())->method('update');

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'nonexistent/file.pdf',
    ];

   // Act + Assert: il file non esiste sul disco, quindi il ciclo salta l'allegato
    // e `update()` non viene mai chiamato. Lo verifica l'aspettativa sul mock.
    $action->execute($record, $attachments, $data, 'attachments');
});

it('handles storage errors gracefully', function (): void {
    // Arrange
    $action = new SaveAttachmentsAction;

   $record = $this->makeHasMediaRecordMock();
    $record->method('addMedia')->willThrowException(new Exception('Storage error'));

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

    // Act & Assert
    expect(fn () => $action->execute($record, $attachments, $data, 'attachments'))
       ->toThrow(Exception::class, 'Storage error');
});

it('uses correct disk', function (): void {
    // Arrange
    $action = new SaveAttachmentsAction;

   $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->method('addMedia')->willReturn($fileAdder);
    $record->method('update')->willReturn(true);

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    // Crea file su disco diverso
    Storage::fake('custom_disk');
    Storage::disk('custom_disk')->put('temp/invoice.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'custom_disk');

    // Assert
    expect(Storage::disk('custom_disk')->exists('temp/invoice.pdf'))->toBeTrue();
});

it('cleans up temp files', function (): void {
    // Arrange
    $action = new SaveAttachmentsAction;

   $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->method('addMedia')->willReturn($fileAdder);
    $record->method('update')->willReturn(true);

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

   // `tempnam(sys_get_temp_dir(), 'media_')` crea il file temporaneo che il blocco
    // `finally` deve rimuovere: si confronta l'elenco prima e dopo, non un booleano.
    $tempFilesBefore = glob(sys_get_temp_dir().'/media_*');

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert - il blocco finally ha rimosso il file temporaneo
    expect(glob(sys_get_temp_dir().'/media_*'))->toBe($tempFilesBefore);
});

it('handles multiple attachments', function (): void {
    // Arrange
    $action = new SaveAttachmentsAction;

   $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->method('addMedia')->willReturn($fileAdder);
    $record->method('update')->willReturn(true);

    $attachments = ['invoice', 'contract', 'receipt'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
        'contract' => 'temp/contract.pdf',
        'receipt' => 'temp/receipt.pdf',
    ];

    // Crea file temporanei
    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/receipt.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert
    expect(Storage::disk('attachments')->exists('temp/invoice.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/contract.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/receipt.pdf'))->toBeTrue();
});
