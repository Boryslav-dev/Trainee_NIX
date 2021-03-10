<?php /** @noinspection SqlResolve */

namespace application\models;

use application\config\DB;
use application\models\Persons\Persons;

require_once 'application/models/ActiveRecordEntity/Persons.php';

class Model_Login extends Persons
{
    public function checkPassword($atribuits): bool
    {
        $db = new Db();
        $test = $db->queryAll('SELECT COUNT(1) FROM ' . static::getTableName() .' WHERE login
         Like :login AND password Like :password;',
            [':login' => $atribuits["login"],
                ':password' => $atribuits["password"]]);
        if($test[0] == 1) {
            return true;
        } else {
            return false;
        }
    }
}