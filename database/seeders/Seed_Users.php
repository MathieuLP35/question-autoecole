<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Seed_Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Fouad',
                'email' => 'fouadhimdi5@gmail.com',
                'password' => '$2y$10$VkioSZkh2EWI8GGrNaJFnu.Qr590tFzSZzn7qBfmT11K5TsbJBjmS',
                'role' => '3',
                'current_team_id' => '1',
            ],
            [
                'name' => 'Mathieu',
                'email' => 'Mathieu@gmail.com',
                'password' => '$2y$10$oydOY.navUIRhjA1F10qE.ciJJl9MGGvo13vtNCv1s0FmPsmWnv/i',
                'role' => '3',
                'current_team_id' => '2',
            ],
            [
                'name' => 'Fayçal',
                'email' => 'fays35230@gmail.com',
                'password' => '$2y$10$oydOY.navUIRhjA1F10qE.ciJJl9MGGvo13vtNCv1s0FmPsmWnv/i',
                'role' => '3',
                'current_team_id' => '3',
            ],
            [
                'name' => 'Leandre',
                'email' => 'Leandre@gmail.com',
                'password' => '$2y$10$oydOY.navUIRhjA1F10qE.ciJJl9MGGvo13vtNCv1s0FmPsmWnv/i',
                'role' => '3',
                'current_team_id' => '4',
            ]
        ]);
    }
}