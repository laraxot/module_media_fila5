<?php

<<<<<<< HEAD
/**
 * ---.
 */

=======
>>>>>>> 9b998103 (.)
declare(strict_types=1);

namespace Modules\Media\Models;

<<<<<<< HEAD
use Modules\Xot\Models\Traits\HasXotFactory;
=======
>>>>>>> 9b998103 (.)
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\Factory;
>>>>>>> 9b998103 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Media\Database\Factories\MediaFactory;
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
=======
use Modules\User\Models\User;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits\HasXotFactory;
>>>>>>> 9b998103 (.)
use Modules\Xot\Traits\Updater;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

/**
<<<<<<< HEAD
 * Modules\Media\Models\Media.
 *
 * @property int $id
 * @property string $model_type
 * @property string $model_id
=======
 * @property-read User|null $creator
 * @property-read mixed $extension
 * @property-read array<int, array{name: string, generated: bool, src: string}> $entry_conversions
 * @property-read string $path
 * @property-read mixed $human_readable_size
 * @property-read EloquentCollection<int, MediaConvert> $mediaConverts
 * @property-read int|null $media_converts_count
 * @property-read Model|Eloquent $model
 * @property-read mixed $original_url
 * @property-read mixed $preview_url
 * @property-read TemporaryUpload|null $temporaryUpload
 * @property-read mixed $type
 * @property-read ProfileContract|null $updater
 *
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static \Modules\Media\Database\Factories\MediaFactory factory($count = null, $state = [])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static Builder<static>|Media newModelQuery()
 * @method static Builder<static>|Media newQuery()
 * @method static Builder<static>|Media ordered()
 * @method static Builder<static>|Media query()
 *
 * @property int $id
 * @property string $model_type
 * @property string|null $model_id
>>>>>>> 9b998103 (.)
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
<<<<<<< HEAD
 * @property array|null $manipulations
 * @property array|null $custom_properties
 * @property array|null $generated_conversions
 * @property array|null $responsive_images
 * @property int|null $order_column
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $user_id
 * @property string $directory
 * @property string|null $path
 * @property int|null $width
 * @property int|null $height
 * @property string|null $type
 * @property string|null $ext
 * @property string|null $alt
 * @property string|null $title
 * @property string|null $description
 * @property string|null $caption
 * @property string|null $exif
 * @property string|null $curations
 * @property UserContract|null $creator
 * @property Model|Eloquent $model
 * @property TemporaryUpload|null $temporaryUpload
 *
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static Builder|Media newModelQuery()
 * @method static Builder|Media newQuery()
 * @method static Builder|Media ordered()
 * @method static Builder|Media query()
 * @method static Builder|Media whereAlt($value)
 * @method static Builder|Media whereCaption($value)
 * @method static Builder|Media whereCollectionName($value)
 * @method static Builder|Media whereConversionsDisk($value)
 * @method static Builder|Media whereCreatedAt($value)
 * @method static Builder|Media whereCreatedBy($value)
 * @method static Builder|Media whereCurations($value)
 * @method static Builder|Media whereCustomProperties($value)
 * @method static Builder|Media whereDescription($value)
 * @method static Builder|Media whereDirectory($value)
 * @method static Builder|Media whereDisk($value)
 * @method static Builder|Media whereExif($value)
 * @method static Builder|Media whereExt($value)
 * @method static Builder|Media whereFileName($value)
 * @method static Builder|Media whereGeneratedConversions($value)
 * @method static Builder|Media whereHeight($value)
 * @method static Builder|Media whereId($value)
 * @method static Builder|Media whereManipulations($value)
 * @method static Builder|Media whereMimeType($value)
 * @method static Builder|Media whereModelId($value)
 * @method static Builder|Media whereModelType($value)
 * @method static Builder|Media whereName($value)
 * @method static Builder|Media whereOrderColumn($value)
 * @method static Builder|Media wherePath($value)
 * @method static Builder|Media whereResponsiveImages($value)
 * @method static Builder|Media whereSize($value)
 * @method static Builder|Media whereTitle($value)
 * @method static Builder|Media whereType($value)
 * @method static Builder|Media whereUpdatedAt($value)
 * @method static Builder|Media whereUpdatedBy($value)
 * @method static Builder|Media whereUserId($value)
 * @method static Builder|Media whereUuid($value)
 * @method static Builder|Media whereWidth($value)
 *
 * @property mixed $extension
 * @property mixed $human_readable_size
 * @property mixed $original_url
 * @property mixed $preview_url
 *
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 *
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static Builder|Media whereDeletedAt($value)
 * @method static Builder|Media whereDeletedBy($value)
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 *
 * @property array $entry_conversions
 * @property EloquentCollection<int, MediaConvert> $mediaConverts
 * @property int|null $media_converts_count
 *
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 *
 * @property ProfileContract|null $updater
 *
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 *
 * @mixin IdeHelperMedia
 *
 * @method static MediaFactory factory($count = null, $state = [])
=======
 * @property array<array-key, mixed> $manipulations
 * @property array<array-key, mixed> $custom_properties
 * @property array<array-key, mixed> $generated_conversions
 * @property array<array-key, mixed> $responsive_images
 * @property int|null $order_column
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property int|string|null $user_id
 *
 * @method static Builder<static>|Media whereCollectionName($value)
 * @method static Builder<static>|Media whereConversionsDisk($value)
 * @method static Builder<static>|Media whereCreatedAt($value)
 * @method static Builder<static>|Media whereCreatedBy($value)
 * @method static Builder<static>|Media whereCustomProperties($value)
 * @method static Builder<static>|Media whereDeletedAt($value)
 * @method static Builder<static>|Media whereDeletedBy($value)
 * @method static Builder<static>|Media whereDisk($value)
 * @method static Builder<static>|Media whereFileName($value)
 * @method static Builder<static>|Media whereGeneratedConversions($value)
 * @method static Builder<static>|Media whereId($value)
 * @method static Builder<static>|Media whereManipulations($value)
 * @method static Builder<static>|Media whereMimeType($value)
 * @method static Builder<static>|Media whereModelId($value)
 * @method static Builder<static>|Media whereModelType($value)
 * @method static Builder<static>|Media whereName($value)
 * @method static Builder<static>|Media whereOrderColumn($value)
 * @method static Builder<static>|Media whereResponsiveImages($value)
 * @method static Builder<static>|Media whereSize($value)
 * @method static Builder<static>|Media whereUpdatedAt($value)
 * @method static Builder<static>|Media whereUpdatedBy($value)
 * @method static Builder<static>|Media whereUuid($value)
>>>>>>> 9b998103 (.)
 *
 * @mixin Eloquent
 */
