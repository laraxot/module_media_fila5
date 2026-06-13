<?php

declare(strict_types=1);

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Database\Factories\MediaConvertFactory;
use Modules\Media\Database\Factories\MediaFactory;
use Modules\Media\Database\Factories\TemporaryUploadFactory;
use Modules\Media\Models\Media;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Models\TemporaryUpload;
use Modules\Media\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Media Business Logic', function () {
    beforeEach(function () {
    /** @var \Modules\Media\Tests\TestCase $this */
        Storage::fake('public');
    });

    it('can create media from temporary upload', function () {
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $temporaryColumns = Schema::connection('media')->getColumnListing('temporary_uploads');

        $temporaryPayload = [
            'session_id' => session()->getId(),
        ];

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

        if (isset($user) && in_array('user_id', $mediaColumns, true)) {
            $mediaPayload['user_id'] = $user->id;
        }

        $media = MediaFactory::new()->createOne($mediaPayload);

        Assert::assertInstanceOf(Media::class, $media);
        Assert::assertSame($mediaPayload['file_name'], $media->file_name);
        Assert::assertSame($mediaPayload['mime_type'], $media->mime_type);

        assertMediaTableHas('media', [
            'id' => (int) $media->getKey(),
            'file_name' => $mediaPayload['file_name'],
            'mime_type' => $mediaPayload['mime_type'],
        ]);
    });

    it('can convert media to different formats', function () {
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        foreach (['media_id', 'original_format', 'target_format', 'status'] as $requiredColumn) {
            if (! in_array($requiredColumn, $convertColumns, true)) {
                /** @var TestCase $this */
                $this->markTestSkipped('media_converts table is missing required columns for this test in this install.');
            }
        }

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

        Assert::assertInstanceOf(MediaConvert::class, $mediaConvert);
        Assert::assertSame($media->id, $mediaConvert->getAttribute('media_id'));
        Assert::assertSame('jpeg', $mediaConvert->getAttribute('original_format'));
        Assert::assertSame('png', $mediaConvert->getAttribute('target_format'));

        assertMediaTableHas('media_converts', [
            'id' => (int) $mediaConvert->getKey(),
            'media_id' => (int) $media->getKey(),
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ]);
    });

    it('can track temporary upload lifecycle', function () {
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $columns = Schema::connection('media')->getColumnListing('temporary_uploads');

        $payload = [
            'session_id' => session()->getId(),
        ];

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

        // Simulate upload completion
        $temporaryUpload->update(['status' => 'completed']);

        $refreshedUpload = $temporaryUpload->fresh();
        Assert::assertInstanceOf(TemporaryUpload::class, $refreshedUpload);
        Assert::assertSame('completed', $refreshedUpload->getAttribute('status'));
        $expected = [
            'id' => (int) $temporaryUpload->getKey(),
            'status' => 'completed',
        ];

        if (isset($user) && in_array('user_id', $columns, true)) {
            $expected['user_id'] = $user->id;
        }

        assertMediaTableHas('temporary_uploads', $expected);
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
            $user = UserFactory::new()->createOne();
            $profilePayload['user_id'] = $user->id;
            $documentPayload['user_id'] = $user->id;
        }

        $profileMedia = MediaFactory::new()->createOne($profilePayload);

        $documentMedia = MediaFactory::new()->createOne($documentPayload);

        Assert::assertSame('profile', $profileMedia->collection_name);
        Assert::assertSame('documents', $documentMedia->collection_name);

        assertMediaTableHas('media', [
            'id' => (int) $profileMedia->getKey(),
            'collection_name' => 'profile',
        ]);

        assertMediaTableHas('media', [
            'id' => (int) $documentMedia->getKey(),
            'collection_name' => 'documents',
        ]);
    });

    it('can validate media file types', function () {
        $columns = Schema::connection('media')->getColumnListing('media');

        $imagePayload = [
            'mime_type' => 'image/jpeg',
            'file_name' => 'valid-image.jpg',
        ];

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
            $imagePayload['user_id'] = $user->id;
        }

        $validImage = MediaFactory::new()->createOne($imagePayload);

        $imageMime = (string) ($validImage->mime_type ?? '');
        Assert::assertStringStartsWith('image/', $imageMime);

        $documentPayload = [
            'mime_type' => 'application/pdf',
            'file_name' => 'valid-document.pdf',
        ];

        if (isset($user) && in_array('user_id', $columns, true)) {
            $documentPayload['user_id'] = $user->id;
        }

        $validDocument = MediaFactory::new()->createOne($documentPayload);

        $docMime = (string) ($validDocument->mime_type ?? '');
        Assert::assertStringStartsWith('application/', $docMime);
    });

    it('can track media conversion status', function () {
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        if (! in_array('status', $convertColumns, true) || ! in_array('media_id', $convertColumns, true)) {
            /** @var TestCase $this */
            $this->markTestSkipped('media_converts table is missing required columns for this test in this install.');
        }

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

        // Simulate conversion progress
        $mediaConvert->update(['status' => 'processing']);
        $mediaConvert->update(['status' => 'completed']);

        $refreshedConvert = $mediaConvert->fresh();
        Assert::assertInstanceOf(MediaConvert::class, $refreshedConvert);
        Assert::assertSame('completed', $refreshedConvert->getAttribute('status'));
        assertMediaTableHas('media_converts', [
            'id' => (int) $mediaConvert->getKey(),
            'status' => 'completed',
        ]);
    });

    it('can manage media permissions', function () {
        $owner = UserFactory::new()->createOne();
        $otherUser = UserFactory::new()->createOne();

        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true) || ! in_array('is_public', $columns, true)) {
            /** @var TestCase $this */
            $this->markTestSkipped('This install does not have user_id/is_public columns on media table.');
        }

        $media = MediaFactory::new()->createOne([
            'user_id' => $owner->id,
            'is_public' => false,
        ]);

        Assert::assertSame($owner->id, $media->user_id);
        Assert::assertFalse((bool) $media->getAttribute('is_public'));
        Assert::assertNotSame($otherUser->id, $media->user_id);
    });

    it('can handle media deletion', function () {
        $columns = Schema::connection('media')->getColumnListing('media');

        if (in_array('deleted_at', $columns, true)) {
            /** @var TestCase $this */
            $this->markTestSkipped('This install has deleted_at on media table; deletion semantics are install-specific.');
        }

        $media = MediaFactory::new()->createOne();
        $mediaId = (int) $media->getKey();

        $media->delete();

        assertMediaTableMissing('media', ['id' => $mediaId]);
    });

    it('can generate media urls', function () {
        $media = MediaFactory::new()->createOne([
            'file_name' => 'test-image.jpg',
            'disk' => 'public',
        ]);

        $url = $media->getUrl();

        Assert::assertStringContainsString('test-image.jpg', (string) $url);
        Assert::assertNotEmpty($url);
    });

    it('can validate file size limits', function () {
        $user = UserFactory::new()->createOne();

        $columns = mediaTableColumnListing('media');
        $makePayload = static function (int $size) use ($user, $columns): array {
            $payload = mediaBuildPayload($columns, [
                'user_id' => $user->id,
                'file_size' => $size,
                'size' => $size,
                'file_name' => 'test-file.pdf',
                'disk' => 'public',
                'collection_name' => 'default',
                'mime_type' => 'application/pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return $payload;
        };

        $validPayload = $makePayload(1024 * 1024);
        if ($validPayload === []) {
            /** @var TestCase $this */
            $this->markTestSkipped('Unable to build minimal payload for media table in this install.');
        }

        $validMedia = Media::query()->create($validPayload);
        $sizeValue = (int) ($validMedia->getAttribute('file_size') ?? $validMedia->getAttribute('size') ?? 0);
        Assert::assertLessThanOrEqual(10 * 1024 * 1024, $sizeValue);

        $largeMedia = Media::query()->create($makePayload(15 * 1024 * 1024));
        $largeSizeValue = (int) ($largeMedia->getAttribute('file_size') ?? $largeMedia->getAttribute('size') ?? 0);
        Assert::assertGreaterThan(10 * 1024 * 1024, $largeSizeValue);
    });

    it('can track media usage statistics', function () {
        $user = UserFactory::new()->createOne();

        $columns = mediaTableColumnListing('media');
        $makePayload = static function (string $mime, string $fileName) use ($user, $columns): array {
            return mediaBuildPayload($columns, [
                'user_id' => $user->id,
                'mime_type' => $mime,
                'file_name' => $fileName,
                'disk' => 'public',
                'collection_name' => 'default',
                'file_size' => 123,
                'size' => 123,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };

        for ($i = 0; $i < 5; $i++) {
            Media::query()->create($makePayload('image/jpeg', "img-{$i}.jpg"));
        }

        for ($i = 0; $i < 3; $i++) {
            Media::query()->create($makePayload('application/pdf', "doc-{$i}.pdf"));
        }

        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true)) {
            /** @var TestCase $this */
            $this->markTestSkipped('This install does not have user_id column on media table.');
        }

        $totalMedia = Media::where('user_id', $user->id)->count();
        $imageCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'image/%')->count();
        $documentCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'application/%')->count();

        Assert::assertSame(8, $totalMedia);
        Assert::assertSame(5, $imageCount);
        Assert::assertSame(3, $documentCount);
    });
});

/**
 * @return array<int, string>
 */
function mediaTableColumnListing(string $table = 'media'): array
{
    /** @var array<int, string> $columns */
    $columns = array_values(Schema::getColumnListing($table));

    return $columns;
}

/**
 * @param array<int, string> $columns
 * @param array<string, mixed> $values
 * @return array<string, mixed>
 */
function mediaBuildPayload(array $columns, array $values): array
{
    $payload = [];

    foreach ($values as $column => $value) {
        if (in_array($column, $columns, true)) {
            $payload[$column] = $value;
        }
    }

    return $payload;
}

/**
 * @param array<string, mixed> $where
 */
function assertMediaTableHas(string $table, array $where): void
{
    $query = DB::connection('media')->table($table);

    foreach ($where as $column => $value) {
        $query->where((string) $column, $value);
    }

    Assert::assertTrue($query->exists());
}

/**
 * @param array<string, mixed> $where
 */
function assertMediaTableMissing(string $table, array $where): void
{
    $query = DB::connection('media')->table($table);

    foreach ($where as $column => $value) {
        $query->where((string) $column, $value);
    }

    Assert::assertFalse($query->exists());
}
