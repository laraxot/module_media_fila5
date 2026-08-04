<?php

declare(strict_types=1);

namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD

=======
use Modules\Media\Models\Media;

/**
 * Media demo — schema media (Spatie) + tabelle modulo Media.
 */
>>>>>>> be7d0c3 (.)
class MediaSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        // Stub per parità modulo — i dati sono sacri, mai migrate:fresh.
=======
        if (Media::query()->exists()) {
            return;
        }

        xotSeedModelOnce(Media::class);
>>>>>>> be7d0c3 (.)
    }
}
