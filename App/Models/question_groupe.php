<?php
namespace Models;

use Core\Model;

class Question_groupe extends Model {
    public static array $columns = ['id_q_g','id_question','id_grp'];
    public static string $table = 'question_groupe';
}