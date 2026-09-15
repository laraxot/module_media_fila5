<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Exception;
use Illuminate\Contracts\Filesystem\Factory as FilesystemFactory;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Mockery\MockInterface;
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Models\Media;
<<<<<<< HEAD
use Modules\Media\Tests\TestCase;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

uses(TestCase::class)->group('no-media-db');
=======
use Modules\Media\Tests\Support\HasMediaTestStub;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

final class SaveAttachmentsActionTest extends TestCase
{
    protected function tearDown(): void
    {
        Storage::clearResolvedInstance('filesystem');
>>>>>>> laraxot/dev

        parent::tearDown();
    }

<<<<<<< HEAD
afterEach(function (): void {
    Mockery::close();
});

it('executes save attachments successfully', function (): void {
    $action = new SaveAttachmentsAction();

    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();
=======
    public function test_it_saves_existing_attachments_and_updates_the_record(): void
    {
        $this->mockStorage([
            'temp/invoice.pdf' => 'invoice',
            'temp/contract.pdf' => 'contract',
        ]);

        $record = $this->recordMock();
        $record->expects($this->exactly(2))
            ->method('addMedia')
            ->willReturn($this->fileAdderMock());
        $record->expects($this->once())
            ->method('update')
            ->with([
                'invoice' => 'media/test-path',
                'contract' => 'media/test-path',
            ])
            ->willReturn(true);
>>>>>>> laraxot/dev

        (new SaveAttachmentsAction)->execute(
            $record,
            ['invoice', 'contract'],
            ['invoice' => 'temp/invoice.pdf', 'contract' => 'temp/contract.pdf'],
        );
    }

    public function test_it_ignores_empty_and_missing_paths(): void
    {
        $this->mockStorage([]);

<<<<<<< HEAD
    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);
=======
        $record = $this->recordMock();
        $record->expects($this->never())->method('addMedia');
        $record->expects($this->never())->method('update');
>>>>>>> laraxot/dev

        (new SaveAttachmentsAction)->execute(
            $record,
            ['empty', 'missing'],
            ['empty' => '', 'missing' => 'temp/missing.pdf'],
        );
    }

    public function test_it_propagates_media_library_errors(): void
    {
        $this->mockStorage(['temp/invoice.pdf' => 'invoice']);

        $record = $this->recordMock();
        $record->method('addMedia')->willThrowException(new Exception('Storage error'));

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Storage error');

        (new SaveAttachmentsAction)->execute(
            $record,
            ['invoice'],
            ['invoice' => 'temp/invoice.pdf'],
        );
    }

<<<<<<< HEAD
    /** @var MockInterface&HasMedia $record */
    $record = $this->makeHasMediaRecordMock();
    $record->shouldReceive('update')->never();

    $action->execute($record, [], [], 'attachments');
});
=======
    /** @return HasMediaTestStub&MockObject */
    private function recordMock(): HasMediaTestStub
    {
        return $this->createPartialMock(HasMediaTestStub::class, ['addMedia', 'update']);
    }

    /** @return FileAdder&MockObject */
    private function fileAdderMock(): FileAdder
    {
        $media = $this->createMock(Media::class);
        $media->method('getPathRelativeToRoot')->willReturn('media/test-path');

        $fileAdder = $this->createMock(FileAdder::class);
        $fileAdder->method('usingFileName')->willReturnSelf();
        $fileAdder->method('toMediaCollection')->willReturn($media);
>>>>>>> laraxot/dev

        return $fileAdder;
    }

<<<<<<< HEAD
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
    /** @param array<string, string> $files */
    private function mockStorage(array $files): void
    {
        $filesystem = $this->createMock(Filesystem::class);
        $filesystem->method('exists')->willReturnCallback(
            static fn (string $path): bool => array_key_exists($path, $files),
        );
        $filesystem->method('get')->willReturnCallback(
            static fn (string $path): string => $files[$path],
        );

        $factory = $this->createMock(FilesystemFactory::class);
        $factory->method('disk')->willReturn($filesystem);
        Storage::swap($factory);
    }
}
>>>>>>> laraxot/dev
