<?php

class Route
{

    public static function start()
    {

        /*Контроллер и экшен по умолчанию*/

        $controller_name = "Main";
        $action_name = "Index";

        $route = explode("/", $_SERVER['REQUEST_URI']);

        /* определяем контроллер */
        if (!empty($route[1])) {
            $controller_name = $route[1];
        }
        if (!empty($route[2])) {
            $action_name = $route[2];
        }
         // добавляем префиксы
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action' . $action_name;

        // подключаем файл с классом модели

        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }

        // подцключаем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;
        }
        else {
            Route::errorPage404();
        }
        // создаем контроллер
        $controller = new $controller_name();

        if (method_exists($controller, $action_name)) {
            // вызываем действие контроллера
            $controller->$action_name();
        }
        else {
            Route::errorPage404();
        }
    }

    public static function errorPage404()
    {
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:' . $host . '404');
    }
}
