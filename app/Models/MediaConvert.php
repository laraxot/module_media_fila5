<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read string|null $converted_file
 * @property-read string|null $disk
 * @property-read string|null $file
 * @property-read \Modules\Media\Models\Media|null $media
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Media\Database\Factories\MediaConvertFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Media\Models\MediaConvert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Media\Models\MediaConvert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Media\Models\MediaConvert query()
 * @mixin \Eloquent
 */
class MediaConvert extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'media_id',
        'format',
        'codec_video',
        'codec_audio',
        'preset',
        'bitrate',
        'width',
        'height',
        'threads',
        'speed',
        'percentage',
        'remaining',
        'rate',
        'execution_time',
    ];

    /**
     * @return BelongsTo<Media, $this>
     */
    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function getDiskAttribute(?string $value): ?string
    {
        if ($this->media === null) {
            return null;
        }

        return $this->media->disk;
    }

    public function getFileAttribute(?string $value): ?string
    {
        if ($this->media === null) {
            return null;
        }

        return $this->media->path.'/'.$this->media->file_name;
    }

    public function getConvertedFileAttribute(?string $value): ?string
    {
        if ($this->media === null) {
            return null;
        }
        $info = pathinfo($this->media->file_name);
        // "dirname" => "."
        // "basename" => "20600550-uhd_3840_2160_30fps.mp4"
        // "extension" => "mp4"
        // "filename" => "20600550-uhd_3840_2160_30fps"

        return $this->media->path.'/conversions/'.$info['filename'].'_'.$this->id.'.'.$this->format;
    }
}
