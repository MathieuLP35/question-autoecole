<?php
namespace Models;

use Core\Model;

class Groupe extends Model {
    public static array $columns = ['id_grp','nom-grp','moy_grp'];
    public static string $table = 'groupe';
}