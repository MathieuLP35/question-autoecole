<?php
namespace Models;

use Core\Model;

class Users extends Model {
    public static array $columns = ['id','role','name','firstname','mail','nb_questionnaire','taux','id_groupe'];
    public static string $table = 'users';
}