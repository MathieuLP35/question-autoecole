<?php
namespace Core;

function bdd_connect () {
    $bdd = new \PDO('mysql:host=localhost;dbname=questionnaire_auto', 'root', '');
    return $bdd;
}

class Model {
    public static array $columns = [];
    private array $values = [];
    public static string $table = ''; 

    public function __construct (array $datas = []) {
        foreach ($datas as $key => $value) {
            if (
                in_array($key, static::$columns)
                || $key == 'id'
            ) {
                $this->values[$key] = $value;
            }
        }
    }

    public static function find (int $id) {
        $el = Database::find(static::$table, $id);
        return new static($el);
    }

    public function delete () {
        return Database::delete(static::$table, $this->values['id']);
    }

    public static function all () {
        $els = Database::get(static::$table);
        $ret = [];
        foreach ($els as $el) {
            $ret[] = new static($el);
        }
        return $ret;
    }

    public function save (): bool {
        if (isset($this->values['id'])) {
            return $this->update();
        } else {
            return $this->create();
        }
    }
    private function update () {
        return Database::update(static::$table, static::$columns, $this->values);
    }

    private function create () {
        if (Database::create(static::$table, static::$columns, $this->values)) {
            $id = Database::lastID(static::$table);
            $this->setID($id);
            return true;
        }
        return false;
    }

    public function setValue (string $key, $value): bool {
        if (in_array($key, static::$columns)) {
            $this->values[$key] = $value;
            return true;
        }
        return false;
    }
    public function getValue (string $key): bool {
        if (in_array($key, static::$columns)) {
            return $this->values[$key];
        } else {
            return false;
        }
    }
    public function showValues (): void {
        var_dump($this->values);
    }
    public function __get ($attribute): bool {
        return $this->getValue($attribute);
    }
    public function __set ($attribute, $value): bool {
        return $this->setValue($attribute, $value);
    }

    private function setID (int $id): void {
        $this->values['id'] = $id;
    }
}