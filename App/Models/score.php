<?php
namespace Models;

use Core\Model;

class Score extends Model {
    public static array $columns = ['id_score','moy_user','id_user'];
    public static string $table = 'score';
}