<?php

namespace application\core;

class Controller
{

    public View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($alias, $title){
        $model = "\\models\\" . $title;
        $this->$alias = new $model();
    }

    // default action
    public function actionIndex()
    {
        // todo
    }
}
