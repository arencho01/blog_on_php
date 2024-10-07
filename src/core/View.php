<?php

class View {
    public static function render($view, $data = []) {
        extract($data);

        $viewFile = "../app/views/" . $view . ".php";

        // Проверяю существует ли файл
        if (file_exists($viewFile)) {
            include_once "../app/views/layout.php";
        } else {
            throw new Exception("View $view not found");
        }
    }
}