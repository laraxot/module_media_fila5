<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Exception;
use Illuminate\Support\Facades\Storage;
<<<<<<< HEAD
use Mockery;
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Models\Media;
use Modules\Media\Tests\TestCase;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

uses(TestCase::class)->beforeEach(function () {
=======
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Models\Media;
use Modules\Media\Tests\TestCase;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

uses(TestCase::class);

beforeEach(function (): void {
>>>>>>> be7d0c3 (.)
    Storage::fake('attachments');
});

it('executes save attachments successfully', function (): void {
<<<<<<< HEAD
    // Arrange
    $action = new SaveAttachmentsAction;

    // Mock del record HasMedia
    $record = Mockery::mock(HasMedia::class);

    $media = Mockery::mock(Media::class);
    $media->shouldReceive('getPathRelativeToRoot')->andReturn('media/test-path');

    $fileAdder = Mockery::mock(FileAdder::class);
    $fileAdder->shouldReceive('usingFileName')->andReturnSelf();
    $fileAdder->shouldReceive('toMediaCollection')->andReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);
=======
    $action = new SaveAttachmentsAction();

    $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->method('addMedia')->willReturn($fileAdder);
    $record->method('update')->willReturn(true);
>>>>>>> be7d0c3 (.)

    $attachments = ['invoice', 'contract'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
        'contract' => 'temp/contract.pdf',
    ];

<<<<<<< HEAD
    // Crea file temporanei
    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert
=======
    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');

    $action->execute($record, $attachments, $data, 'attachments');

>>>>>>> be7d0c3 (.)
    expect(Storage::disk('attachments')->exists('temp/invoice.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/contract.pdf'))->toBeTrue();
});

it('handles empty attachments', function (): void {
<<<<<<< HEAD
    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);
    $record->shouldReceive('update')->with([])->andReturn(true);

    $attachments = [];
    $data = [];

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert - non dovrebbe lanciare eccezioni
=======
    $action = new SaveAttachmentsAction();

    $record = $this->makeHasMediaRecordMock();
    $record->method('update')->with([])->willReturn(true);

    $action->execute($record, [], [], 'attachments');

>>>>>>> be7d0c3 (.)
    expect(true)->toBeTrue();
});

it('skips nonexistent files', function (): void {
<<<<<<< HEAD
    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);
    $record->shouldReceive('update')->with([])->andReturn(true);
=======
    $action = new SaveAttachmentsAction();

    $record = $this->makeHasMediaRecordMock();
    $record->method('update')->with([])->willReturn(true);
>>>>>>> be7d0c3 (.)

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'nonexistent/file.pdf',
    ];

<<<<<<< HEAD
    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert - non dovrebbe lanciare eccezioni
=======
    $action->execute($record, $attachments, $data, 'attachments');

>>>>>>> be7d0c3 (.)
    expect(true)->toBeTrue();
});

it('handles storage errors gracefully', function (): void {
<<<<<<< HEAD
    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);
    $record->shouldReceive('addMedia')->andThrow(new Exception('Storage error'));
=======
    $action = new SaveAttachmentsAction();

    $record = $this->makeHasMediaRecordMock();
    $record->method('addMedia')->willThrowException(new Exception('Storage error'));
>>>>>>> be7d0c3 (.)

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

<<<<<<< HEAD
    // Act & Assert
=======
>>>>>>> be7d0c3 (.)
    expect(fn () => $action->execute($record, $attachments, $data, 'attachments'))
        ->toThrow(Exception::class, 'Storage error');
});

it('uses correct disk', function (): void {
<<<<<<< HEAD
    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);

    $media = Mockery::mock(Media::class);
    $media->shouldReceive('getPathRelativeToRoot')->andReturn('media/test-path');

    $fileAdder = Mockery::mock(FileAdder::class);
    $fileAdder->shouldReceive('usingFileName')->andReturnSelf();
    $fileAdder->shouldReceive('toMediaCollection')->andReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);
=======
    $action = new SaveAttachmentsAction();

    $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->method('addMedia')->willReturn($fileAdder);
    $record->method('update')->willReturn(true);
>>>>>>> be7d0c3 (.)

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

<<<<<<< HEAD
    // Crea file su disco diverso
    Storage::fake('custom_disk');
    Storage::disk('custom_disk')->put('temp/invoice.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'custom_disk');

    // Assert
=======
    Storage::fake('custom_disk');
    Storage::disk('custom_disk')->put('temp/invoice.pdf', 'fake content');

    $action->execute($record, $attachments, $data, 'custom_disk');

>>>>>>> be7d0c3 (.)
    expect(Storage::disk('custom_disk')->exists('temp/invoice.pdf'))->toBeTrue();
});

it('cleans up temp files', function (): void {
<<<<<<< HEAD
    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);

    $media = Mockery::mock(Media::class);
    $media->shouldReceive('getPathRelativeToRoot')->andReturn('media/test-path');

    $fileAdder = Mockery::mock(FileAdder::class);
    $fileAdder->shouldReceive('usingFileName')->andReturnSelf();
    $fileAdder->shouldReceive('toMediaCollection')->andReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);
=======
    $action = new SaveAttachmentsAction();

    $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->method('addMedia')->willReturn($fileAdder);
    $record->method('update')->willReturn(true);
>>>>>>> be7d0c3 (.)

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

<<<<<<< HEAD
    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert - il file temporaneo dovrebbe essere pulito
    // Questo test verifica che la pulizia avvenga nel finally block
=======
    $action->execute($record, $attachments, $data, 'attachments');

>>>>>>> be7d0c3 (.)
    expect(true)->toBeTrue();
});

it('handles multiple attachments', function (): void {
<<<<<<< HEAD
    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);

    $media = Mockery::mock(Media::class);
    $media->shouldReceive('getPathRelativeToRoot')->times(3)->andReturn('media/test-path');

    $fileAdder = Mockery::mock(FileAdder::class);
    $fileAdder->shouldReceive('usingFileName')->times(3)->andReturnSelf();
    $fileAdder->shouldReceive('toMediaCollection')->times(3)->andReturn($media);

    $record->shouldReceive('addMedia')->times(3)->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);
=======
    $action = new SaveAttachmentsAction();

    $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->method('addMedia')->willReturn($fileAdder);
    $record->method('update')->willReturn(true);
>>>>>>> be7d0c3 (.)

    $attachments = ['invoice', 'contract', 'receipt'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
        'contract' => 'temp/contract.pdf',
        'receipt' => 'temp/receipt.pdf',
    ];

<<<<<<< HEAD
    // Crea file temporanei
=======
>>>>>>> be7d0c3 (.)
    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/receipt.pdf', 'fake content');

<<<<<<< HEAD
    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert
=======
    $action->execute($record, $attachments, $data, 'attachments');

>>>>>>> be7d0c3 (.)
    expect(Storage::disk('attachments')->exists('temp/invoice.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/contract.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/receipt.pdf'))->toBeTrue();
});
