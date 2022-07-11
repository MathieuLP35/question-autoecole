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
                'image' => 'images/Questions-Banner.jpg',
                'propositions' => json_encode([
                    "proposition_1" => [
                        'rep_id' => 1,
                        'name' => 'Rouge',
                        'valid' => 'on',
                    ],
                    "proposition_2" => [
                        'rep_id' => 2,
                        'name' => 'Jaune',
                        'valid' => null,
                    ],
                    "proposition_3" => [
                        'rep_id' => 3,
                        'name' => 'Vert',
                        'valid' => null,
                    ],
                    "proposition_4" => [
                        'rep_id' => 4,
                        'name' => 'Bleu',
                        'valid' => null,
                    ],
                ])
            ],
            [
                'texte' => 'Quelle est la couleur du poteaux ?',
                'image' => 'images/Questions-Banner.jpg',
                'propositions' => json_encode([
                    "proposition_1" => [
                        'rep_id' => 1,
                        'name' => 'Violet',
                        'valid' => 'on',
                    ],
                    "proposition_2" => [
                        'rep_id' => 2,
                        'name' => 'Jaune',
                        'valid' => null,
                    ],
                    "proposition_3" => [
                        'rep_id' => 3,
                        'name' => 'Vert',
                        'valid' => null,
                    ],
                    "proposition_4" => [
                        'rep_id' => 4,
                        'name' => 'Bleu',
                        'valid' => null,
                    ],
                ])
            ],
            [
                'texte' => 'Quelle est la couleur du mouton ?',
                'image' => 'images/Questions-Banner.jpg',
                'propositions' => json_encode([
                    "proposition_1" => [
                        'rep_id' => 1,
                        'name' => 'Violet',
                        'valid' => 'on',
                    ],
                    "proposition_2" => [
                        'rep_id' => 2,
                        'name' => 'Jaune',
                        'valid' => null,
                    ],
                    "proposition_3" => [
                        'rep_id' => 3,
                        'name' => 'Vert',
                        'valid' => "on",
                    ],
                    "proposition_4" => [
                        'rep_id' => 4,
                        'name' => 'Bleu',
                        'valid' => null,
                    ],
                ])
            ],
            [
                'texte' => 'Quelle est la couleur du chat ?',
                'image' => 'images/Questions-Banner.jpg',
                'propositions' => json_encode([
                    "proposition_1" => [
                        'rep_id' => 1,
                        'name' => 'Violet',
                        'valid' => 'on',
                    ],
                    "proposition_2" => [
                        'rep_id' => 2,
                        'name' => 'Jaune',
                        'valid' => null,
                    ],
                    "proposition_3" => [
                        'rep_id' => 3,
                        'name' => 'Vert',
                        'valid' => "on",
                    ],
                    "proposition_4" => [
                        'rep_id' => 4,
                        'name' => 'Bleu',
                        'valid' => null,
                    ],
                ])
            ],
        ]);

        DB::table('groupe_question')->insert([
            [
                'question_id' => 1,
                'groupe_id' => 1,
            ],
            [
                'question_id' => 2,
                'groupe_id' => 1,
            ],
            [
                'question_id' => 3,
                'groupe_id' => 1,
            ],
            [
                'question_id' => 4,
                'groupe_id' => 1,
            ],
        ]);
    }
}
