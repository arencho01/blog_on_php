<?php
namespace Blog\core;

use Exception;

class View {
    public static function render($view, $data = []) {

        extract($data);

        $viewFile = __DIR__ . "/../views/" . $view . ".php";

        // Проверяю существует ли файл
        if (file_exists($viewFile)) {
            include_once __DIR__ . "/../views/$view.php";
        } else {
            throw new Exception("View $view not found");
        }
    }

    public static function trimPost() {

    }
}