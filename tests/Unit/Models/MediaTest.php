<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Models;

<<<<<<< HEAD
use Modules\Media\Database\Factories\MediaFactory;
use Modules\Media\Models\Media;
use Modules\Media\Tests\TestCase;
use Modules\Xot\Actions\Cast\SafeIntCastAction;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/**
 * @param  array<string, mixed>  $attributes
 */
function mediaTestCreate(array $attributes = []): Media
{
    return MediaFactory::new()->createOne($attributes);
}

describe('Media model (database)', function (): void {
    it('can create media with minimal data', function (): void {
        $media = mediaTestCreate([
            'model_type' => 'Modules\User\Models\User',
=======
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Media\Models\Media;
use Tests\TestCase;

class MediaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_media_with_minimal_data(): void
    {
        $media = Media::factory()->create([
            'model_type' => 'App\Models\User',
>>>>>>> 4e14511d (.)
            'model_id' => '1',
            'collection_name' => 'avatars',
            'name' => 'test-image',
            'file_name' => 'test-image.jpg',
            'disk' => 'public',
            'size' => 1024,
        ]);

<<<<<<< HEAD
        XotBasePest::assertTableHas('media', 'media', [
            'id' => SafeIntCastAction::cast($media->getKey()),
=======
        $this->assertDatabaseHas('media', [
            'id' => $media->id,
            'model_type' => 'App\Models\User',
            'model_id' => '1',
>>>>>>> 4e14511d (.)
            'collection_name' => 'avatars',
            'name' => 'test-image',
            'file_name' => 'test-image.jpg',
            'disk' => 'public',
            'size' => 1024,
        ]);
<<<<<<< HEAD
    });

    it('can create media with all fields', function (): void {
        $mediaData = [
            'model_type' => 'App\\Models\\Post',
=======
    }

    public function test_can_create_media_with_all_fields(): void
    {
        $mediaData = [
            'model_type' => 'App\Models\Post',
>>>>>>> 4e14511d (.)
            'model_id' => '123',
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
            'collection_name' => 'images',
            'name' => 'full-image',
            'file_name' => 'full-image.png',
            'mime_type' => 'image/png',
            'disk' => 's3',
            'conversions_disk' => 's3-conversions',
            'size' => 2048,
            'manipulations' => ['resize' => ['width' => 800, 'height' => 600]],
<<<<<<< HEAD
            'custom_properties' => [
                'alt' => 'Alternative text',
                'title' => 'Image title',
                'description' => 'Image description',
                'caption' => 'Image caption',
                'exif' => ['camera' => 'Canon', 'iso' => 100],
                'curations' => ['featured' => true, 'gallery' => false],
            ],
            'generated_conversions' => ['thumb' => true, 'medium' => true],
            'responsive_images' => ['thumb' => 'thumb.jpg', 'medium' => 'medium.jpg'],
            'order_column' => 1,
        ];

        $media = mediaTestCreate($mediaData);

        XotBasePest::assertTableHas('media', 'media', [
            'id' => SafeIntCastAction::cast($media->getKey()),
=======
            'custom_properties' => ['alt' => 'Test Image', 'caption' => 'A test image'],
            'generated_conversions' => ['thumb' => true, 'medium' => true],
            'responsive_images' => ['thumb' => 'thumb.jpg', 'medium' => 'medium.jpg'],
            'order_column' => 1,
            'directory' => 'posts/images',
            'path' => 'posts/images/full-image.png',
            'width' => 1920,
            'height' => 1080,
            'type' => 'image',
            'ext' => 'png',
            'alt' => 'Alternative text',
            'title' => 'Image title',
            'description' => 'Image description',
            'caption' => 'Image caption',
            'exif' => ['camera' => 'Canon', 'iso' => 100],
            'curations' => ['featured' => true, 'gallery' => false],
        ];

        $media = Media::factory()->create($mediaData);

        $this->assertDatabaseHas('media', [
            'id' => $media->id,
            'model_type' => 'App\Models\Post',
            'model_id' => '123',
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
>>>>>>> 4e14511d (.)
            'collection_name' => 'images',
            'name' => 'full-image',
            'file_name' => 'full-image.png',
            'mime_type' => 'image/png',
            'disk' => 's3',
            'conversions_disk' => 's3-conversions',
            'size' => 2048,
            'order_column' => 1,
<<<<<<< HEAD
        ]);

        // Verifica campi JSON
        expect($media->manipulations)->toBe(['resize' => ['width' => 800, 'height' => 600]]);
        expect($media->custom_properties)->toBe([
=======
            'directory' => 'posts/images',
            'path' => 'posts/images/full-image.png',
            'width' => 1920,
            'height' => 1080,
            'type' => 'image',
            'ext' => 'png',
>>>>>>> 4e14511d (.)
            'alt' => 'Alternative text',
            'title' => 'Image title',
            'description' => 'Image description',
            'caption' => 'Image caption',
<<<<<<< HEAD
            'exif' => ['camera' => 'Canon', 'iso' => 100],
            'curations' => ['featured' => true, 'gallery' => false],
        ]);
        expect($media->generated_conversions)->toBe(['thumb' => true, 'medium' => true]);
        expect($media->responsive_images)->toBe(['thumb' => 'thumb.jpg', 'medium' => 'medium.jpg']);
    });

    it('media delete removes the record', function (): void {
        $media = mediaTestCreate();
        $mediaId = SafeIntCastAction::cast($media->getKey());

        $media->delete();

        XotBasePest::assertTableMissing('media', 'media', ['id' => $mediaId]);
    });

    it('can find media by model type', function (): void {
        $media = mediaTestCreate(['model_type' => 'App\Models\UniqueModel']);

        $foundMedia = Media::where('model_type', 'App\Models\UniqueModel')->first();

        Assert::assertInstanceOf(Media::class, $foundMedia);
        expect($media->id)->toBe($foundMedia->id);
    });

    it('can find media by model id', function (): void {
        $media = mediaTestCreate(['model_id' => '999']);

        $foundMedia = Media::where('model_id', '999')->first();

        Assert::assertInstanceOf(Media::class, $foundMedia);
        expect($media->id)->toBe($foundMedia->id);
    });

    it('can find media by collection name', function (): void {
        MediaFactory::new()->createOne(['collection_name' => 'avatars']);
        MediaFactory::new()->createOne(['collection_name' => 'images']);
        MediaFactory::new()->createOne(['collection_name' => 'documents']);

        $avatarMedia = Media::where('collection_name', 'avatars')->get();

        expect($avatarMedia)->toHaveCount(1);
        $firstAvatarMedia = $avatarMedia->first();
        Assert::assertInstanceOf(Media::class, $firstAvatarMedia);
        expect($firstAvatarMedia->collection_name)->toBe('avatars');
    });

    it('can find media by name', function (): void {
        $media = mediaTestCreate(['name' => 'unique-media-name']);

        $foundMedia = Media::where('name', 'unique-media-name')->first();

        Assert::assertInstanceOf(Media::class, $foundMedia);
        expect($media->id)->toBe($foundMedia->id);
    });

    it('can find media by file name', function (): void {
        $media = mediaTestCreate(['file_name' => 'unique-file.jpg']);

        $foundMedia = Media::where('file_name', 'unique-file.jpg')->first();

        Assert::assertInstanceOf(Media::class, $foundMedia);
        expect($media->id)->toBe($foundMedia->id);
    });

    it('can find media by disk', function (): void {
        MediaFactory::new()->createOne(['disk' => 'public']);
        MediaFactory::new()->createOne(['disk' => 's3']);
        MediaFactory::new()->createOne(['disk' => 'local']);

        $publicMedia = Media::where('disk', 'public')->get();

        expect($publicMedia)->toHaveCount(1);
        $firstPublicMedia = $publicMedia->first();
        Assert::assertInstanceOf(Media::class, $firstPublicMedia);
        expect($firstPublicMedia->disk)->toBe('public');
    });

    it('can find media by mime type', function (): void {
        MediaFactory::new()->createOne(['mime_type' => 'image/jpeg']);
        MediaFactory::new()->createOne(['mime_type' => 'image/png']);
        MediaFactory::new()->createOne(['mime_type' => 'application/pdf']);

        $jpegMedia = Media::where('mime_type', 'image/jpeg')->get();

        expect($jpegMedia)->toHaveCount(1);
        $firstJpegMedia = $jpegMedia->first();
        Assert::assertInstanceOf(Media::class, $firstJpegMedia);
        expect($firstJpegMedia->mime_type)->toBe('image/jpeg');
    });

    it('can find media by size range', function (): void {
        MediaFactory::new()->createOne(['size' => 512]);
        MediaFactory::new()->createOne(['size' => 1024]);
        MediaFactory::new()->createOne(['size' => 2048]);

        $largeMedia = Media::where('size', '>', 1000)->get();

        expect($largeMedia)->toHaveCount(2);
        expect($largeMedia->every(fn (Media $media): bool => $media->size > 1000))->toBeTrue();
    });

    it('can find media by name pattern', function (): void {
        MediaFactory::new()->createOne(['name' => 'profile-avatar']);
        MediaFactory::new()->createOne(['name' => 'cover-image']);
        MediaFactory::new()->createOne(['name' => 'logo-brand']);

        $profileMedia = Media::where('name', 'like', '%profile%')->get();

        expect($profileMedia->count())->toBeGreaterThanOrEqual(1);
        expect($profileMedia->contains(fn (Media $media): bool => str_contains($media->name, 'profile')))->toBeTrue();
    });

    it('can find media by custom properties', function (): void {
        MediaFactory::new()->createOne([
            'custom_properties' => ['alt' => 'Profile picture', 'category' => 'avatar'],
        ]);

        MediaFactory::new()->createOne([
=======
        ]);

        // Verifica campi JSON
        static::assertSame(['resize' => ['width' => 800, 'height' => 600]], $media->manipulations);
        static::assertSame(['alt' => 'Test Image', 'caption' => 'A test image'], $media->custom_properties);
        static::assertSame(['thumb' => true, 'medium' => true], $media->generated_conversions);
        static::assertSame(['thumb' => 'thumb.jpg', 'medium' => 'medium.jpg'], $media->responsive_images);
        static::assertSame(['camera' => 'Canon', 'iso' => 100], $media->exif);
        static::assertSame(['featured' => true, 'gallery' => false], $media->curations);
    }

    public function test_media_has_soft_deletes(): void
    {
        $media = Media::factory()->create();
        $mediaId = $media->id;

        $media->delete();

        $this->assertSoftDeleted('media', ['id' => $mediaId]);
        $this->assertDatabaseMissing('media', ['id' => $mediaId]);
    }

    public function test_can_restore_soft_deleted_media(): void
    {
        $media = Media::factory()->create();
        $mediaId = $media->id;

        $media->delete();
        $this->assertSoftDeleted('media', ['id' => $mediaId]);

        $restoredMedia = Media::withTrashed()->find($mediaId);
        $restoredMedia->restore();

        $this->assertDatabaseHas('media', ['id' => $mediaId]);
        static::assertNull($restoredMedia->deleted_at);
    }

    public function test_can_find_media_by_model_type(): void
    {
        $media = Media::factory()->create(['model_type' => 'App\Models\UniqueModel']);

        $foundMedia = Media::where('model_type', 'App\Models\UniqueModel')->first();

        static::assertNotNull($foundMedia);
        static::assertSame($media->id, $foundMedia->id);
    }

    public function test_can_find_media_by_model_id(): void
    {
        $media = Media::factory()->create(['model_id' => '999']);

        $foundMedia = Media::where('model_id', '999')->first();

        static::assertNotNull($foundMedia);
        static::assertSame($media->id, $foundMedia->id);
    }

    public function test_can_find_media_by_collection_name(): void
    {
        Media::factory()->create(['collection_name' => 'avatars']);
        Media::factory()->create(['collection_name' => 'images']);
        Media::factory()->create(['collection_name' => 'documents']);

        $avatarMedia = Media::where('collection_name', 'avatars')->get();

        static::assertCount(1, $avatarMedia);
        static::assertSame('avatars', $avatarMedia->first()->collection_name);
    }

    public function test_can_find_media_by_name(): void
    {
        $media = Media::factory()->create(['name' => 'unique-media-name']);

        $foundMedia = Media::where('name', 'unique-media-name')->first();

        static::assertNotNull($foundMedia);
        static::assertSame($media->id, $foundMedia->id);
    }

    public function test_can_find_media_by_file_name(): void
    {
        $media = Media::factory()->create(['file_name' => 'unique-file.jpg']);

        $foundMedia = Media::where('file_name', 'unique-file.jpg')->first();

        static::assertNotNull($foundMedia);
        static::assertSame($media->id, $foundMedia->id);
    }

    public function test_can_find_media_by_disk(): void
    {
        Media::factory()->create(['disk' => 'public']);
        Media::factory()->create(['disk' => 's3']);
        Media::factory()->create(['disk' => 'local']);

        $publicMedia = Media::where('disk', 'public')->get();

        static::assertCount(1, $publicMedia);
        static::assertSame('public', $publicMedia->first()->disk);
    }

    public function test_can_find_media_by_mime_type(): void
    {
        Media::factory()->create(['mime_type' => 'image/jpeg']);
        Media::factory()->create(['mime_type' => 'image/png']);
        Media::factory()->create(['mime_type' => 'application/pdf']);

        $jpegMedia = Media::where('mime_type', 'image/jpeg')->get();

        static::assertCount(1, $jpegMedia);
        static::assertSame('image/jpeg', $jpegMedia->first()->mime_type);
    }

    public function test_can_find_media_by_size_range(): void
    {
        Media::factory()->create(['size' => 512]);
        Media::factory()->create(['size' => 1024]);
        Media::factory()->create(['size' => 2048]);

        $largeMedia = Media::where('size', '>', 1000)->get();

        static::assertCount(2, $largeMedia);
        static::assertTrue($largeMedia->every(fn ($media) => $media->size > 1000));
    }

    public function test_can_find_media_by_type(): void
    {
        Media::factory()->create(['type' => 'image']);
        Media::factory()->create(['type' => 'video']);
        Media::factory()->create(['type' => 'document']);

        $imageMedia = Media::where('type', 'image')->get();

        static::assertCount(1, $imageMedia);
        static::assertSame('image', $imageMedia->first()->type);
    }

    public function test_can_find_media_by_extension(): void
    {
        Media::factory()->create(['ext' => 'jpg']);
        Media::factory()->create(['ext' => 'png']);
        Media::factory()->create(['ext' => 'pdf']);

        $jpgMedia = Media::where('ext', 'jpg')->get();

        static::assertCount(1, $jpgMedia);
        static::assertSame('jpg', $jpgMedia->first()->ext);
    }

    public function test_can_find_media_by_dimensions(): void
    {
        Media::factory()->create(['width' => 1920, 'height' => 1080]);
        Media::factory()->create(['width' => 800, 'height' => 600]);
        Media::factory()->create(['width' => 400, 'height' => 300]);

        $hdMedia = Media::where('width', '>=', 1920)->get();

        static::assertCount(1, $hdMedia);
        static::assertSame(1920, $hdMedia->first()->width);
    }

    public function test_can_find_media_by_name_pattern(): void
    {
        Media::factory()->create(['name' => 'profile-avatar']);
        Media::factory()->create(['name' => 'cover-image']);
        Media::factory()->create(['name' => 'logo-brand']);

        $profileMedia = Media::where('name', 'like', '%profile%')->get();

        static::assertCount(1, $profileMedia);
        static::assertTrue($profileMedia->every(fn ($media) => str_contains($media->name, 'profile')));
    }

    public function test_can_find_media_by_custom_properties(): void
    {
        Media::factory()->create([
            'custom_properties' => ['alt' => 'Profile picture', 'category' => 'avatar'],
        ]);

        Media::factory()->create([
>>>>>>> 4e14511d (.)
            'custom_properties' => ['alt' => 'Cover image', 'category' => 'banner'],
        ]);

        $avatarMedia = Media::whereJsonContains('custom_properties->category', 'avatar')->get();

<<<<<<< HEAD
        expect($avatarMedia->count())->toBeGreaterThanOrEqual(1);
        expect($avatarMedia->contains(fn (Media $media): bool => ($media->custom_properties['category'] ?? null) === 'avatar'))->toBeTrue();
    });

    it('can find media by manipulations', function (): void {
        MediaFactory::new()->createOne([
            'manipulations' => ['resize' => ['width' => 800, 'height' => 600]],
        ]);

        MediaFactory::new()->createOne([
            'manipulations' => ['crop' => ['x' => 0, 'y' => 0, 'width' => 400, 'height' => 300]],
        ]);

        // `whereJsonContains` con un valore array non è traducibile su SQLite: Laravel lo
        // rende con `json_each(...) where value is <array>` e il driver risponde
        // «column index out of range». Il path esplicito passa da `json_extract` ed è
        // portabile su entrambi i motori, senza cambiare ciò che il test verifica.
        $resizeMedia = Media::query()
            ->where('manipulations->resize->width', 800)
            ->where('manipulations->resize->height', 600)
            ->get();

        expect($resizeMedia->count())->toBeGreaterThanOrEqual(1);
        expect($resizeMedia->contains(fn (Media $media): bool => array_key_exists('resize', $media->manipulations ?? [])))->toBeTrue();
    });

    it('can update media', function (): void {
        $media = mediaTestCreate(['name' => 'Old Name']);

        $media->update(['name' => 'New Name']);

        XotBasePest::assertTableHas('media', 'media', [
            'id' => SafeIntCastAction::cast($media->getKey()),
            'name' => 'New Name',
        ]);
    });

    it('can handle null values', function (): void {
        $media = mediaTestCreate([
=======
        static::assertCount(1, $avatarMedia);
        static::assertSame('avatar', $avatarMedia->first()->custom_properties['category']);
    }

    public function test_can_find_media_by_manipulations(): void
    {
        Media::factory()->create([
            'manipulations' => ['resize' => ['width' => 800, 'height' => 600]],
        ]);

        Media::factory()->create([
            'manipulations' => ['crop' => ['x' => 0, 'y' => 0, 'width' => 400, 'height' => 300]],
        ]);

        $resizeMedia = Media::whereJsonContains('manipulations->resize', ['width' => 800, 'height' => 600])->get();

        static::assertCount(1, $resizeMedia);
        static::assertArrayHasKey('resize', $resizeMedia->first()->manipulations);
    }

    public function test_can_update_media(): void
    {
        $media = Media::factory()->create(['name' => 'Old Name']);

        $media->update(['name' => 'New Name']);

        $this->assertDatabaseHas('media', [
            'id' => $media->id,
            'name' => 'New Name',
        ]);
    }

    public function test_can_handle_null_values(): void
    {
        $media = Media::factory()->create([
>>>>>>> 4e14511d (.)
            'model_type' => 'App\Models\Test',
            'model_id' => '1',
            'collection_name' => 'test',
            'name' => 'test',
            'file_name' => 'test.jpg',
            'disk' => 'public',
            'size' => 1024,
            'uuid' => null,
            'mime_type' => null,
            'conversions_disk' => null,
<<<<<<< HEAD
            'manipulations' => [],
            'custom_properties' => [],
            'generated_conversions' => [],
            'responsive_images' => [],
            'order_column' => null,
        ]);

        // Spatie Media may generate a UUID even if null is provided.
        // Verify via casts (less brittle than DB JSON string matching).
        $fresh = $media->fresh();
        Assert::assertInstanceOf(Media::class, $fresh);
        expect($fresh->mime_type)->toBeNull();
        expect($fresh->conversions_disk)->toBeNull();
        // `order_column` non resta null: Spatie usa il trait `SortableTrait`, che in
        // `creating` assegna il numero d'ordine più alto disponibile. Passargli null non lo
        // disattiva — asserire il contrario significava dare per rotto il comportamento
        // documentato della libreria.
        expect($fresh->order_column)->toBeInt()->toBeGreaterThan(0);
        expect($fresh->manipulations)->toBe([]);
        expect($fresh->custom_properties)->toBe([]);
        expect($fresh->generated_conversions)->toBe([]);
        expect($fresh->responsive_images)->toBe([]);
    });

    it('media has media converts relationship', function (): void {
        $media = mediaTestCreate();
        $reflection = new \ReflectionClass($media);

        expect($reflection->hasMethod('mediaConverts'))->toBeTrue();
    });

    it('media has temporary upload relationship', function (): void {
        $media = mediaTestCreate();
        $reflection = new \ReflectionClass($media);

        expect($reflection->hasMethod('temporaryUpload'))->toBeTrue();
    });

    it('media has creator relationship', function (): void {
        $media = mediaTestCreate();
        $reflection = new \ReflectionClass($media);

        expect($reflection->hasMethod('creator'))->toBeTrue();
    });

    it('media can get url conversion', function (): void {
        $media = mediaTestCreate([
            'file_name' => 'test-image.jpg',
        ]);

        $thumbUrl = $media->getUrlConv('thumb');
        expect($thumbUrl)->toContain('thumb.jpg');

        $url800 = $media->getUrlConv('800');
        expect($url800)->toContain('800.jpg');

        $url400 = $media->getUrlConv('400');
        expect($url400)->toContain('400.jpg');
    });

    it('media has entry conversions attribute', function (): void {
        $media = mediaTestCreate([
=======
            'manipulations' => null,
            'custom_properties' => null,
            'generated_conversions' => null,
            'responsive_images' => null,
            'order_column' => null,
            'directory' => null,
            'path' => null,
            'width' => null,
            'height' => null,
            'type' => null,
            'ext' => null,
            'alt' => null,
            'title' => null,
            'description' => null,
            'caption' => null,
            'exif' => null,
            'curations' => null,
        ]);

        $this->assertDatabaseHas('media', [
            'id' => $media->id,
            'uuid' => null,
            'mime_type' => null,
            'conversions_disk' => null,
            'order_column' => null,
            'directory' => null,
            'path' => null,
            'width' => null,
            'height' => null,
            'type' => null,
            'ext' => null,
            'alt' => null,
            'title' => null,
            'description' => null,
            'caption' => null,
        ]);
    }

    public function test_can_find_media_by_multiple_criteria(): void
    {
        Media::factory()->create([
            'collection_name' => 'avatars',
            'type' => 'image',
            'ext' => 'jpg',
        ]);

        Media::factory()->create([
            'collection_name' => 'documents',
            'type' => 'document',
            'ext' => 'pdf',
        ]);

        $avatarImages = Media::where('collection_name', 'avatars')->where('type', 'image')->get();

        static::assertCount(1, $avatarImages);
        static::assertSame('avatars', $avatarImages->first()->collection_name);
        static::assertSame('image', $avatarImages->first()->type);
    }

    public function test_media_has_media_converts_relationship(): void
    {
        $media = Media::factory()->create();

        static::assertTrue(method_exists($media, 'mediaConverts'));
    }

    public function test_media_has_temporary_upload_relationship(): void
    {
        $media = Media::factory()->create();

        static::assertTrue(method_exists($media, 'temporaryUpload'));
    }

    public function test_media_has_creator_relationship(): void
    {
        $media = Media::factory()->create();

        static::assertTrue(method_exists($media, 'creator'));
    }

    public function test_media_can_get_url_conversion(): void
    {
        $media = Media::factory()->create([
            'file_name' => 'test-image.jpg',
            'directory' => 'test',
        ]);

        $thumbUrl = $media->getUrlConv('thumb');
        static::assertStringContainsString('thumb.jpg', $thumbUrl);

        $url800 = $media->getUrlConv('800');
        static::assertStringContainsString('800.jpg', $url800);

        $url400 = $media->getUrlConv('400');
        static::assertStringContainsString('400.jpg', $url400);
    }

    public function test_media_has_entry_conversions_attribute(): void
    {
        $media = Media::factory()->create([
>>>>>>> 4e14511d (.)
            'generated_conversions' => ['thumb' => true, 'medium' => false],
        ]);

        $entryConversions = $media->entry_conversions;

<<<<<<< HEAD
        expect($entryConversions)->toHaveCount(2);
        expect($entryConversions[0])->toHaveKey('name');
        expect($entryConversions[0])->toHaveKey('generated');
        expect($entryConversions[0])->toHaveKey('src');
    });

    it('media has factory', function (): void {
        $media = mediaTestCreate();

        expect($media->id)->toBeGreaterThan(0);
    });
});

it('media has casts', function (): void {
    $media = new Media();

    $expectedCasts = [
        'id' => 'integer',
        'uuid' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'updated_by' => 'string',
        'created_by' => 'string',
        'deleted_by' => 'string',
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'generated_conversions' => 'array',
        'responsive_images' => 'array',
    ];

    $actualCasts = $media->getCasts();

    ksort($expectedCasts);
    ksort($actualCasts);

    expect($actualCasts)->toBe($expectedCasts);
});
=======
        static::assertIsArray($entryConversions);
        static::assertCount(2, $entryConversions);
        static::assertArrayHasKey('name', $entryConversions[0]);
        static::assertArrayHasKey('generated', $entryConversions[0]);
        static::assertArrayHasKey('src', $entryConversions[0]);
    }

    public function test_media_has_factory(): void
    {
        $media = Media::factory()->create();

        static::assertNotNull($media->id);
        static::assertInstanceOf(Media::class, $media);
    }

    public function test_media_has_casts(): void
    {
        $media = new Media;

        $expectedCasts = [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'manipulations' => 'array',
            'custom_properties' => 'array',
            'generated_conversions' => 'array',
            'responsive_images' => 'array',
        ];

        static::assertSame($expectedCasts, $media->getCasts());
    }
}
>>>>>>> 4e14511d (.)
