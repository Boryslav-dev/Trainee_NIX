<?php

namespace application\core;

class Controller
{
    public Model $model;
    public View $view;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    // действие (action), вызываемое по умолчанию
    public function actionIndex()
    {
        // todo
    }
}
