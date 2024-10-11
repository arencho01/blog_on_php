<?php

namespace App\route;

class Route
{
    public static function render(): void
    {
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

        return $uri;
    }

    private static function processUri(): array
    {
        $controllerName = self::getUri()['controller'] ?? '';
        $actionName = self::getUri()['action'] ?? '';
        $id = self::getUri()['id'] ?? '';

        $controller = !empty($controllerName) ? 'App\controllers\\' . ucfirst($controllerName) . 'Controller' : 'App\controllers\\PostController';
        $method = !empty($actionName) ? $actionName : 'index';
        $id = !empty($id) ? $id : '';

        return [
            'controller' => $controller,
            'action' => $method,
            'id' => $id
        ];
    }
}