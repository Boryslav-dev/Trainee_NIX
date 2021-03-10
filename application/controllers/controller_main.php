<?php

use application\core\Controller;
use application\core\View;
use application\models\Model_Main;

class Controller_Main extends Controller
{

    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {
        $this->loadModel("main", "model_main");

        $data = $this->main->getData();

        $this->view->generate('main_view.php', 'layout_view.php', $data);
    }
}
