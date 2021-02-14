<?php

/**
 ** Класс конфигурации базы данных
 */

namespace application\config;

use PDO;

class DB
{

    const USER = "a25store_config";
    const PASS = "xe)#K5t8S2";
    const HOST = "a25store.mysql.ukraine.com.ua";
    const DB   = "a25store_config";

    public static function connToDB(): PDO
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
        return new PDO($dsn, $user, $pass, $opt);
    }

}
