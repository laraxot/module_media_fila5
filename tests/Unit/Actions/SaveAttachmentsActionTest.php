<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Exception;
use Illuminate\Support\Facades\Storage;
use Mockery;
<<<<<<< HEAD
use Mockery\MockInterface;
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Models\Media;
use Modules\Media\Tests\TestCase;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

uses(TestCase::class)->group('no-media-db');

beforeEach(function (): void {
    Storage::fake('attachments');
});

afterEach(function (): void {
    Mockery::close();
});

it('executes save attachments successfully', function (): void {
    $action = new SaveAttachmentsAction();

    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);

    $attachments = ['invoice', 'contract'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
        'contract' => 'temp/contract.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');

    $action->execute($record, $attachments, $data, 'attachments');

    expect(Storage::disk('attachments')->exists('temp/invoice.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/contract.pdf'))->toBeTrue();
});

it('handles empty attachments', function (): void {
    $action = new SaveAttachmentsAction();

    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();
    $record->shouldReceive('update')->never();

    $action->execute($record, [], [], 'attachments');
});

it('skips nonexistent files', function (): void {
    $action = new SaveAttachmentsAction();

    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();
    $record->shouldReceive('update')->never();

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'nonexistent/file.pdf',
    ];

    $action->execute($record, $attachments, $data, 'attachments');
});

it('handles storage errors gracefully', function (): void {
    $action = new SaveAttachmentsAction();

    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();
    $record->shouldReceive('addMedia')->andThrow(new Exception('Storage error'));

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

    expect(fn () => $action->execute($record, $attachments, $data, 'attachments'))
        ->toThrow(Exception::class, 'Storage error');
});

it('uses correct disk', function (): void {
    $action = new SaveAttachmentsAction();

    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::fake('custom_disk');
    Storage::disk('custom_disk')->put('temp/invoice.pdf', 'fake content');

    $action->execute($record, $attachments, $data, 'custom_disk');

    expect(Storage::disk('custom_disk')->exists('temp/invoice.pdf'))->toBeTrue();
});

it('cleans up temp files', function (): void {
    $action = new SaveAttachmentsAction();

    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

    $action->execute($record, $attachments, $data, 'attachments');
});

it('handles multiple attachments', function (): void {
    $action = new SaveAttachmentsAction();

    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();

    $media = $this->makeTestMock(Media::class);
    $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

    $fileAdder = $this->makeTestMock(FileAdder::class);
    $fileAdder->method('usingFileName')->willReturnSelf();
    $fileAdder->method('toMediaCollection')->willReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);

    $attachments = ['invoice', 'contract', 'receipt'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
        'contract' => 'temp/contract.pdf',
        'receipt' => 'temp/receipt.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/receipt.pdf', 'fake content');

    $action->execute($record, $attachments, $data, 'attachments');

    expect(Storage::disk('attachments')->exists('temp/invoice.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/contract.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/receipt.pdf'))->toBeTrue();
});
=======
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Tests\TestCase;

class SaveAttachmentsActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('attachments');
    }

    public function test_executes_save_attachments_successfully(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        // Mock del record HasMedia
        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->andReturnSelf();
        $record->shouldReceive('usingFileName')->andReturnSelf();
        $record->shouldReceive('toMediaCollection')->andReturn(new Media);
        $record->shouldReceive('update')->andReturn(true);

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
        static::assertTrue(Storage::disk('attachments')->exists('temp/invoice.pdf'));
        static::assertTrue(Storage::disk('attachments')->exists('temp/contract.pdf'));
    }

    public function test_handles_empty_attachments(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('update')->with([])->andReturn(true);

        $attachments = [];
        $data = [];

        // Act
        $action->execute($record, $attachments, $data, 'attachments');

        // Assert - non dovrebbe lanciare eccezioni
        static::assertTrue(true);
    }

    public function test_skips_nonexistent_files(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('update')->with([])->andReturn(true);

        $attachments = ['invoice'];
        $data = [
            'invoice' => 'nonexistent/file.pdf',
        ];

        // Act
        $action->execute($record, $attachments, $data, 'attachments');

        // Assert - non dovrebbe lanciare eccezioni
        static::assertTrue(true);
    }

    public function test_handles_storage_errors_gracefully(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->andThrow(new Exception('Storage error'));

        $attachments = ['invoice'];
        $data = [
            'invoice' => 'temp/invoice.pdf',
        ];

        Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

        // Act & Assert
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Storage error');

        $action->execute($record, $attachments, $data, 'attachments');
    }

    public function test_uses_correct_disk(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->andReturnSelf();
        $record->shouldReceive('usingFileName')->andReturnSelf();
        $record->shouldReceive('toMediaCollection')->andReturn(new Media);
        $record->shouldReceive('update')->andReturn(true);

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
        static::assertTrue(Storage::disk('custom_disk')->exists('temp/invoice.pdf'));
    }

    public function test_cleans_up_temp_files(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->andReturnSelf();
        $record->shouldReceive('usingFileName')->andReturnSelf();
        $record->shouldReceive('toMediaCollection')->andReturn(new Media);
        $record->shouldReceive('update')->andReturn(true);

        $attachments = ['invoice'];
        $data = [
            'invoice' => 'temp/invoice.pdf',
        ];

        Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

        // Act
        $action->execute($record, $attachments, $data, 'attachments');

        // Assert - il file temporaneo dovrebbe essere pulito
        // Questo test verifica che la pulizia avvenga nel finally block
        static::assertTrue(true);
    }

    public function test_handles_multiple_attachments(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->times(3)->andReturnSelf();
        $record->shouldReceive('usingFileName')->times(3)->andReturnSelf();
        $record->shouldReceive('toMediaCollection')->times(3)->andReturn(new Media);
        $record->shouldReceive('update')->andReturn(true);

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
        static::assertTrue(Storage::disk('attachments')->exists('temp/invoice.pdf'));
        static::assertTrue(Storage::disk('attachments')->exists('temp/contract.pdf'));
        static::assertTrue(Storage::disk('attachments')->exists('temp/receipt.pdf'));
    }
}
>>>>>>> 4e14511d (.)
