<?php

namespace application\core;

use application\config\DB;

class Model
{
    public DB $db;
    // метод выборки данных
    public function __construct()
    {
        $this->db = new DB();
    }
    public function getData()
    {
        //todo
    }
}
