<?php


namespace app\core;

class Route
{

    public static function start()
    {
        // контроллер и действие по умолчанию
        $controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controllerName = htmlspecialchars($routes[1]);
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $actionName = htmlspecialchars($routes[2]);
        }

        $item = '';
        if (!empty($routes[3])) {
            $item = htmlspecialchars($routes[3]);
        }

        $controllerName = '\\app\\controllers\\' . $controllerName . 'Controller';
        $actionName = 'action' . $actionName;

        $controller = new $controllerName($item);
        $action = $actionName;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }

    }

    public static function ErrorPage404()
    {
        echo "Страница не найдена";
    }

}
