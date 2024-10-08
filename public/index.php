<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);   // удалить эти 2 строки

require_once '../vendor/autoload.php';

$controller = new Blog\controllers\PostController();
$controller->index();

