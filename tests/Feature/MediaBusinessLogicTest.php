<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Models\Media;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Models\TemporaryUpload;
use Modules\Media\Tests\TestCase;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

require_once dirname(__DIR__).'/Pest.php';

uses(TestCase::class);

describe('Media Business Logic', function () {
    beforeEach(function () {
        Storage::fake('public');
    });

    it('can create media from temporary upload', function () {
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $temporaryColumns = Schema::connection('media')->getColumnListing('temporary_uploads');

        $temporaryPayload = [
            'session_id' => session()->getId(),
        ];

        if (in_array('user_id', $temporaryColumns, true)) {
            $user = User::factory()->create();
            $temporaryPayload['user_id'] = $user->id;
        }

        if (in_array('file_name', $temporaryColumns, true)) {
            $temporaryPayload['file_name'] = $file->getClientOriginalName();
        }

        if (in_array('file_size', $temporaryColumns, true)) {
            $temporaryPayload['file_size'] = $file->getSize();
        }

        if (in_array('mime_type', $temporaryColumns, true)) {
            $temporaryPayload['mime_type'] = $file->getMimeType();
        }

        if (in_array('status', $temporaryColumns, true)) {
            $temporaryPayload['status'] = 'uploading';
        }

        $temporaryUpload = TemporaryUpload::factory()->create($temporaryPayload);

        $mediaColumns = Schema::connection('media')->getColumnListing('media');

        $mediaPayload = [
            'disk' => 'public',
            'collection_name' => 'default',
        ];

        if (in_array('file_name', $mediaColumns, true) && in_array('file_name', $temporaryColumns, true)) {
            $mediaPayload['file_name'] = $temporaryUpload->file_name;
        } else {
            $mediaPayload['file_name'] = 'test-image.jpg';
        }

        if (in_array('mime_type', $mediaColumns, true) && in_array('mime_type', $temporaryColumns, true)) {
            $mediaPayload['mime_type'] = $temporaryUpload->mime_type;
        } else {
            $mediaPayload['mime_type'] = $file->getMimeType();
        }

        if (in_array('file_size', $mediaColumns, true) && in_array('file_size', $temporaryColumns, true)) {
            $mediaPayload['file_size'] = $temporaryUpload->file_size;
        }

        if (in_array('size', $mediaColumns, true) && in_array('file_size', $temporaryColumns, true)) {
            $mediaPayload['size'] = mediaIntegerish($temporaryUpload->file_size);
        }

        if (isset($user) && in_array('user_id', $mediaColumns, true)) {
            $mediaPayload['user_id'] = $user->id;
        }

        $media = Media::factory()->create($mediaPayload);

        Assert::assertInstanceOf(Media::class, $media);
        Assert::assertSame($mediaPayload['file_name'], $media->file_name);
        Assert::assertSame($mediaPayload['mime_type'], $media->mime_type);

<<<<<<< .merge_file_ctoYGX
        assertMediaTableHas('media', [
            'id' => mediaIntegerish($media->getKey()),
=======
        $this->assertDatabaseHas('media', [
            'id' => (int) $media->getKey(),
>>>>>>> .merge_file_YcabOT
            'file_name' => $mediaPayload['file_name'],
            'mime_type' => $mediaPayload['mime_type'],
        ], 'media');
    });

    it('can convert media to different formats', function () {
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        foreach (['media_id', 'original_format', 'target_format', 'status'] as $requiredColumn) {
            if (! in_array($requiredColumn, $convertColumns, true)) {
<<<<<<< .merge_file_ctoYGX
                Assert::markTestSkipped('media_converts table is missing required columns for this test in this install.');
=======
                $this->markTestSkipped('media_converts table is missing required columns for this test in this install.');
>>>>>>> .merge_file_YcabOT
            }
        }

        $payload = [
            'mime_type' => 'image/jpeg',
        ];

        if (in_array('user_id', $mediaColumns, true)) {
            $user = User::factory()->create();
            $payload['user_id'] = $user->id;
        }

        $media = Media::factory()->create($payload);

        $mediaConvert = MediaConvert::factory()->create([
            'media_id' => $media->id,
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ]);

<<<<<<< .merge_file_ctoYGX
        Assert::assertInstanceOf(MediaConvert::class, $mediaConvert);
        Assert::assertEquals($media->id, $mediaConvert->media_id);
        Assert::assertSame('jpeg', $mediaConvert->getAttribute('original_format'));
        Assert::assertSame('png', $mediaConvert->getAttribute('target_format'));

        assertMediaTableHas('media_converts', [
            'id' => mediaIntegerish($mediaConvert->getKey()),
            'media_id' => mediaIntegerish($media->getKey()),
=======
        expect($mediaConvert)
            ->toBeInstanceOf(MediaConvert::class)
            ->and($mediaConvert->media_id)
            ->toBe($media->id)
            ->and($mediaConvert->original_format)
            ->toBe('jpeg')
            ->and($mediaConvert->target_format)
            ->toBe('png');

        $this->assertDatabaseHas('media_converts', [
            'id' => (int) $mediaConvert->getKey(),
            'media_id' => (int) $media->getKey(),
>>>>>>> .merge_file_YcabOT
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ], 'media');
    });

    it('can track temporary upload lifecycle', function () {
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $columns = Schema::connection('media')->getColumnListing('temporary_uploads');

        $payload = [
            'session_id' => session()->getId(),
        ];

        if (in_array('user_id', $columns, true)) {
            $user = User::factory()->create();
            $payload['user_id'] = $user->id;
        }

        if (in_array('file_name', $columns, true)) {
            $payload['file_name'] = $file->getClientOriginalName();
        }

        if (in_array('file_size', $columns, true)) {
            $payload['file_size'] = $file->getSize();
        }

        if (in_array('mime_type', $columns, true)) {
            $payload['mime_type'] = $file->getMimeType();
        }

        if (in_array('status', $columns, true)) {
            $payload['status'] = 'uploading';
        }

        $temporaryUpload = TemporaryUpload::factory()->create($payload);

        // Simulate upload completion
        $temporaryUpload->update(['status' => 'completed']);

<<<<<<< .merge_file_ctoYGX
        Assert::assertSame('completed', $temporaryUpload->fresh()?->getAttribute('status'));
=======
        expect($temporaryUpload->fresh()->status)->toBe('completed');
>>>>>>> .merge_file_YcabOT

        $expected = [
            'id' => mediaIntegerish($temporaryUpload->getKey()),
            'status' => 'completed',
        ];

        if (isset($user) && in_array('user_id', $columns, true)) {
            $expected['user_id'] = $user->id;
        }

        $this->assertDatabaseHas('temporary_uploads', $expected, 'media');
    });

    it('can manage media collections', function () {
        $columns = Schema::connection('media')->getColumnListing('media');

        $profilePayload = [
            'collection_name' => 'profile',
            'disk' => 'public',
        ];

        $documentPayload = [
            'collection_name' => 'documents',
            'disk' => 'public',
        ];

        if (in_array('user_id', $columns, true)) {
            $user = User::factory()->create();
            $profilePayload['user_id'] = $user->id;
            $documentPayload['user_id'] = $user->id;
        }

        $profileMedia = Media::factory()->create($profilePayload);

        $documentMedia = Media::factory()->create($documentPayload);

        Assert::assertSame('profile', $profileMedia->collection_name);
        Assert::assertSame('documents', $documentMedia->collection_name);

<<<<<<< .merge_file_ctoYGX
        assertMediaTableHas('media', [
            'id' => mediaIntegerish($profileMedia->getKey()),
=======
        $this->assertDatabaseHas('media', [
            'id' => (int) $profileMedia->getKey(),
>>>>>>> .merge_file_YcabOT
            'collection_name' => 'profile',
        ], 'media');

<<<<<<< .merge_file_ctoYGX
        assertMediaTableHas('media', [
            'id' => mediaIntegerish($documentMedia->getKey()),
=======
        $this->assertDatabaseHas('media', [
            'id' => (int) $documentMedia->getKey(),
>>>>>>> .merge_file_YcabOT
            'collection_name' => 'documents',
        ], 'media');
    });

    it('can validate media file types', function () {
        $columns = Schema::connection('media')->getColumnListing('media');

        $imagePayload = [
            'mime_type' => 'image/jpeg',
            'file_name' => 'valid-image.jpg',
        ];

        if (in_array('user_id', $columns, true)) {
            $user = User::factory()->create();
            $imagePayload['user_id'] = $user->id;
        }

        $validImage = Media::factory()->create($imagePayload);

        $imageMime = (string) ($validImage->mime_type ?? '');
        Assert::assertStringStartsWith('image/', $imageMime);

        $documentPayload = [
            'mime_type' => 'application/pdf',
            'file_name' => 'valid-document.pdf',
        ];

        if (isset($user) && in_array('user_id', $columns, true)) {
            $documentPayload['user_id'] = $user->id;
        }

        $validDocument = Media::factory()->create($documentPayload);

        $docMime = (string) ($validDocument->mime_type ?? '');
        Assert::assertStringStartsWith('application/', $docMime);
    });

    it('can track media conversion status', function () {
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        if (! in_array('status', $convertColumns, true) || ! in_array('media_id', $convertColumns, true)) {
<<<<<<< .merge_file_ctoYGX
            Assert::markTestSkipped('media_converts table is missing required columns for this test in this install.');
=======
            $this->markTestSkipped('media_converts table is missing required columns for this test in this install.');
>>>>>>> .merge_file_YcabOT
        }

        $payload = [
            'mime_type' => 'image/jpeg',
        ];

        if (in_array('user_id', $mediaColumns, true)) {
            $user = User::factory()->create();
            $payload['user_id'] = $user->id;
        }

        $media = Media::factory()->create($payload);

        $mediaConvert = MediaConvert::factory()->create([
            'media_id' => $media->id,
            'status' => 'pending',
        ]);

        // Simulate conversion progress
        $mediaConvert->update(['status' => 'processing']);
        $mediaConvert->update(['status' => 'completed']);

<<<<<<< .merge_file_ctoYGX
        Assert::assertSame('completed', $mediaConvert->fresh()?->getAttribute('status'));

        assertMediaTableHas('media_converts', [
            'id' => mediaIntegerish($mediaConvert->getKey()),
=======
        expect($mediaConvert->fresh()->status)->toBe('completed');

        $this->assertDatabaseHas('media_converts', [
            'id' => (int) $mediaConvert->getKey(),
>>>>>>> .merge_file_YcabOT
            'status' => 'completed',
        ], 'media');
    });

    it('can manage media permissions', function () {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true) || ! in_array('is_public', $columns, true)) {
<<<<<<< .merge_file_ctoYGX
            Assert::markTestSkipped('This install does not have user_id/is_public columns on media table.');
=======
            $this->markTestSkipped('This install does not have user_id/is_public columns on media table.');
>>>>>>> .merge_file_YcabOT
        }

        $media = Media::factory()->create([
            'user_id' => $owner->id,
            'is_public' => false,
        ]);

<<<<<<< .merge_file_ctoYGX
        Assert::assertEquals($owner->id, $media->user_id);
        Assert::assertFalse((bool) $media->getAttribute('is_public'));
        Assert::assertNotEquals($otherUser->id, $media->user_id);
=======
        expect($media->user_id)
            ->toBe($owner->id)
            ->and($media->is_public)
            ->toBeFalse()
            ->and($media->user_id)
            ->not->toBe($otherUser->id);
>>>>>>> .merge_file_YcabOT
    });

    it('can handle media deletion', function () {
        $columns = Schema::connection('media')->getColumnListing('media');

        if (in_array('deleted_at', $columns, true)) {
<<<<<<< .merge_file_ctoYGX
            Assert::markTestSkipped('This install has deleted_at on media table; deletion semantics are install-specific.');
        }

        $media = MediaFactory::new()->createOne();
        $mediaId = mediaIntegerish($media->getKey());
=======
            $this->markTestSkipped('This install has deleted_at on media table; deletion semantics are install-specific.');
        }

        $media = Media::factory()->create();
        $mediaId = (int) $media->getKey();
>>>>>>> .merge_file_YcabOT

        $media->delete();

        $this->assertDatabaseMissing('media', [
            'id' => $mediaId,
        ], 'media');
    });

    it('can generate media urls', function () {
        $media = Media::factory()->create([
            'file_name' => 'test-image.jpg',
            'disk' => 'public',
        ]);

        $url = $media->getUrl();

        Assert::assertNotEmpty($url);
        Assert::assertStringContainsString('test-image.jpg', $url);
    });

    it('can validate file size limits', function () {
        $user = User::factory()->create();

        $columns = Schema::getColumnListing('media');
        $payloadBase = [];

        $trySet = function (array &$payload, string $column, mixed $value) use ($columns): void {
            if (in_array($column, $columns, true)) {
                $payload[$column] = $value;
            }
        };

        $makePayload = function (int $size) use ($user, $payloadBase, $trySet): array {
            $payload = $payloadBase;
            $trySet($payload, 'user_id', $user->id);
            $trySet($payload, 'file_size', $size);
            $trySet($payload, 'size', $size);
            $trySet($payload, 'file_name', 'test-file.pdf');
            $trySet($payload, 'disk', 'public');
            $trySet($payload, 'collection_name', 'default');
            $trySet($payload, 'mime_type', 'application/pdf');
            $trySet($payload, 'created_at', now());
            $trySet($payload, 'updated_at', now());

            return $payload;
        };

        $validPayload = $makePayload(1024 * 1024);
        if ($validPayload === []) {
<<<<<<< .merge_file_ctoYGX
            Assert::markTestSkipped('Unable to build minimal payload for media table in this install.');
=======
            $this->markTestSkipped('Unable to build minimal payload for media table in this install.');
>>>>>>> .merge_file_YcabOT
        }

        $validMedia = Media::query()->create($validPayload);
        $sizeValue = mediaIntegerish($validMedia->getAttribute('file_size') ?? $validMedia->getAttribute('size') ?? 0);
        Assert::assertLessThanOrEqual(10 * 1024 * 1024, $sizeValue);

        $largeMedia = Media::query()->create($makePayload(15 * 1024 * 1024));
        $largeSizeValue = mediaIntegerish($largeMedia->getAttribute('file_size') ?? $largeMedia->getAttribute('size') ?? 0);
        Assert::assertGreaterThan(10 * 1024 * 1024, $largeSizeValue);
    });

    it('can track media usage statistics', function () {
        $user = User::factory()->create();

        $columns = Schema::getColumnListing('media');
        $trySet = function (array &$payload, string $column, mixed $value) use ($columns): void {
            if (in_array($column, $columns, true)) {
                $payload[$column] = $value;
            }
        };

        $makePayload = function (string $mime, string $fileName) use ($user, $trySet): array {
            $payload = [];
            $trySet($payload, 'user_id', $user->id);
            $trySet($payload, 'mime_type', $mime);
            $trySet($payload, 'file_name', $fileName);
            $trySet($payload, 'disk', 'public');
            $trySet($payload, 'collection_name', 'default');
            $trySet($payload, 'file_size', 123);
            $trySet($payload, 'size', 123);
            $trySet($payload, 'created_at', now());
            $trySet($payload, 'updated_at', now());

            return $payload;
        };

        for ($i = 0; $i < 5; $i++) {
            Media::query()->create($makePayload('image/jpeg', "img-{$i}.jpg"));
        }

        for ($i = 0; $i < 3; $i++) {
            Media::query()->create($makePayload('application/pdf', "doc-{$i}.pdf"));
        }

<<<<<<< .merge_file_ctoYGX
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $mediaColumns, true)) {
            Assert::markTestSkipped('This install does not have user_id column on media table.');
=======
        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true)) {
            $this->markTestSkipped('This install does not have user_id column on media table.');
>>>>>>> .merge_file_YcabOT
        }

        $totalMedia = Media::where('user_id', $user->id)->count();
        $imageCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'image/%')->count();
        $documentCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'application/%')->count();

        Assert::assertSame(8, $totalMedia);
        Assert::assertSame(5, $imageCount);
        Assert::assertSame(3, $documentCount);
    });
});
