<?php

declare(strict_types=1);

namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======
use Modules\Media\Models\TemporaryUpload;
>>>>>>> be7d0c3 (.)

class TemporaryUploadSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        // Stub per parità modulo — i dati sono sacri, mai migrate:fresh.
=======
        if (TemporaryUpload::query()->exists()) {
            return;
        }

        xotSeedModelOnce(TemporaryUpload::class);
>>>>>>> be7d0c3 (.)
    }
}
