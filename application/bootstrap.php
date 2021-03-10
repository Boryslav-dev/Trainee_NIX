<?php

// connection core

require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/ActiveRecord.php';
require_once 'config/DB.php';

//require_once "../vendor/autoload.php";
/*

Other modifications

*/

require_once 'core/Route.php';

Router::getInstance()->register(); // start the router
