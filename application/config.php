<?php

// подключение ядра

require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'config/DB.php';
/*

Другие модификации

*/
require_once 'core/Route.php';
Route::start(); // запускаем роутер
