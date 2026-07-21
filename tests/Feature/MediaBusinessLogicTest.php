<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Media\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Database\Factories\MediaConvertFactory;
use Modules\Media\Database\Factories\MediaFactory;
use Modules\Media\Database\Factories\TemporaryUploadFactory;
use Modules\Media\Models\Media;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
=======
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Models\Media;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Models\TemporaryUpload;
use Modules\Media\Tests\TestCase;
>>>>>>> provtv/dev
use Modules\User\Models\User;

uses(TestCase::class);

describe('Media Business Logic', function () {
<<<<<<< HEAD
    beforeEach(function (): void {
        Storage::fake('public');
    });

    it('can create media from temporary upload', function (): void {
=======
    beforeEach(function () {
        Storage::fake('public');
    });

    it('can create media from temporary upload', function () {
>>>>>>> provtv/dev
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $temporaryColumns = Schema::connection('media')->getColumnListing('temporary_uploads');

<<<<<<< HEAD
        /** @var array<string, mixed> $temporaryPayload */
=======
>>>>>>> provtv/dev
        $temporaryPayload = [
            'session_id' => session()->getId(),
        ];

<<<<<<< HEAD
        $user = null;

        if (in_array('user_id', $temporaryColumns, true)) {
            $user = UserFactory::new()->createOne();
=======
        if (in_array('user_id', $temporaryColumns, true)) {
            $user = User::factory()->create();
>>>>>>> provtv/dev
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

<<<<<<< HEAD
        $temporaryUpload = TemporaryUploadFactory::new()->createOne($temporaryPayload);

        $mediaColumns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $mediaPayload */
=======
        $temporaryUpload = TemporaryUpload::factory()->create($temporaryPayload);

        $mediaColumns = Schema::connection('media')->getColumnListing('media');

>>>>>>> provtv/dev
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
            $mediaPayload['size'] = (int) $temporaryUpload->file_size;
        }

<<<<<<< HEAD
        if ($user instanceof User && in_array('user_id', $mediaColumns, true)) {
            $mediaPayload['user_id'] = $user->id;
        }

        $media = MediaFactory::new()->createOne($mediaPayload);
=======
        if (isset($user) && in_array('user_id', $mediaColumns, true)) {
            $mediaPayload['user_id'] = $user->id;
        }

        $media = Media::factory()->create($mediaPayload);
>>>>>>> provtv/dev

        expect($media)
            ->toBeInstanceOf(Media::class)
            ->and($media->file_name)
            ->toBe($mediaPayload['file_name'])
            ->and($media->mime_type)
            ->toBe($mediaPayload['mime_type']);

<<<<<<< HEAD
        assertMediaTableHas('media', [
            'id' => (int) $media->getKey(),
            'file_name' => $mediaPayload['file_name'],
            'mime_type' => $mediaPayload['mime_type'],
        ]);
    });

    it('can convert media to different formats', function (): void {
=======
        $this->assertDatabaseHas('media', [
            'id' => (int) $media->getKey(),
            'file_name' => $mediaPayload['file_name'],
            'mime_type' => $mediaPayload['mime_type'],
        ], 'media');
    });

    it('can convert media to different formats', function () {
>>>>>>> provtv/dev
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        foreach (['media_id', 'original_format', 'target_format', 'status'] as $requiredColumn) {
            if (! in_array($requiredColumn, $convertColumns, true)) {
<<<<<<< HEAD
                $this->skipTest('media_converts table is missing required columns for this test in this install.');
            }
        }

        /** @var array<string, mixed> $payload */
=======
                $this->markTestSkipped('media_converts table is missing required columns for this test in this install.');
            }
        }

>>>>>>> provtv/dev
        $payload = [
            'mime_type' => 'image/jpeg',
        ];

        if (in_array('user_id', $mediaColumns, true)) {
<<<<<<< HEAD
            $user = UserFactory::new()->createOne();
            $payload['user_id'] = $user->id;
        }

        $media = MediaFactory::new()->createOne($payload);

        $mediaConvert = MediaConvertFactory::new()->createOne([
=======
            $user = User::factory()->create();
            $payload['user_id'] = $user->id;
        }

        $media = Media::factory()->create($payload);

        $mediaConvert = MediaConvert::factory()->create([
>>>>>>> provtv/dev
            'media_id' => $media->id,
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ]);

        expect($mediaConvert)
            ->toBeInstanceOf(MediaConvert::class)
            ->and($mediaConvert->media_id)
            ->toBe($media->id)
<<<<<<< HEAD
            ->and($mediaConvert->getAttribute('original_format'))
            ->toBe('jpeg')
            ->and($mediaConvert->getAttribute('target_format'))
            ->toBe('png');

        assertMediaTableHas('media_converts', [
=======
            ->and($mediaConvert->original_format)
            ->toBe('jpeg')
            ->and($mediaConvert->target_format)
            ->toBe('png');

        $this->assertDatabaseHas('media_converts', [
>>>>>>> provtv/dev
            'id' => (int) $mediaConvert->getKey(),
            'media_id' => (int) $media->getKey(),
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
<<<<<<< HEAD
        ]);
    });

    it('can track temporary upload lifecycle', function (): void {
=======
        ], 'media');
    });

    it('can track temporary upload lifecycle', function () {
>>>>>>> provtv/dev
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $columns = Schema::connection('media')->getColumnListing('temporary_uploads');

<<<<<<< HEAD
        /** @var array<string, mixed> $payload */
=======
>>>>>>> provtv/dev
        $payload = [
            'session_id' => session()->getId(),
        ];

<<<<<<< HEAD
        $user = null;

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
=======
        if (in_array('user_id', $columns, true)) {
            $user = User::factory()->create();
>>>>>>> provtv/dev
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

<<<<<<< HEAD
        $temporaryUpload = TemporaryUploadFactory::new()->createOne($payload);

        $temporaryUpload->update(['status' => 'completed']);

        expect($temporaryUpload->fresh()?->getAttribute('status'))->toBe('completed');

        /** @var array<string, mixed> $expected */
=======
        $temporaryUpload = TemporaryUpload::factory()->create($payload);

        // Simulate upload completion
        $temporaryUpload->update(['status' => 'completed']);

        expect($temporaryUpload->fresh()->status)->toBe('completed');

>>>>>>> provtv/dev
        $expected = [
            'id' => (int) $temporaryUpload->getKey(),
            'status' => 'completed',
        ];

<<<<<<< HEAD
        if ($user instanceof User && in_array('user_id', $columns, true)) {
            $expected['user_id'] = $user->id;
        }

        assertMediaTableHas('temporary_uploads', $expected);
    });

    it('can manage media collections', function (): void {
        $columns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $profilePayload */
=======
        if (isset($user) && in_array('user_id', $columns, true)) {
            $expected['user_id'] = $user->id;
        }

        $this->assertDatabaseHas('temporary_uploads', $expected, 'media');
    });

    it('can manage media collections', function () {
        $columns = Schema::connection('media')->getColumnListing('media');

>>>>>>> provtv/dev
        $profilePayload = [
            'collection_name' => 'profile',
            'disk' => 'public',
        ];

<<<<<<< HEAD
        /** @var array<string, mixed> $documentPayload */
=======
>>>>>>> provtv/dev
        $documentPayload = [
            'collection_name' => 'documents',
            'disk' => 'public',
        ];

        if (in_array('user_id', $columns, true)) {
<<<<<<< HEAD
            $user = UserFactory::new()->createOne();
=======
            $user = User::factory()->create();
>>>>>>> provtv/dev
            $profilePayload['user_id'] = $user->id;
            $documentPayload['user_id'] = $user->id;
        }

<<<<<<< HEAD
        $profileMedia = MediaFactory::new()->createOne($profilePayload);

        $documentMedia = MediaFactory::new()->createOne($documentPayload);
=======
        $profileMedia = Media::factory()->create($profilePayload);

        $documentMedia = Media::factory()->create($documentPayload);
>>>>>>> provtv/dev

        expect($profileMedia->collection_name)
            ->toBe('profile')
            ->and($documentMedia->collection_name)
            ->toBe('documents');

<<<<<<< HEAD
        assertMediaTableHas('media', [
            'id' => (int) $profileMedia->getKey(),
            'collection_name' => 'profile',
        ]);

        assertMediaTableHas('media', [
            'id' => (int) $documentMedia->getKey(),
            'collection_name' => 'documents',
        ]);
    });

    it('can validate media file types', function (): void {
        $columns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $imagePayload */
=======
        $this->assertDatabaseHas('media', [
            'id' => (int) $profileMedia->getKey(),
            'collection_name' => 'profile',
        ], 'media');

        $this->assertDatabaseHas('media', [
            'id' => (int) $documentMedia->getKey(),
            'collection_name' => 'documents',
        ], 'media');
    });

    it('can validate media file types', function () {
        $columns = Schema::connection('media')->getColumnListing('media');

>>>>>>> provtv/dev
        $imagePayload = [
            'mime_type' => 'image/jpeg',
            'file_name' => 'valid-image.jpg',
        ];

<<<<<<< HEAD
        $user = null;

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
            $imagePayload['user_id'] = $user->id;
        }

        $validImage = MediaFactory::new()->createOne($imagePayload);
=======
        if (in_array('user_id', $columns, true)) {
            $user = User::factory()->create();
            $imagePayload['user_id'] = $user->id;
        }

        $validImage = Media::factory()->create($imagePayload);
>>>>>>> provtv/dev

        $imageMime = (string) ($validImage->mime_type ?? '');
        expect($imageMime)->toStartWith('image/');

<<<<<<< HEAD
        /** @var array<string, mixed> $documentPayload */
=======
>>>>>>> provtv/dev
        $documentPayload = [
            'mime_type' => 'application/pdf',
            'file_name' => 'valid-document.pdf',
        ];

<<<<<<< HEAD
        if ($user instanceof User && in_array('user_id', $columns, true)) {
            $documentPayload['user_id'] = $user->id;
        }

        $validDocument = MediaFactory::new()->createOne($documentPayload);
=======
        if (isset($user) && in_array('user_id', $columns, true)) {
            $documentPayload['user_id'] = $user->id;
        }

        $validDocument = Media::factory()->create($documentPayload);
>>>>>>> provtv/dev

        $docMime = (string) ($validDocument->mime_type ?? '');
        expect($docMime)->toStartWith('application/');
    });

<<<<<<< HEAD
    it('can track media conversion status', function (): void {
=======
    it('can track media conversion status', function () {
>>>>>>> provtv/dev
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        if (! in_array('status', $convertColumns, true) || ! in_array('media_id', $convertColumns, true)) {
<<<<<<< HEAD
            $this->skipTest('media_converts table is missing required columns for this test in this install.');
        }

        /** @var array<string, mixed> $payload */
=======
            $this->markTestSkipped('media_converts table is missing required columns for this test in this install.');
        }

>>>>>>> provtv/dev
        $payload = [
            'mime_type' => 'image/jpeg',
        ];

        if (in_array('user_id', $mediaColumns, true)) {
<<<<<<< HEAD
            $user = UserFactory::new()->createOne();
            $payload['user_id'] = $user->id;
        }

        $media = MediaFactory::new()->createOne($payload);

        $mediaConvert = MediaConvertFactory::new()->createOne([
=======
            $user = User::factory()->create();
            $payload['user_id'] = $user->id;
        }

        $media = Media::factory()->create($payload);

        $mediaConvert = MediaConvert::factory()->create([
>>>>>>> provtv/dev
            'media_id' => $media->id,
            'status' => 'pending',
        ]);

<<<<<<< HEAD
        $mediaConvert->update(['status' => 'processing']);
        $mediaConvert->update(['status' => 'completed']);

        expect($mediaConvert->fresh()?->getAttribute('status'))->toBe('completed');

        assertMediaTableHas('media_converts', [
            'id' => (int) $mediaConvert->getKey(),
            'status' => 'completed',
        ]);
    });

    it('can manage media permissions', function (): void {
        $owner = UserFactory::new()->createOne();
        $otherUser = UserFactory::new()->createOne();

        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true) || ! in_array('is_public', $columns, true)) {
            $this->skipTest('This install does not have user_id/is_public columns on media table.');
        }

        $media = MediaFactory::new()->createOne([
=======
        // Simulate conversion progress
        $mediaConvert->update(['status' => 'processing']);
        $mediaConvert->update(['status' => 'completed']);

        expect($mediaConvert->fresh()->status)->toBe('completed');

        $this->assertDatabaseHas('media_converts', [
            'id' => (int) $mediaConvert->getKey(),
            'status' => 'completed',
        ], 'media');
    });

    it('can manage media permissions', function () {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true) || ! in_array('is_public', $columns, true)) {
            $this->markTestSkipped('This install does not have user_id/is_public columns on media table.');
        }

        $media = Media::factory()->create([
>>>>>>> provtv/dev
            'user_id' => $owner->id,
            'is_public' => false,
        ]);

        expect($media->user_id)
            ->toBe($owner->id)
<<<<<<< HEAD
            ->and($media->getAttribute('is_public'))
=======
            ->and($media->is_public)
>>>>>>> provtv/dev
            ->toBeFalse()
            ->and($media->user_id)
            ->not->toBe($otherUser->id);
    });

<<<<<<< HEAD
    it('can handle media deletion', function (): void {
        $columns = Schema::connection('media')->getColumnListing('media');

        if (in_array('deleted_at', $columns, true)) {
            $this->skipTest('This install has deleted_at on media table; deletion semantics are install-specific.');
        }

        $media = MediaFactory::new()->createOne();
=======
    it('can handle media deletion', function () {
        $columns = Schema::connection('media')->getColumnListing('media');

        if (in_array('deleted_at', $columns, true)) {
            $this->markTestSkipped('This install has deleted_at on media table; deletion semantics are install-specific.');
        }

        $media = Media::factory()->create();
>>>>>>> provtv/dev
        $mediaId = (int) $media->getKey();

        $media->delete();

<<<<<<< HEAD
        assertMediaTableMissing('media', [
            'id' => $mediaId,
        ]);
    });

    it('can generate media urls', function (): void {
        $media = MediaFactory::new()->createOne([
=======
        $this->assertDatabaseMissing('media', [
            'id' => $mediaId,
        ], 'media');
    });

    it('can generate media urls', function () {
        $media = Media::factory()->create([
>>>>>>> provtv/dev
            'file_name' => 'test-image.jpg',
            'disk' => 'public',
        ]);

        $url = $media->getUrl();

        expect($url)->not->toBeEmpty()->and($url)->toContain('test-image.jpg');
    });

<<<<<<< HEAD
    it('can validate file size limits', function (): void {
        $user = UserFactory::new()->createOne();

        $columns = mediaTableColumns();

        $makePayload = function (int $size) use ($user, $columns): array {
            $payload = mediaPayloadSet([], $columns, 'user_id', $user->id);
            $payload = mediaPayloadSet($payload, $columns, 'file_size', $size);
            $payload = mediaPayloadSet($payload, $columns, 'size', $size);
            $payload = mediaPayloadSet($payload, $columns, 'file_name', 'test-file.pdf');
            $payload = mediaPayloadSet($payload, $columns, 'disk', 'public');
            $payload = mediaPayloadSet($payload, $columns, 'collection_name', 'default');
            $payload = mediaPayloadSet($payload, $columns, 'mime_type', 'application/pdf');
            $payload = mediaPayloadSet($payload, $columns, 'created_at', now());
            $payload = mediaPayloadSet($payload, $columns, 'updated_at', now());
=======
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
>>>>>>> provtv/dev

            return $payload;
        };

        $validPayload = $makePayload(1024 * 1024);
        if ($validPayload === []) {
<<<<<<< HEAD
            $this->skipTest('Unable to build minimal payload for media table in this install.');
=======
            $this->markTestSkipped('Unable to build minimal payload for media table in this install.');
>>>>>>> provtv/dev
        }

        $validMedia = Media::query()->create($validPayload);
        $sizeValue = (int) ($validMedia->getAttribute('file_size') ?? $validMedia->getAttribute('size') ?? 0);
        expect($sizeValue)->toBeLessThanOrEqual(10 * 1024 * 1024);

        $largeMedia = Media::query()->create($makePayload(15 * 1024 * 1024));
        $largeSizeValue = (int) ($largeMedia->getAttribute('file_size') ?? $largeMedia->getAttribute('size') ?? 0);
        expect($largeSizeValue)->toBeGreaterThan(10 * 1024 * 1024);
    });

<<<<<<< HEAD
    it('can track media usage statistics', function (): void {
        $user = UserFactory::new()->createOne();

        $columns = mediaTableColumns();

        $makePayload = function (string $mime, string $fileName) use ($user, $columns): array {
            $payload = mediaPayloadSet([], $columns, 'user_id', $user->id);
            $payload = mediaPayloadSet($payload, $columns, 'mime_type', $mime);
            $payload = mediaPayloadSet($payload, $columns, 'file_name', $fileName);
            $payload = mediaPayloadSet($payload, $columns, 'disk', 'public');
            $payload = mediaPayloadSet($payload, $columns, 'collection_name', 'default');
            $payload = mediaPayloadSet($payload, $columns, 'file_size', 123);
            $payload = mediaPayloadSet($payload, $columns, 'size', 123);
            $payload = mediaPayloadSet($payload, $columns, 'created_at', now());
            $payload = mediaPayloadSet($payload, $columns, 'updated_at', now());
=======
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
>>>>>>> provtv/dev

            return $payload;
        };

        for ($i = 0; $i < 5; $i++) {
            Media::query()->create($makePayload('image/jpeg', "img-{$i}.jpg"));
        }

        for ($i = 0; $i < 3; $i++) {
            Media::query()->create($makePayload('application/pdf', "doc-{$i}.pdf"));
        }

<<<<<<< HEAD
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $mediaColumns, true)) {
            $this->skipTest('This install does not have user_id column on media table.');
=======
        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true)) {
            $this->markTestSkipped('This install does not have user_id column on media table.');
>>>>>>> provtv/dev
        }

        $totalMedia = Media::where('user_id', $user->id)->count();
        $imageCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'image/%')->count();
        $documentCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'application/%')->count();

        expect($totalMedia)->toBe(8)->and($imageCount)->toBe(5)->and($documentCount)->toBe(3);
    });
});
