<?php

declare(strict_types=1);

namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Modules\Media\Models\MediaConvert;
=======
>>>>>>> 7605234 (.)

class MediaConvertSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        if (MediaConvert::query()->exists()) {
            return;
        }

        xotSeedModelOnce(MediaConvert::class);
=======
        // Stub per parità modulo — i dati sono sacri, mai migrate:fresh.
>>>>>>> 7605234 (.)
    }
}
