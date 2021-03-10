<?php

// подключение ядра

require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/ActiveRecord.php';
require_once 'config/DB.php';

//require_once "../vendor/autoload.php";
/*
Другие модификации

*/
require_once 'models/ActiveRecordEntity/Posts.php';
require_once 'models/ActiveRecordEntity/Persons.php';
require_once 'models/ActiveRecordEntity/PassManager.php';

require_once 'core/Route.php';
Route::start(); // запускаем роутер
