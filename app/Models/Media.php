<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Media\Database\Factories\MediaFactory;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Traits\Updater;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

/**
<<<<<<< HEAD
 * @property-read User|null $creator
 * @property-read string $extension
 * @property-read array<int, array{name: string, generated: bool, src: string}> $entry_conversions
 * @property-read string $path
 * @property-read string $human_readable_size
 * @property-read EloquentCollection<int, MediaConvert> $mediaConverts
 * @property-read int|null $media_converts_count
 * @property-read Model $model
 * @property-read string $original_url
 * @property-read string $preview_url
 * @property-read TemporaryUpload|null $temporaryUpload
 * @property-read string $type
 * @property-read ProfileContract|null $updater
 *
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static \Modules\Media\Database\Factories\MediaFactory factory($count = null, $state = [])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static Builder<static> newModelQuery()
 * @method static Builder<static> newQuery()
 * @method static Builder<static> ordered()
 * @method static Builder<static> query()
 *
=======
>>>>>>> ec2b884b (.)
 * @property int $id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array<string, mixed>|null $manipulations
 * @property array<string, mixed>|null $custom_properties
 * @property array<string, bool>|null $generated_conversions
 * @property array<string, string>|null $responsive_images
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
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property UserContract|null $creator
 * @property Model|Eloquent $model
 * @property TemporaryUpload|null $temporaryUpload
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @property array<int, array{name: string, generated: bool, src: string}> $entry_conversions
 * @property EloquentCollection<int, MediaConvert> $mediaConverts
 * @property int|null $media_converts_count
 *
<<<<<<< HEAD
 * @method static Builder<static> whereCollectionName($value)
 * @method static Builder<static> whereConversionsDisk($value)
 * @method static Builder<static> whereCreatedAt($value)
 * @method static Builder<static> whereCreatedBy($value)
 * @method static Builder<static> whereCustomProperties($value)
 * @method static Builder<static> whereDeletedAt($value)
 * @method static Builder<static> whereDeletedBy($value)
 * @method static Builder<static> whereDisk($value)
 * @method static Builder<static> whereFileName($value)
 * @method static Builder<static> whereGeneratedConversions($value)
 * @method static Builder<static> whereId($value)
 * @method static Builder<static> whereManipulations($value)
 * @method static Builder<static> whereMimeType($value)
 * @method static Builder<static> whereModelId($value)
 * @method static Builder<static> whereModelType($value)
 * @method static Builder<static> whereName($value)
 * @method static Builder<static> whereOrderColumn($value)
 * @method static Builder<static> whereResponsiveImages($value)
 * @method static Builder<static> whereSize($value)
 * @method static Builder<static> whereUpdatedAt($value)
 * @method static Builder<static> whereUpdatedBy($value)
 * @method static Builder<static> whereUuid($value)
=======
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
 * @method static Builder|Media whereDeletedAt($value)
 * @method static Builder|Media whereDeletedBy($value)
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
 * @method static MediaFactory factory($count = null, $state = [])
>>>>>>> ec2b884b (.)
 */
class Media extends SpatieMedia
{
    use HasXotFactory;
    use Updater;

    /** @var string */
    protected $connection = 'media';

    /**
     * @param  array<int, string>  $uuids
     * @return MediaCollection<int, Media>
     */
    public static function findWithTemporaryUploadInCurrentSession(array $uuids): MediaCollection
    {
        $query = static::query();
        $query->whereIn('uuid', $uuids);
        $query->whereHasMorph('model', [TemporaryUpload::class], static fn (Builder $builder) => $builder->where(
            'session_id',
            session()->getId(),
        ));

        /** @var list<Media> $media */
        $media = array_values($query->get()->all());

        return new MediaCollection($media);
    }

    /**
     * return BelongsTo<TemporaryUpload,self|$this>.
     *
     * @return BelongsTo<TemporaryUpload,covariant Media>
     */
    public function temporaryUpload(): BelongsTo
    {
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

    /**
     * @return HasMany<MediaConvert, $this>
     */
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

    /**
     * @return array<int, array{name: string, generated: bool, src: string}>
     */
    public function getEntryConversionsAttribute(): array
    {
        $conversions = [];
        foreach ($this->getGeneratedConversions() as $conv => $state) {
            $item = [
                'name' => is_string($conv) ? $conv : ((string) $conv),
                'generated' => (bool) $state,
                'src' => $this->getUrlConv(is_string($conv) ? $conv : ((string) $conv)),
            ];
            $conversions[] = $item;
        }

        return $conversions;
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
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
    }
}
