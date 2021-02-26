<?php

/**
 ** Класс конфигурации базы данных
 */

namespace application\config;

use PDO;

class DB
{
    /** @var PDO */
    const USER = "a25store_config";
    const PASS = "xe)#K5t8S2";
    const HOST = "a25store.mysql.ukraine.com.ua";
    const DB   = "a25store_config";
    private PDO $pdo;

    public function __construct()
    {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db   = self::DB;
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this-> pdo = new PDO($dsn, $user, $pass, $opt);
        $this-> pdo -> exec('SET NAMES UTF8');
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(PDO::FETCH_CLASS, $className);
    }

    public function queryAll(string $sql, array $params = []): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(PDO::FETCH_COLUMN);
    }
}
