<?php

namespace application\core;

use application\config\DB;

abstract class ActiveRecord
{

    /** @var int */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $db = new Db();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    /**
     * @param int $id
     * @return static|null
     */
    public static function getById(int $id): ?self
    {
        $db = new Db();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public static function getInfoUser($atribuits): array
    {
        $db = new Db();
        $entities = $db->query(
            'SELECT login, email, First_Name, Last_Name, Company, avatar  FROM `' . static::getTableName() .
            '` WHERE login Like :login AND password Like :password;',
            [':login' => $atribuits["login"], ':password' => $atribuits["password"]],
            static::class
        );
        return $entities;
    }

    public function insert($atribuits): ?array
    {
        $db = new Db();
        return $db->query('INSERT INTO `' . static::getTableName() . '`(login, email, password, First_Name, 
        Last_Name, Company) VALUES (?, ?, ?, ?, ?, ?);', $atribuits, static::class);
    }

    public function update($atribuits): bool
    {
        $db = new Db();
        $db->query('UPDATE ' . static::getTableName() . ' SET email = :email, First_Name = :First_Name, 
        Last_Name = :Last_Name, Company = :Company, avatar = :avatar Where Login = :Login AND password = :password;',
            [':email' => $atribuits["email"], ':First_Name' => $atribuits["First_Name"],
                ':Last_Name' => $atribuits["Last_Name"], ':Company' => $atribuits["Company"],
                ':Login' => $atribuits["login"], ':password' => $atribuits["password"], ':avatar' => $atribuits["avatar"]] ,
            static::class);
         return true;
    }

    public function getIsNewRecord($atribuits): bool
    {
        $db = new Db();
        $test = $db->queryAll('SELECT COUNT(1) FROM `' . static::getTableName() .'` Where login Like ? ',
            array($atribuits[0]));
        if($test[0] == 1) {
            return false;
        } else {
            return true;
        }
    }

    public function save($atribuits)
    {
            if ($this->getIsNewRecord($atribuits) == true) {
                return $this->insert($atribuits);
            }
            else {
                return $this->update($atribuits);
            }
    }

    abstract protected static function getTableName(): string;
}
