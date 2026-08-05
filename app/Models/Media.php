<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Media\Database\Factories\MediaFactory;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Traits\Updater;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

/**
 * @property string $path
 * @property array<int, array<string, string|bool>> $conversions
 */
class Media extends SpatieMedia
{
    /** @phpstan-use HasXotFactory<MediaFactory> */
    use HasXotFactory;

    use Updater;

    /** @var string */
    protected $connection = 'media';

    /**
     * @param  array<int, string>  $uuids
     * @return MediaCollection<int, static>
     */
    public static function findWithTemporaryUploadInCurrentSession(array $uuids): MediaCollection
    {
        // MediaLibraryPro::ensureInstalled();

        /** @var MediaCollection<int, static> $result */
        $result = static::whereIn('uuid', $uuids)
            ->whereHasMorph('model', [TemporaryUpload::class], static fn (Builder $builder) => $builder->where(
                'session_id',
                session()->getId(),
            ))
            ->get();

        return $result;
    }

    /**
     * @return BelongsTo<TemporaryUpload, Media>
     *
     * @phpstan-return BelongsTo<TemporaryUpload, Media>
     */
    public function temporaryUpload(): BelongsTo
    {
        /** @var BelongsTo<TemporaryUpload, Media> $relation */
        $relation = $this->belongsTo(TemporaryUpload::class);

        return $relation;
    }

    /**
     * @return HasMany<MediaConvert, Media>
     *
     * @phpstan-return HasMany<MediaConvert, Media>
     */
    public function mediaConverts(): HasMany
    {
        /** @var HasMany<MediaConvert, Media> $relation */
        $relation = $this->hasMany(MediaConvert::class);

        return $relation;
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
                'generated' => is_bool($state) ? $state : false,
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
