<?php

namespace application\models;

use application\core\Model;
use PDO;

class ModelMain extends Model
{
    public function getData(): array
    {
        return $items = $this -> db -> connToDB() -> query("SELECT * FROM `POST`")->fetchAll();
    }
}
