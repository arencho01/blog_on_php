<?php

namespace App\Route;

class Route
{
    public static function render(): void
    {
        var_dump($_SERVER['QUERY_STRING']);
        $uri = self::processUri();

        if(!class_exists($uri['controller'])) {
            echo 'Такого контроллера нет';
            exit();
        }

        $controller = new $uri['controller'];
        $method = $uri['action'];
        $id = $uri['id'];
        $id ? $controller->$method($id) : $controller->$method();
    }

    private static function getUri(): array
    {
        $queryString = $_SERVER['QUERY_STRING'];

        parse_str($queryString, $uri);
        var_dump('URI:', $uri);

        return $uri;
    }

    private static function processUri(): array
    {
        $controllerName = self::getUri()['controller'] ?? '';
        $actionName = self::getUri()['action'] ?? '';
        $id = self::getUri()['id'] ?? '';

        $controller = !empty($controllerName) ? 'App\Controllers\\' . ucfirst($controllerName) . 'Controller' : 'App\Controllers\\PostController';
        $method = !empty($actionName) ? $actionName : 'index';
        $id = !empty($id) ? $id : '';

        return [
            'controller' => $controller,
            'action' => $method,
            'id' => $id
        ];
    }
}