<?php

use application\core\Controller;
use application\core\View;
use application\models\Persons\Persons;

class Controller_Profile extends Controller
{
    public function __construct()
    {
       // $this->model = new Model_Profile();
        $this->view = new View();
    }

    public function actionIndex()
    {
        session_start();

        $user = new Persons();

        if (isset($_POST['upload'])) {
            // укажем путь сохранения файла
            $uploaddir = '/img/Users/';
            // создание случайного имени файлу
            $apend = date('YmdHis') . rand(100, 1000);

            $uploadfile = "$uploaddir$apend.jpg";

            if (($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg'
                    || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size']
                    != 0 and $_FILES['userfile']['size'] <= 512000)) {
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    $data[0] = "Файл загружен";
                } else {
                    $data[0] = "Файл не загружен, вернитеcь и попробуйте еще раз";
                }
            } else {
                $data[0] = "Размер файла не должен превышать 512Кб";
            }
            $atributs = [
                'avatar' => $apend];

            $user->update($atributs);
        }
        if (isset($_POST['submit'])) {
            if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['second_password']) && !empty($_POST['Company'])
                && !empty($_POST['First_Name']) && !empty($_POST['Last_Name'])) {
                if($_POST['password']==$_POST['second_password']) {
                    // Получим введённые данные с формы
                    $login = $_SESSION['login'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $Company = $_POST['Company'];
                    $First_Name = $_POST['First_Name'];
                    $Last_Name = $_POST['Last_Name'];

                    $atributs = [
                        'email' =>$user->email = $email,
                        'First_Name' =>$user->First_Name = $First_Name,
                        'Last_Name' =>$user->Last_Name = $Last_Name,
                        'Company' =>$user->Company = $Company,
                        'login' =>$user->login = $login,
                        'password' =>$user->password = $password];

                    $user->update($atributs);

                    $userInfo = Persons::getInfoUser($atributs);

                    foreach ($userInfo as $item) {
                        $_SESSION['email'] = $item->getEmail();
                        $_SESSION['First_Name'] = $item->getFirst_Name();
                        $_SESSION['Last_Name'] = $item->getLast_Name();
                        $_SESSION['Company'] = $item->getCompany();
                        $_SESSION['avatar'] = $item->getAvatar();
                    }
                }
                else {
                    $data[1] = 'Неправильно ввёденый пароль';
                }
            }
            else {
                $data[1] = 'Некоторые поля пустые';
            }
        }
        if (isset($_SESSION['login'])) {
            //$data = $this->model->getData();
            $this->view->generate('profile_view.php', 'layout_view.php', $data);
        }
    }
}
