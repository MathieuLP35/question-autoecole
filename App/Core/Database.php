<?php
namespace Core;

class Database {
    static private $instance = false;
    private ?\PDO $connection;
    private $query;

    private function __construct () {
        $bdd_config = Config::get('bdd');
        $dsn = "$bdd_config[dbtype]:dbname=$bdd_config[dbname];host=$bdd_config[host]";
        $user = $bdd_config['user']['name'];
        $password = $bdd_config['user']['pass'];

        $this->connection = new \PDO($dsn, $user, $password);
    }

    private static function connect () {
        if (self::$instance) {
            return self::$instance->connection;
        }
        $Connection = new self;
        self::$instance = $Connection;
        return $Connection;
    }

    public static function lastID (string $table) {
        $bdd = self::connect();
        $query = $bdd->query("SELECT max(id) as last_id FROM $table");
        return $query->fetch()['last_id'];
    }
    
    public static function delete (string $table, int $id) {
        $bdd = self::connect();
        return $bdd->query("DELETE FROM $table WHERE id = :id", [
            ':id' => $id
        ], true);
    }

    public static function create (string $table, array $columns, array $values = []) {
        $sql = 'INSERT INTO '.$table.' (';
        $sql .= implode(',', $columns);
        $sql .= ') VALUES (:';
        $sql .= implode(',:', $columns);
        $sql .= ')';

        $bdd = self::connect();
        return $bdd->query($sql, $bdd->create_params($columns, $values), true);
    }
    public static function update (string $table, array $columns, array $values = []) {
        $sql = 'UPDATE '.$table.' SET ';
        $sql_cols = [];
        foreach ($columns as $col) {
            $sql_cols[] = $col.' = :'.$col;
        }
        $sql .= implode(',', $sql_cols);
        $sql .= ' WHERE id = :id';

        $bdd = self::connect();
        return $bdd->query($sql, $bdd->create_params(), true);
    }

    public static function find (string $table, int $id) {
        $bdd = self::connect();
        $q = $bdd->query("SELECT * FROM $table WHERE id = :id", [
            ':id' => $id
        ]);
        return $q->fetch();
    }

    public static function get (string $table, int $limit = 0, int $ignore = 0) {
        $bdd = self::connect();
        if ($limit != 0) {
            $endquery = "LIMIT $ignore, $limit";
        }
        $query = $bdd->query("SELECT * FROM $table $endquery");
        return $query->fetchAll();
    }

    public static function count (string $table) {
        $bdd = self::connect();
        $q = $bdd->query("SELECT count(id) AS total_row FROM $table");
        return $q->fetch();
    }

    public function query (string $request, array $params = [], bool $execReturn = false) {
        $co = $this->connection;
        $q = $co->prepare($request);
        $r = $q->execute($params);
        if ($execReturn) {
            return $r;
        }
        return $q;
    }

    public function create_params (array $columns, array $values) {
        $requestValues = [];
        foreach($columns as $col) {
            $value = null;
            if (isset($values[$col])) {
                $value = $values[$col];
            }
            $requestValues[':'.$col] =  $value;
        }
        if (isset($values['id'])) {
            $requestValues[':id'] = $values['id'];
        }
        return $requestValues;
    }
}