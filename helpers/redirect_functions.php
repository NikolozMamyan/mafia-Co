<?php

if (!function_exists('redirectAndExit')) {
    function redirectAndExit(string $url): void
    {
        redirect($url);
        exit();
    }
}

if (!function_exists('redirect')) {
    function redirect(string $url): void
    {
        header("Location: $url");
    }
}

if (!function_exists('redirectToRouteAndExit')) {
    function redirectToRouteAndExit(string $name): void
    {
        redirectAndExit(route($name));
    }
}

if (!function_exists('route')) {
    function route(string $name): string
    {
        return Route::getUrlByRouteName($name);
    }
}

if (!function_exists('routeEcho')) {
    function routeEcho(string $name): void
    {
        echo route($name);
    }
}