class Media extends SpatieMedia
{
    use HasXotFactory;
<<<<<<< HEAD
=======

>>>>>>> 9b998103 (.)
    use Updater;

    /** @var string */
    protected $connection = 'media';

    /**
<<<<<<< HEAD
     * //EloquentCollection.
     */
    public static function findWithTemporaryUploadInCurrentSession(array $uuids): EloquentCollection
    {
        // MediaLibraryPro::ensureInstalled();

=======
     * @param  array<int, string>  $uuids
     * @return MediaCollection<int, self>
     */
    public static function findWithTemporaryUploadInCurrentSession(array $uuids): MediaCollection
    {
>>>>>>> 9b998103 (.)
        return static::whereIn('uuid', $uuids)
            ->whereHasMorph('model', [TemporaryUpload::class], static fn (Builder $builder) => $builder->where(
                'session_id',
                session()->getId(),
            ))
            ->get();
    }

    /**
     * return BelongsTo<TemporaryUpload,self|$this>.
     *
     * @return BelongsTo<TemporaryUpload,covariant Media>
     */
    public function temporaryUpload(): BelongsTo
    {
<<<<<<< HEAD
        // MediaLibraryPro::ensureInstalled();

=======
>>>>>>> 9b998103 (.)
        return $this->belongsTo(TemporaryUpload::class);
    }

    /**
     * Relazione con il creatore del media.
     *
     * @return BelongsTo<Model, self>
     *
     * @phpstan-return BelongsTo<Model, $this>
     */
    public function creator(): BelongsTo
    {
        /** @var class-string<Model> $userClass */
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass, 'created_by');
    }

<<<<<<< HEAD
=======
    /**
     * @return HasMany<MediaConvert, $this>
     */
>>>>>>> 9b998103 (.)
    public function mediaConverts(): HasMany
    {
        return $this->hasMany(MediaConvert::class);
    }

    public function getUrlConv(string $conv): string
    {
        $url = $this->getUrl();
        $info = pathinfo($url);
        if (! isset($info['dirname'])) {
            throw new Exception('['.__LINE__.']['.class_basename($this).']');
        }
        $url = '#';
        switch ($conv) {
            case 'thumb':
                $url = $info['dirname'].'/conversions/'.$info['filename'].'-thumb.jpg';

                break;
            case '800':
                $url = $info['dirname'].'/conversions/'.$info['filename'].'-800.jpg';

                break;
            case '400':
                $url = $info['dirname'].'/conversions/'.$info['filename'].'-400.jpg';

                break;
        }

        return url($url);
    }

<<<<<<< HEAD
=======
    /**
     * @return array<int, array{name: string, generated: bool, src: string}>
     */
>>>>>>> 9b998103 (.)
    public function getEntryConversionsAttribute(): array
    {
        $conversions = [];
        foreach ($this->getGeneratedConversions() as $conv => $state) {
            $item = [
                'name' => is_string($conv) ? $conv : ((string) $conv),
<<<<<<< HEAD
                'generated' => $state,
=======
                'generated' => (bool) $state,
>>>>>>> 9b998103 (.)
                'src' => $this->getUrlConv(is_string($conv) ? $conv : ((string) $conv)),
            ];
            $conversions[] = $item;
        }

        return $conversions;
    }

<<<<<<< HEAD
=======
    public function getPathAttribute(): string
    {
        $relativePath = $this->getPathRelativeToRoot();
        $directory = dirname($relativePath);

        return $directory === '.' ? '' : $directory;
    }

>>>>>>> 9b998103 (.)
    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
<<<<<<< HEAD
            'id' => 'string',
            'uuid' => 'string',
=======
            'id' => 'integer',
            'uuid' => 'string',
            'user_id' => 'integer',
>>>>>>> 9b998103 (.)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
<<<<<<< HEAD
            // 'attachment_type' => AttachmentTypeEnum::class,
=======
>>>>>>> 9b998103 (.)
            'manipulations' => 'array',
            'custom_properties' => 'array',
            'generated_conversions' => 'array',
            'responsive_images' => 'array',
        ];
    }
}
