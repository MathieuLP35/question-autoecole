<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Seed_Questions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'texte' => 'Quelle est la couleur du panneau ?',
                'image' => 'string',
                'propositions' => array (
                    'proposition_1' => array (
                        'id_proposition'=> 1,
                        'content_proposition'=> 'Rouge'
                    ),
                    'proposition_2' => array (
                        'id_proposition'=> 2,
                        'content_proposition'=> 'Bleu'
                    ),
                    'proposition_3' => array (
                        'id_proposition'=> 3,
                        'content_proposition'=> 'Jaune'
                    ),
                    'proposition_4' => array (
                        'id_proposition'=> 4,
                        'content_proposition'=> 'Vert'
                    )
                ),
            ]
        ]);
    }
}
