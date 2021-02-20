<?php

namespace application\core;

class Controller
{

    public View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    // действие (action), вызываемое по умолчанию
    public function actionIndex()
    {
        // todo
    }
}
