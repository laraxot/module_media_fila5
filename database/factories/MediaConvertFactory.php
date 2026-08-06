<?php

declare(strict_types=1);

namespace Modules\Media\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Media\Models\MediaConvert;

/**
 * @extends Factory<MediaConvert>
 */
class MediaConvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = MediaConvert::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'format' => 'png',
            'codec_video' => 'libx264',
            'codec_audio' => 'aac',
            'preset' => 'medium',
            'bitrate' => '2000k',
            'width' => 1920,
            'height' => 1080,
            'threads' => 4,
            'speed' => 1,
            'percentage' => '0.000',
            'remaining' => '100.000',
            'rate' => '1.000',
            'execution_time' => '0.000',
        ];
    }
}
