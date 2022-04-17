<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Seed_Teams extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'user_id' => '1',
                'personal_team' => '1',
                'name' => 'Fouad\'s Team',
            ],[
                'user_id' => '2',
                'personal_team' => '1',
                'name' => 'Mathieu\'s Team',
            ],[
                'user_id' => '3',
                'personal_team' => '1',
                'name' => 'Fayçal\'s Team',
            ],[
                'user_id' => '4',
                'personal_team' => '1',
                'name' => 'Leandre\'s Team',
            ]
        ]);
    }
}
