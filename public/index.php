<?php

use App\Route\Route;

error_reporting(E_ALL);
ini_set('display_errors', 1);   // удалить эти 2 строки

require_once '../vendor/autoload.php';
require_once '../src/Route/Route.php';

Route::render();

//$controller = new App\controllers\PostController();
//$controller->index();

