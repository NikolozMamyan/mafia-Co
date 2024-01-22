<?php

require_once __DIR__ . '/../bootstrap/app.php';

use App\Controllers\SearchController;

/**
 * Get the current URL from the server request.
 */
$url = $_SERVER['REQUEST_URI'];

/**
 * Attempt to find a route based on the provided URL.
 */
$route = Route::getRouteByUrl($url);


/**
 * If a route is found, attempt to execute the corresponding controller method.
 */
if ($route) {
    try {
        /**
         * Create a new instance of the controller associated with the route.
         */
        $controller = new $route['class']();

        /**
         * Check if the method exists in the controller and execute it.
         */
        if (method_exists($controller, $route['method'])) {
            $controller->{$route['method']}();
        } else {
            // Report silent error.
            App::reportSilent('Method "' . $route['method'] . '" not found in class "' . $route['class'] . '"');

            // Respond with a 404 error.
            http_response_code(404);
            require_once base_path('views/errors/404.php');
        }
    } catch (Exception $exception) {
        // Report the exception and respond with a 500 error.
        App::report($exception);
        http_response_code(500);
        require_once base_path('views/errors/500.php');
        exit();
    }
} else {
    // Respond with a 404 error if no route is found.
    http_response_code(404);
    require_once base_path('views/errors/404.php');
}

/**
 * Terminate the application after processing the request.
 */
App::terminate();
