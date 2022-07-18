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
                'groupe_id' => '1',  
            ],
            [
                'name' => 'Mathieu1d6',
                'email' => 'jeanlasalle@outlook.fr',
                'password' => '$2y$10$vb6KVlL.KODdkII8dtv.2.AqThmhYVx..MMzRMcTELexYD9Ir7nFS',
                'role' => '3',
                'groupe_id' => '1',
            ],
            [
                'name' => 'Fayçal',
                'email' => 'fays35230@gmail.com',
                'password' => '$2y$10$WTe3/cFeob9qnVNVo9xkyu.ksYqubZw4SqMeIUtjpU274Dl4w7wjC',
                'role' => '3',
                'groupe_id' => '1',
            ],
            [
                'name' => 'Leandre',
                'email' => 'l@l.l',
                'password' => '$2y$10$2MJ6E1FUUDuaxIQ3WUnD3uVS2NBdpxMlEeiFUY4Zmz8U2doVS1Ftu',
                'role' => '3',
                'groupe_id' => '1',
            ],
            [
                'name' => 'Test_user_admin',
                'email' => 'test@buroscope.eu',
                'password' => '$2y$10$WTe3/cFeob9qnVNVo9xkyu.ksYqubZw4SqMeIUtjpU274Dl4w7wjC', /* 00000000 */
                'role' => '3',	/* Administration */
                'groupe_id' => '1',
            ],
            [
                'name' => 'Test_user_basic',
                'email' => 'test2@buroscope.eu',
                'password' => '$2y$10$WTe3/cFeob9qnVNVo9xkyu.ksYqubZw4SqMeIUtjpU274Dl4w7wjC', /* 00000000 */
                'role' => '0',
                'groupe_id' => '1',
            ]
        ]);
    }
}