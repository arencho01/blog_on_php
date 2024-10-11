<?php

use App\route\Route;

error_reporting(E_ALL);
ini_set('display_errors', 1);   // удалить эти 2 строки

require_once '../vendor/autoload.php';
require_once '../src/route/Route.php';

const HEADER_PATH = '../src/views/header.php';
const FOOTER_PATH = '../src/views/footer.php';

Route::render();

//$controller = new App\controllers\PostController();
//$controller->index();

