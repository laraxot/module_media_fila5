<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Closure;
use Exception;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Http\UploadedFile;
use Modules\Media\Database\Factories\TemporaryUploadFactory;
use Modules\Media\Exceptions\CouldNotAddUpload;
use Modules\Media\Exceptions\TemporaryUploadDoesNotBelongToCurrentSession;
=======
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Modules\Media\Database\Factories\TemporaryUploadFactory;
use Modules\Media\Exceptions\CouldNotAddUpload;
use Modules\Media\Exceptions\TemporaryUploadDoesNotBelongToCurrentSession;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> be7d0c3 (.)
use Modules\Xot\Models\Traits\HasXotFactory;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
<<<<<<< HEAD
=======
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
>>>>>>> be7d0c3 (.)
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * @property string $session_id
 */
class TemporaryUpload extends BaseModel implements HasMedia
{
    /** @phpstan-use HasXotFactory<TemporaryUploadFactory, TemporaryUpload> */
    use HasXotFactory;

    use InteractsWithMedia;
    use MassPrunable;

=======
 * Modules\Media\Models\TemporaryUpload.
 *
 * @property string $id
 * @property string $session_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 *
 * @method static Builder<static>|TemporaryUpload newModelQuery()
 * @method static Builder<static>|TemporaryUpload newQuery()
 * @method static Builder<static>|TemporaryUpload query()
 * @method static Builder<static>|TemporaryUpload whereCreatedAt($value)
 * @method static Builder<static>|TemporaryUpload whereId($value)
 * @method static Builder<static>|TemporaryUpload whereSessionId($value)
 * @method static Builder<static>|TemporaryUpload whereUpdatedAt($value)
 *
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|TemporaryUpload whereCreatedBy($value)
 * @method static Builder<static>|TemporaryUpload whereDeletedAt($value)
 * @method static Builder<static>|TemporaryUpload whereDeletedBy($value)
 * @method static Builder<static>|TemporaryUpload whereUpdatedBy($value)
 * @method static TemporaryUploadFactory factory($count = null, $state = [])
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
 * @property string|null $user_id
 * @property string $file_name
 * @property int|null $file_size
 * @property string|null $mime_type
 * @property string $status
 *
 * @method static Builder<static>|TemporaryUpload whereFileName($value)
 * @method static Builder<static>|TemporaryUpload whereFileSize($value)
 * @method static Builder<static>|TemporaryUpload whereMimeType($value)
 * @method static Builder<static>|TemporaryUpload whereStatus($value)
 * @method static Builder<static>|TemporaryUpload whereUserId($value)
 *
 * @mixin \Eloquent
 */
class TemporaryUpload extends BaseModel implements HasMedia
{
    /** @phpstan-use HasXotFactory<TemporaryUploadFactory> */
    use HasXotFactory;

    use HasUuids;
    use InteractsWithMedia;
    use MassPrunable;

    public $incrementing = false;

>>>>>>> be7d0c3 (.)
    public static ?Closure $manipulatePreview = null;

    public static ?string $disk = null;

    /** @var string */
    protected $connection = 'media';

<<<<<<< HEAD
=======
    /**
     * @var array<string>
     */
>>>>>>> be7d0c3 (.)
    protected $guarded = [];

