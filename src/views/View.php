<?php
namespace App\views;

use Exception;

class View {
    public static function render($view, $data = []): void
    {

        extract($data);

        $viewFile = __DIR__ . '/' . $view . ".php";
        if (file_exists($viewFile)) {
            include_once __DIR__ . "/$view.php";
        } else {
            throw new Exception("View $view not found");
        }
    }
}