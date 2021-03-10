<?php

session_start();

use application\core\Controller;
use application\core\View;
use application\models\Model_Profile;
use application\models\Persons\Persons;

class Controller_Profile extends Controller
{

    private Model_Profile $model;
    /**
     * @var Persons
     */
    private Persons $user;

    public function __construct()
    {
       $this->model = new Model_Profile();
       $this->view = new View();
       $this->user = new Persons();
    }

    public function actionIndex()
    {
        $this->loadModel("profile", "model_profile");

        if (isset($_POST['upload'])) {
            $data[0] = $this->uploadFile();
        }

        if (isset($_POST['submit'])) {
            $data[1] = $this->uploadUserInfo();
        }

        if (isset($_SESSION['login'])) {
            //$data = $this->model->getData();
            $this->view->generate('profile_view.php', 'layout_view.php', $data);
        }
    }

    public function uploadFile(): string
    {

        // Specify the path to save the file
        $uploaddir = '/img/Users/';
        // Generating a random file name
        $apend = date('YmdHis') . rand(100, 1000);

        $uploadfile = "$uploaddir$apend.jpg";

        if (($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg'
                || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size']
                != 0 and $_FILES['userfile']['size'] <= 512000)) {
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

                $atributs = ['avatar' => $apend];

                $this->user->update($atributs);

                return "Файл загружен";

            } else {

                return "Файл не загружен, вернитеcь и попробуйте еще раз";

            }
        } else {

           return "Размер файла не должен превышать 512Кб";

        }
    }

    public function uploadUserInfo(): string
    {
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['second_password']) && !empty($_POST['Company'])
            && !empty($_POST['First_Name']) && !empty($_POST['Last_Name'])) {
            if($_POST['password']==$_POST['second_password']) {
                // Get the entered data from the form
                $login = $_SESSION['login'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $Company = $_POST['Company'];
                $First_Name = $_POST['First_Name'];
                $Last_Name = $_POST['Last_Name'];

                $atributs = [
                    'email' =>$this->user->email = $email,
                    'First_Name' =>$this->user->First_Name = $First_Name,
                    'Last_Name' =>$this->user->Last_Name = $Last_Name,
                    'Company' =>$this->user->Company = $Company,
                    'login' =>$this->user->login = $login,
                    'password' =>$this->user->password = $password];

                $this->user->update($atributs);

                $userInfo = Persons::getInfoUser($atributs);

                foreach ($userInfo as $item) {
                    $_SESSION['email'] = $item->getEmail();
                    $_SESSION['First_Name'] = $item->getFirst_Name();
                    $_SESSION['Last_Name'] = $item->getLast_Name();
                    $_SESSION['Company'] = $item->getCompany();
                    $_SESSION['avatar'] = $item->getAvatar();
                }

                return "Данные загружены";
            }
            else {
                return 'Неправильно ввёденый пароль';
            }
        }
        else {
            return 'Некоторые поля пустые';
        }
    }

}
