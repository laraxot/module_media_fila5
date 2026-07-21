<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Orchestratore Media — N modelli owner = N {Model}Seeder (regola Laraxot).
 */
class MediaDatabaseSeeder extends Seeder
{
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
=======
namespace Modules\Media\database\seeders;

use Illuminate\Database\Seeder;

class MediaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
>>>>>>> provtv/dev
    }
}
