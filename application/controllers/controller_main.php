<?php

use application\core\Controller;
use application\core\View;
use application\models\ModelMain;

class Controller_Main extends Controller
{
    public function __construct()
    {
        $this->model = new ModelMain();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('main_view.php', 'layout_view.php', $data);
    }
}
