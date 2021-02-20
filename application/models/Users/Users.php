<?php

namespace application\models\Users;

use application\ActiveRecord\Active;

class User extends Active
{

    protected $id;


    protected $login;


    protected $email;


    protected $password;


    protected $First_Name;


    protected $Last_Name;


    protected $Company;

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    protected static function getTableName(): string
    {
        return 'USERS';
    }
}