    public static function findByMediaUuid(?string $mediaUuid): ?self
    {
<<<<<<< HEAD
        $mediaModelClass = config('media-library.media_model');
        Assert::string($mediaModelClass);
        /** @var class-string<Media> $mediaModelClass */
        $media = $mediaModelClass::query()->where('uuid', $mediaUuid)->first();

        if (! $media instanceof Media) {
=======
        Assert::string($mediaModelClass = config('media-library.media_model'));
        Assert::subclassOf($mediaModelClass, Media::class);

        /** @var class-string<Media> $mediaModelClass */
        $media = $mediaModelClass::query()->where('uuid', $mediaUuid)->first();

        if (! $media) {
>>>>>>> be7d0c3 (.)
            return null;
        }

        $temporaryUpload = $media->model;

        if (! ($temporaryUpload instanceof self)) {
            return null;
        }

        return $temporaryUpload;
    }

    public static function findByMediaUuidInCurrentSession(?string $mediaUuid): ?self
    {
<<<<<<< HEAD
        if (! (($temporaryUpload = static::findByMediaUuid($mediaUuid)) instanceof self)) {
=======
        $temporaryUpload = static::findByMediaUuid($mediaUuid);

        if (! ($temporaryUpload instanceof self)) {
>>>>>>> be7d0c3 (.)
            return null;
        }

        if (
            config('media-library.enable_temporary_uploads_session_affinity', true) &&
                $temporaryUpload->session_id !== session()->getId()
        ) {
            return null;
        }

        return $temporaryUpload;
    }

    public static function createForFile(
        UploadedFile $uploadedFile,
        string $sessionId,
        string $uuid,
        string $name,
    ): self {
<<<<<<< HEAD
=======
        /**
         * @var TemporaryUpload $temporaryUpload
         */
>>>>>>> be7d0c3 (.)
        $temporaryUpload = static::create([
            'session_id' => $sessionId,
        ]);

        if (static::findByMediaUuid($uuid) instanceof self) {
            throw CouldNotAddUpload::uuidAlreadyExists();
        }

        $temporaryUpload
            ->addMedia($uploadedFile)
            ->setName($name)
            ->withProperties(['uuid' => $uuid])
            ->toMediaCollection('default', static::getDiskName());
        // Debugbar::info('TemporaruUpload UUID', $uuid);
        $temporaryUpload->fresh();

        return $temporaryUpload;
    }

    public static function createForRemoteFile(
        string $file,
        string $sessionId,
        string $uuid,
        string $name,
        string $diskName,
    ): self {
<<<<<<< HEAD
=======
        /**
         * @var TemporaryUpload $temporaryUpload
         */
>>>>>>> be7d0c3 (.)
        $temporaryUpload = static::create([
            'session_id' => $sessionId,
        ]);

        if (static::findByMediaUuid($uuid) instanceof self) {
            throw CouldNotAddUpload::uuidAlreadyExists();
        }

        $temporaryUpload
            ->addMediaFromDisk($file, $diskName)
            ->setName($name)
            ->usingFileName($name)
            ->withProperties(['uuid' => $uuid])
            ->toMediaCollection('default', static::getDiskName());

        $temporaryUpload->fresh();

        return $temporaryUpload;
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        if (! config('media-library.generate_thumbnails_for_temporary_uploads')) {
            return;
        }

<<<<<<< HEAD
        $conversion = $this->addMediaConversion('preview')->nonQueued();
=======
        $conversion = $this->addMediaConversion('preview');
>>>>>>> be7d0c3 (.)

        $previewManipulation = $this->getPreviewManipulation();

        $previewManipulation($conversion);
    }

    public function moveMedia(HasMedia $hasMedia, string $collectionName, string $diskName, string $fileName): Media
    {
        if (
            config('media-library.enable_temporary_uploads_session_affinity', true) &&
                $this->session_id !== session()->getId()
        ) {
            throw TemporaryUploadDoesNotBelongToCurrentSession::create();
        }

        $media = $this->getFirstMedia();

        // if (! $media instanceof \Spatie\MediaLibrary\MediaCollections\Models\Media) {
        //    throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        // }
        Assert::isInstanceOf($media, Media::class, '['.__LINE__.']['.class_basename($this).']');

        $temporaryUploadModel = $media->model;
        $uuid = $media->uuid;

        $newMedia = $media->move($hasMedia, $collectionName, $diskName, $fileName);

        $temporaryUploadModel?->delete();

        $newMedia->update(['uuid' => $uuid]);

        return $newMedia;
    }

    protected static function getDiskName(): string
    {
        $res = static::$disk ?? config('media-library.disk_name');
        if (\is_string($res)) {
            return $res;
        }
        throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
    }

    // public function prunable(): Builder
    // { Call to an undefined method Illuminate\Database\Eloquent\Builder<Modules\Media\Models\TemporaryUpload>::old().
    //    return self::query()->old();
    // }

    protected function getPreviewManipulation(): Closure
    {
        return static::$manipulatePreview ?? function (Conversion $conversion): void {
            $conversion->fit(Fit::Crop, 300, 300);

            // $conversion->fit('crop', 300, 300);
        };
    }
}
