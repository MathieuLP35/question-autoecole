<?php
namespace Models;

use Core\Model;

class Users extends Model {
    public static array $columns = ['id_score','moy_user','id_user'];
    public static string $table = 'users';
}