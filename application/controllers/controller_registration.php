<?php

use application\core\Controller;
use application\core\View;
use application\models\Model_Registration;
use application\models\Persons\Persons;

class Controller_Registration extends Controller
{
    /**
     * @var Model_Registration
     */
    private Model_Registration $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Registration();
    }

    public function actionIndex()
    {
        if (isset($_POST['submit'])) {

            if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {

                // Получим введённые данные с формы
                $login = $_POST['login'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Шаблоны регулярных выражений
                $pattern_login = '/\w{3,}/';
                $pattern_email = '/\w+@\w+\.\w+/';
                $pattern_password = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

                if (preg_match($pattern_login, $login) &&
                    preg_match($pattern_email, $email) &&
                    preg_match($pattern_password, $password)) {

                    $user = new Persons();

                    $atributs = [$user->login = $login,
                        $user->email = $email,
                        $user->password = $password,
                        $user->First_Name = "",
                        $user->Last_Name = "",
                        $user->Company = ""];

                    $data = $user->save($atributs);

                    header("Location:/main");
                }
                else {
                    $data = 'Не правильно введённые данные, пароль должен иметь одну цифру и одну заглавную 
                букву';
                }
            }
            else {
                $data = 'Некоторые поля пустые';
            }
        }
        $this->view->generate(null,'registration_view.php', $data);
    }
}
