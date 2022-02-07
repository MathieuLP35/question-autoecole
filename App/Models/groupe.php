<?php
namespace Models;

use Core\Model;

class Groupe_Model extends Model {
    public static array $columns = ['id_grp','nom_grp','moy_grp'];
    public static string $table = 'groupe';
}