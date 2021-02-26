<?php

use application\core\Controller;
use application\core\View;
use application\models\Model_Login;
use application\models\Persons\Persons;

class Controller_Login extends Controller
{
    /**
     * @var Model_Login
     */
    private Model_Login $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Login();
    }

     public function actionIndex()
    {
        if (isset($_POST['submit'])) {

            if (isset($_POST['login']) && isset($_POST['password'])) {

                // Получим введённые данные с формы
                $login = $_POST['login'];
                $password = $_POST['password'];

                $user = new Persons();

                $atributs = ['login' => $user->login = $login,
                   'password' => $user->password = $password];

                if($user -> checkPassword($atributs) == true) {
                    $userInfo = Persons::getInfoUser($atributs);
                    session_start();
                    foreach ($userInfo as $item) {
                        $_SESSION['login'] = $item->getLogin();
                        $_SESSION['email'] = $item->getEmail();
                        $_SESSION['First_Name'] = $item->getFirst_Name();
                        $_SESSION['Last_Name'] = $item->getLast_Name();
                        $_SESSION['Company'] = $item->getCompany();
                        $_SESSION['avatar'] = $item->getAvatar();
                    }
                    header("Location:/main");
                }
                else {
                    $data = "Неправильный пароль";
                }
            }
            else {
                $data = 'Некоторые поля пустые';
            }
        }
        $this->view->generate(null, 'login_view.php', $data);
    }

    public function actionLogout()
    {
        session_start();
        session_destroy();
        header('Location:/main');
    }
}