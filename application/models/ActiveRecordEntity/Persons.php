<?php

namespace application\models\Persons;

use application\core\ActiveRecord;

class Persons extends ActiveRecord
{
    protected $ID;

    protected $login;

    protected $email;

    protected $password;

    protected $First_Name;

    protected $Last_Name;

    protected $Company;

    protected $avatar;

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
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    protected static function getTableName(): string
    {
        return 'Persons';
    }
}