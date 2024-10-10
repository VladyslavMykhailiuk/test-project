<?php

class Router {
    protected $routes = [];

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function dispatch() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes[$requestMethod] as $uri => $controller) {
            if ($uri === $requestUri) {
                list($controllerName, $method) = explode('@', $controller);
                $this->callController($controllerName, $method);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

    protected function callController($controllerName, $method) {
        require_once "../backend/app/Controllers/$controllerName.php";
        $controller = new $controllerName();
        $controller->$method();
    }
}

$router = new Router();

$router->get('/teachers', 'TeachersController@index');
$router->get('/subjects', 'SchedulesController@index');
$router->post('/subjects', 'SchedulesController@store');
$router->get('/teachers-schedules', 'TeacherScheduleController@index');
$router->post('/teachers-schedules', 'TeacherScheduleController@store');
$router->post('/teachers', 'TeachersController@store');

$router->dispatch();
