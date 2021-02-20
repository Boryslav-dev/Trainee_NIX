<?php

use application\core\Controller;
use application\core\View;
use application\models\Model_Profile;

class Controller_Profile extends Controller
{
    public function __construct()
    {
       // $this->model = new Model_Profile();
        $this->view = new View();
    }

    public function actionIndex()
    {
        //$data = $this->model->getData();
        $this->view->generate('profile_view.php', 'layout_view.php');
    }
}
