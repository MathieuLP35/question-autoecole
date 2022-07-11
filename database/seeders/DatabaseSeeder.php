<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Seed_Groupes::class,
            Seed_Users::class,
            Seed_Questions::class,
			Seed_Scores::class,
        ]);
    }
}
