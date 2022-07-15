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
                'texte' => 'Je circule en tractant une remorque dont le PTAC est inferieur a 500kg, quels sont les documents a présenter en cas de contrôle ?',
                'image' => 'images/Questions-Banner.jpg',
                'propositions' => json_encode([
                    "proposition_1" => [
                        'rep_id' => 1,
                        'name' => 'Le permis de conduire',
                        'valid' => 'on',
                    ],
                    "proposition_2" => [
                        'rep_id' => 2,
                        'name' => 'Le certificat d\'immatriculation du véhicule',
                        'valid' => 'on',
                    ],
                    "proposition_3" => [
                        'rep_id' => 3,
                        'name' => 'Le certificat d\'assurance',
                        'valid' => 'on',
                    ],
                    "proposition_4" => [
                        'rep_id' => 4,
                        'name' => 'La carte grise de la remorque',
                        'valid' => null,
                    ],
                ])
            ],
            [
                'texte' => 'Je roule a 80km/h, quelle est la distance que je parcours en 1 seconde ?',
                'image' => 'images/Questions-Banner.jpg',
                'propositions' => json_encode([
                    "proposition_1" => [
                        'rep_id' => 1,
                        'name' => '8 metres',
                        'valid' => null,
                    ],
                    "proposition_2" => [
                        'rep_id' => 2,
                        'name' => '16 metres',
                        'valid' => null,
                    ],
                    "proposition_3" => [
                        'rep_id' => 3,
                        'name' => '24 metres',
                        'valid' => 'on',
                    ],
                    "proposition_4" => [
                        'rep_id' => 4,
                        'name' => '32 metres',
                        'valid' => null,
                    ],
                ])
            ],
            [
                'texte' => 'Quelle est la couleur d\'un panneaux signalant un dangers temporaire',
                'image' => 'images/Questions-Banner.jpg',
                'propositions' => json_encode([
                    "proposition_1" => [
                        'rep_id' => 1,
                        'name' => 'Violet',
                        'valid' => null,
                    ],
                    "proposition_2" => [
                        'rep_id' => 2,
                        'name' => 'Jaune',
                        'valid' => 'on',
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
                'texte' => 'Je roule a 80km/h, quelle est la distance de sécurité que je doit conserver entre mon véhicule et le véhicule devant moi ?',
                'image' => 'images/Questions-Banner.jpg',
                'propositions' => json_encode([
                    "proposition_1" => [
                        'rep_id' => 1,
                        'name' => '24 metres',
                        'valid' => null,
                    ],
                    "proposition_2" => [
                        'rep_id' => 2,
                        'name' => '32 metres',
                        'valid' => null,
                    ],
                    "proposition_3" => [
                        'rep_id' => 3,
                        'name' => '48 metres',
                        'valid' => "on",
                    ],
                    "proposition_4" => [
                        'rep_id' => 4,
                        'name' => '64 metres',
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
