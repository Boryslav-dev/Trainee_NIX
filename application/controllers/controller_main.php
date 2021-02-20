<?php

use application\core\Controller;
use application\core\View;
use application\models\Model_Main;

class Controller_Main extends Controller
{

    private Model_Main $model;

    public function __construct()
    {
        $this->model= new Model_Main();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('main_view.php', 'layout_view.php', $data);
    }
}
