<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Seed_Scores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert([
            [
                'moy' => '15',
                'user_id' => '1',
            ],
            [
                'moy' => '15',
                'user_id' => '2',
            ],
            [
                'moy' => '15',
                'user_id' => '3',
            ],
            [
                'moy' => '15',
                'user_id' => '4',
            ],
            [
                'moy' => '10.5',
                'user_id' => '1',
            ],
            [
                'moy' => '10.5',
                'user_id' => '2',
            ],
            [
                'moy' => '10.5',
                'user_id' => '3',
            ],
            [
                'moy' => '10.5',
                'user_id' => '4',
            ]
        ]);
    }
}
