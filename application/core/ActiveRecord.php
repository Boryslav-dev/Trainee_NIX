<?php

namespace application\core;

use application\config\DB;

use PDO;

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
            'SELECT login, email, First_Name, Last_Name, Company  FROM `' . static::getTableName() . '` WHERE login Like ? AND password Like ?;',
            $atribuits,
            static::class
        );
        return $entities;
    }

    public function insert($atribuits): ?array
    {
        $db = new Db();
        return $db->query('INSERT INTO `' . static::getTableName() . '`(login, email, password, First_Name, Last_Name, Company) VALUES (?, ?, ?, ?, ?, ?);', $atribuits, static::class);
    }

    public function update($atribuits): ?array
    {
        $db = new Db();
        return $db->query('UPDATE`' . static::getTableName() . '` SET (login = ?, email = ?, password = ?, First_Name = ?, Last_Name = ?, Company = ?);', $atribuits, static::class);
    }

    public function getIsNewRecord($atribuits): bool
    {
        $db = new Db();
        $db->query('SELECT COUNT(1) FROM `' . static::getTableName() .'` Where login Like ? ', $atribuits, static::class );
        if( $db = 1 ) {
            return false;
        } else {
            return true;
        }
    }

    public function save($atribuits): string
    {
            if ($this->getIsNewRecord($atribuits) == true) {
                 $this->insert($atribuits);
                 return " ";
            }
            else {
                return 'Такой логин уже есть!';
            }
    }

    abstract protected static function getTableName(): string;

}
