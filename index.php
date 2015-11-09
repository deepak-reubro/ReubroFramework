<?php

require_once 'core/router/autoload.php';
require_once 'core/controller/class.controller.php';
require_once 'core/model/class.model.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

/******************************************************************************
                     All routes must be defined here
*******************************************************************************/
    
    $r->addRoute('GET', '/fast/users', 'get_all_users_handler');

    // {id} must be a number (\d+)
    $r->addRoute('GET', '/fast/user/{id:\d+}', 'userController');

    // The /{title} suffix is optional
    $r->addRoute('GET', '/fast/articles/{id:\d+}[/{title}]', 'get_article_handler');

/******************************************************************************/

});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// print_r($routeInfo);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
    echo "not found";
    break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
    echo "method not allowed";
    break;
    case FastRoute\Dispatcher::FOUND:
    $handler = $routeInfo[1];
    $vars = $routeInfo[2];
    echo "found";
        // ... call $handler with $vars
    Controller::loadController($handler, $vars);



    break;
}