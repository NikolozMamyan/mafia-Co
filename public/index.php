<?php
require_once __DIR__ . '/../bootstrap/app.php';

$url = $_SERVER['REQUEST_URI'];

$route = Route::getRouteByUrl($url);
if ($route) {
    try {
        $controller = new $route['class']();

        if (method_exists($controller, $route['method'])) {
            $controller->{$route['method']}();
        } else {
            // report silencieux
            App::reportSilent('Method "'.$route['method'].'" not found in class "'.$route['class'].'"');

            // 404
            http_response_code(404);
            require_once base_path('views/errors/404.php');
        }

    } catch (Exception $exception) {
        App::report($exception);

        http_response_code(500);
        require_once base_path('views/errors/500.php');
        exit();
    }
} else {
    // 404
    http_response_code(404);
    require_once base_path('views/errors/404.php');
}

App::terminate();