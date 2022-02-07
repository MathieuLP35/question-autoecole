<?php
namespace Models;

use Core\Model;

class Questionnaire extends Model {
    public static array $columns = ['id_questionnaire','id_grp','questions'];
    public static string $table = 'questionnaire';
}