<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Seed_Groupes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groupes')->insert([
            [
                'groupname' => 'Groupe 1',
                'moy' => 5.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
