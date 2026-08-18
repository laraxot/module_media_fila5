<?php

declare(strict_types=1);

namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Orchestratore Media — N modelli owner = N {Model}Seeder (regola Laraxot).
 */
class MediaDatabaseSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        $this->command?->info('MediaDatabaseSeeder: entity seeders…');
=======
        if ($this->command !== null) {
            $this->command->info('MediaDatabaseSeeder: entity seeders…');
        }
>>>>>>> laraxot/dev

        $this->call([
            MediaSeeder::class,
            MediaConvertSeeder::class,
            TemporaryUploadSeeder::class,
        ]);

<<<<<<< HEAD
        $this->command?->info('MediaDatabaseSeeder: completato.');
=======
        if ($this->command !== null) {
            $this->command->info('MediaDatabaseSeeder: completato.');
        }
>>>>>>> laraxot/dev
    }
}
