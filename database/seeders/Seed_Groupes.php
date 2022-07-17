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
                'groupname' => 'Permis B',
                'moy' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'groupname' => 'Permis moto',
                'moy' => 0,
                'created_at' => now(),
                'updated_at' => now(),
			],[
                'groupname' => 'Permis poids lourd',
                'moy' => 0,
                'created_at' => now(),
                'updated_at' => now(),
			]
        ]);
    }
}
