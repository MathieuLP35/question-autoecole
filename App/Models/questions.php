<?php
namespace Models;

use Core\Model;

class Questions extends Model {
    public static array $columns = ['id_question','texte','image','propositions'];
    public static string $table = 'questions';
}