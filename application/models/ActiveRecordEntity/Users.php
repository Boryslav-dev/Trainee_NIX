<?php

namespace application\models\Users;

use application\core\ActiveRecord;

class Users extends ActiveRecord
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
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getFirst_Name(): string
    {
        return $this->First_Name;
    }
    public function getLast_Name(): string
    {
        return $this->Last_Name;
    }
    public function getCompany(): string
    {
        return $this->Company;
    }

    protected static function getTableName(): string
    {
        return 'USERS';
    }
}