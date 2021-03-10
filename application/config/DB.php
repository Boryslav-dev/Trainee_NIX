<?php

/**
 ** Database configuration class
 */

namespace application\config;

use PDO;

require(__DIR__ . 'config/env.php');

class DB
{
    /** @var PDO */

    private PDO $pdo;

    public function __construct()
    {
        $user = getenv('DB_USERNAME');
        $pass = getenv('DB_PASSWORD');
        $host = getenv('DB_HOST');
        $db   = getenv('DB_DATABASE');
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
