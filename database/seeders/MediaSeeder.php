<?php

declare(strict_types=1);

namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Modules\Media\Models\Media;

/**
 * Media demo — schema media (Spatie) + tabelle modulo Media.
 */
=======

>>>>>>> 7605234 (.)
class MediaSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        if (Media::query()->exists()) {
            return;
        }

        xotSeedModelOnce(Media::class);
=======
        // Stub per parità modulo — i dati sono sacri, mai migrate:fresh.
>>>>>>> 7605234 (.)
    }
}
