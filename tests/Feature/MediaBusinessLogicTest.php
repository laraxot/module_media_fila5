<?php

declare(strict_types=1);

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
use Modules\User\Models\User;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

require_once dirname(__DIR__).'/Pest.php';
=======
>>>>>>> be7d0c3 (.)

uses(TestCase::class);

describe('Media Business Logic', function () {
    beforeEach(function (): void {
        Storage::fake('public');
    });

    it('can create media from temporary upload', function (): void {
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $temporaryColumns = Schema::connection('media')->getColumnListing('temporary_uploads');

        /** @var array<string, mixed> $temporaryPayload */
        $temporaryPayload = [
            'session_id' => session()->getId(),
        ];

        $user = null;

        if (in_array('user_id', $temporaryColumns, true)) {
            $user = UserFactory::new()->createOne();
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

        $temporaryUpload = TemporaryUploadFactory::new()->createOne($temporaryPayload);

        $mediaColumns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $mediaPayload */
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
<<<<<<< HEAD
            $mediaPayload['size'] = mediaIntegerish($temporaryUpload->file_size);
=======
            $mediaPayload['size'] = (int) $temporaryUpload->file_size;
>>>>>>> be7d0c3 (.)
        }

        if ($user instanceof User && in_array('user_id', $mediaColumns, true)) {
            $mediaPayload['user_id'] = $user->id;
        }

        $media = MediaFactory::new()->createOne($mediaPayload);

<<<<<<< HEAD
        Assert::assertInstanceOf(Media::class, $media);
        Assert::assertSame($mediaPayload['file_name'], $media->file_name);
        Assert::assertSame($mediaPayload['mime_type'], $media->mime_type);

        assertMediaTableHas('media', [
            'id' => mediaIntegerish($media->getKey()),
=======
        expect($media)
            ->toBeInstanceOf(Media::class)
            ->and($media->file_name)
            ->toBe($mediaPayload['file_name'])
            ->and($media->mime_type)
            ->toBe($mediaPayload['mime_type']);

        assertMediaTableHas('media', [
            'id' => (int) $media->getKey(),
>>>>>>> be7d0c3 (.)
            'file_name' => $mediaPayload['file_name'],
            'mime_type' => $mediaPayload['mime_type'],
        ]);
    });

    it('can convert media to different formats', function (): void {
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        foreach (['media_id', 'original_format', 'target_format', 'status'] as $requiredColumn) {
            if (! in_array($requiredColumn, $convertColumns, true)) {
<<<<<<< HEAD
                Assert::markTestSkipped('media_converts table is missing required columns for this test in this install.');
=======
                $this->skipTest('media_converts table is missing required columns for this test in this install.');
>>>>>>> be7d0c3 (.)
            }
        }

        /** @var array<string, mixed> $payload */
        $payload = [
            'mime_type' => 'image/jpeg',
        ];

        if (in_array('user_id', $mediaColumns, true)) {
            $user = UserFactory::new()->createOne();
            $payload['user_id'] = $user->id;
        }

        $media = MediaFactory::new()->createOne($payload);

        $mediaConvert = MediaConvertFactory::new()->createOne([
            'media_id' => $media->id,
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ]);

<<<<<<< HEAD
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
            ->and($mediaConvert->getAttribute('original_format'))
            ->toBe('jpeg')
            ->and($mediaConvert->getAttribute('target_format'))
            ->toBe('png');

        assertMediaTableHas('media_converts', [
            'id' => (int) $mediaConvert->getKey(),
            'media_id' => (int) $media->getKey(),
>>>>>>> be7d0c3 (.)
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ]);
    });

    it('can track temporary upload lifecycle', function (): void {
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $columns = Schema::connection('media')->getColumnListing('temporary_uploads');

        /** @var array<string, mixed> $payload */
        $payload = [
            'session_id' => session()->getId(),
        ];

        $user = null;

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
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

        $temporaryUpload = TemporaryUploadFactory::new()->createOne($payload);

        $temporaryUpload->update(['status' => 'completed']);

<<<<<<< HEAD
        Assert::assertSame('completed', $temporaryUpload->fresh()?->getAttribute('status'));

        /** @var array<string, mixed> $expected */
        $expected = [
            'id' => mediaIntegerish($temporaryUpload->getKey()),
=======
        expect($temporaryUpload->fresh()?->getAttribute('status'))->toBe('completed');

        /** @var array<string, mixed> $expected */
        $expected = [
            'id' => (int) $temporaryUpload->getKey(),
>>>>>>> be7d0c3 (.)
            'status' => 'completed',
        ];

        if ($user instanceof User && in_array('user_id', $columns, true)) {
            $expected['user_id'] = $user->id;
        }

        assertMediaTableHas('temporary_uploads', $expected);
    });

    it('can manage media collections', function (): void {
        $columns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $profilePayload */
        $profilePayload = [
            'collection_name' => 'profile',
            'disk' => 'public',
        ];

        /** @var array<string, mixed> $documentPayload */
        $documentPayload = [
            'collection_name' => 'documents',
            'disk' => 'public',
        ];

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
            $profilePayload['user_id'] = $user->id;
            $documentPayload['user_id'] = $user->id;
        }

        $profileMedia = MediaFactory::new()->createOne($profilePayload);

        $documentMedia = MediaFactory::new()->createOne($documentPayload);

<<<<<<< HEAD
        Assert::assertSame('profile', $profileMedia->collection_name);
        Assert::assertSame('documents', $documentMedia->collection_name);

        assertMediaTableHas('media', [
            'id' => mediaIntegerish($profileMedia->getKey()),
=======
        expect($profileMedia->collection_name)
            ->toBe('profile')
            ->and($documentMedia->collection_name)
            ->toBe('documents');

        assertMediaTableHas('media', [
            'id' => (int) $profileMedia->getKey(),
>>>>>>> be7d0c3 (.)
            'collection_name' => 'profile',
        ]);

        assertMediaTableHas('media', [
<<<<<<< HEAD
            'id' => mediaIntegerish($documentMedia->getKey()),
=======
            'id' => (int) $documentMedia->getKey(),
>>>>>>> be7d0c3 (.)
            'collection_name' => 'documents',
        ]);
    });

    it('can validate media file types', function (): void {
        $columns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $imagePayload */
        $imagePayload = [
            'mime_type' => 'image/jpeg',
            'file_name' => 'valid-image.jpg',
        ];

        $user = null;

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
            $imagePayload['user_id'] = $user->id;
        }

        $validImage = MediaFactory::new()->createOne($imagePayload);

        $imageMime = (string) ($validImage->mime_type ?? '');
<<<<<<< HEAD
        Assert::assertStringStartsWith('image/', $imageMime);
=======
        expect($imageMime)->toStartWith('image/');
>>>>>>> be7d0c3 (.)

        /** @var array<string, mixed> $documentPayload */
        $documentPayload = [
            'mime_type' => 'application/pdf',
            'file_name' => 'valid-document.pdf',
        ];

        if ($user instanceof User && in_array('user_id', $columns, true)) {
            $documentPayload['user_id'] = $user->id;
        }

        $validDocument = MediaFactory::new()->createOne($documentPayload);

        $docMime = (string) ($validDocument->mime_type ?? '');
<<<<<<< HEAD
        Assert::assertStringStartsWith('application/', $docMime);
=======
        expect($docMime)->toStartWith('application/');
>>>>>>> be7d0c3 (.)
    });

    it('can track media conversion status', function (): void {
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        if (! in_array('status', $convertColumns, true) || ! in_array('media_id', $convertColumns, true)) {
<<<<<<< HEAD
            Assert::markTestSkipped('media_converts table is missing required columns for this test in this install.');
=======
            $this->skipTest('media_converts table is missing required columns for this test in this install.');
>>>>>>> be7d0c3 (.)
        }

        /** @var array<string, mixed> $payload */
        $payload = [
            'mime_type' => 'image/jpeg',
        ];

        if (in_array('user_id', $mediaColumns, true)) {
            $user = UserFactory::new()->createOne();
            $payload['user_id'] = $user->id;
        }

        $media = MediaFactory::new()->createOne($payload);

        $mediaConvert = MediaConvertFactory::new()->createOne([
            'media_id' => $media->id,
            'status' => 'pending',
        ]);

        $mediaConvert->update(['status' => 'processing']);
        $mediaConvert->update(['status' => 'completed']);

<<<<<<< HEAD
        Assert::assertSame('completed', $mediaConvert->fresh()?->getAttribute('status'));

        assertMediaTableHas('media_converts', [
            'id' => mediaIntegerish($mediaConvert->getKey()),
=======
        expect($mediaConvert->fresh()?->getAttribute('status'))->toBe('completed');

        assertMediaTableHas('media_converts', [
            'id' => (int) $mediaConvert->getKey(),
>>>>>>> be7d0c3 (.)
            'status' => 'completed',
        ]);
    });

    it('can manage media permissions', function (): void {
        $owner = UserFactory::new()->createOne();
        $otherUser = UserFactory::new()->createOne();

        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true) || ! in_array('is_public', $columns, true)) {
<<<<<<< HEAD
            Assert::markTestSkipped('This install does not have user_id/is_public columns on media table.');
=======
            $this->skipTest('This install does not have user_id/is_public columns on media table.');
>>>>>>> be7d0c3 (.)
        }

        $media = MediaFactory::new()->createOne([
            'user_id' => $owner->id,
            'is_public' => false,
        ]);

<<<<<<< HEAD
        Assert::assertEquals($owner->id, $media->user_id);
        Assert::assertFalse((bool) $media->getAttribute('is_public'));
        Assert::assertNotEquals($otherUser->id, $media->user_id);
=======
        expect($media->user_id)
            ->toBe($owner->id)
            ->and($media->getAttribute('is_public'))
            ->toBeFalse()
            ->and($media->user_id)
            ->not->toBe($otherUser->id);
>>>>>>> be7d0c3 (.)
    });

    it('can handle media deletion', function (): void {
        $columns = Schema::connection('media')->getColumnListing('media');

        if (in_array('deleted_at', $columns, true)) {
<<<<<<< HEAD
            Assert::markTestSkipped('This install has deleted_at on media table; deletion semantics are install-specific.');
        }

        $media = MediaFactory::new()->createOne();
        $mediaId = mediaIntegerish($media->getKey());
=======
            $this->skipTest('This install has deleted_at on media table; deletion semantics are install-specific.');
        }

        $media = MediaFactory::new()->createOne();
        $mediaId = (int) $media->getKey();
>>>>>>> be7d0c3 (.)

        $media->delete();

        assertMediaTableMissing('media', [
            'id' => $mediaId,
        ]);
    });

    it('can generate media urls', function (): void {
        $media = MediaFactory::new()->createOne([
            'file_name' => 'test-image.jpg',
            'disk' => 'public',
        ]);

        $url = $media->getUrl();

<<<<<<< HEAD
        Assert::assertNotEmpty($url);
        Assert::assertStringContainsString('test-image.jpg', $url);
=======
        expect($url)->not->toBeEmpty()->and($url)->toContain('test-image.jpg');
>>>>>>> be7d0c3 (.)
    });

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

            return $payload;
        };

        $validPayload = $makePayload(1024 * 1024);
        if ($validPayload === []) {
<<<<<<< HEAD
            Assert::markTestSkipped('Unable to build minimal payload for media table in this install.');
        }

        $validMedia = Media::query()->create($validPayload);
        $sizeValue = mediaIntegerish($validMedia->getAttribute('file_size') ?? $validMedia->getAttribute('size') ?? 0);
        Assert::assertLessThanOrEqual(10 * 1024 * 1024, $sizeValue);

        $largeMedia = Media::query()->create($makePayload(15 * 1024 * 1024));
        $largeSizeValue = mediaIntegerish($largeMedia->getAttribute('file_size') ?? $largeMedia->getAttribute('size') ?? 0);
        Assert::assertGreaterThan(10 * 1024 * 1024, $largeSizeValue);
=======
            $this->skipTest('Unable to build minimal payload for media table in this install.');
        }

        $validMedia = Media::query()->create($validPayload);
        $sizeValue = (int) ($validMedia->getAttribute('file_size') ?? $validMedia->getAttribute('size') ?? 0);
        expect($sizeValue)->toBeLessThanOrEqual(10 * 1024 * 1024);

        $largeMedia = Media::query()->create($makePayload(15 * 1024 * 1024));
        $largeSizeValue = (int) ($largeMedia->getAttribute('file_size') ?? $largeMedia->getAttribute('size') ?? 0);
        expect($largeSizeValue)->toBeGreaterThan(10 * 1024 * 1024);
>>>>>>> be7d0c3 (.)
    });

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

            return $payload;
        };

        for ($i = 0; $i < 5; $i++) {
            Media::query()->create($makePayload('image/jpeg', "img-{$i}.jpg"));
        }

        for ($i = 0; $i < 3; $i++) {
            Media::query()->create($makePayload('application/pdf', "doc-{$i}.pdf"));
        }

        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $mediaColumns, true)) {
<<<<<<< HEAD
            Assert::markTestSkipped('This install does not have user_id column on media table.');
=======
            $this->skipTest('This install does not have user_id column on media table.');
>>>>>>> be7d0c3 (.)
        }

        $totalMedia = Media::where('user_id', $user->id)->count();
        $imageCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'image/%')->count();
        $documentCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'application/%')->count();

<<<<<<< HEAD
        Assert::assertSame(8, $totalMedia);
        Assert::assertSame(5, $imageCount);
        Assert::assertSame(3, $documentCount);
=======
        expect($totalMedia)->toBe(8)->and($imageCount)->toBe(5)->and($documentCount)->toBe(3);
>>>>>>> be7d0c3 (.)
    });
});
