<?php

declare(strict_types=1);

namespace Modules\Media\database\seeders;

use Illuminate\Database\Seeder;

class MediaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ($this->command !== null) {

            $this->command->info('MediaDatabaseSeeder: entity seeders…');

        }

        $this->call([
            MediaSeeder::class,
            MediaConvertSeeder::class,
            TemporaryUploadSeeder::class,
        ]);

        if ($this->command !== null) {

            $this->command->info('MediaDatabaseSeeder: completato.');

        }
    }
}
