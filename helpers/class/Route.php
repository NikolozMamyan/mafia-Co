<?php

class Route
{
    protected static array $routes = [];
    protected static array $urlsByName = [];

    public static function getAllRoutes(): array
    {
        return self::$routes;
    }

    public static function getRouteByUrl(string $url): ?array
    {
        $url = explode('?', $url)[0];
        return self::$routes[$url] ?? null;
    }

    public static function getUrlByRouteName(string $name): string
    {
        return self::$urlsByName[$name]
            ?? throw new Exception('Route name "'.$name.'" not found.');
    }

    public static function new(
        string $url,
        string $classFullName,
        string $methodName,
        ?string $name = null,
    ): void {
        $url = self::formatUrl($url);

        $route = [
            'url' => $url,
            'class' => $classFullName,
            'method' => $methodName,
        ];

        if ($name) {
            $route['name'] = $name;
            self::$urlsByName[$name] = $url;
        }

        self::$routes[$url] = $route;
    }

    public static function auto(
        string $classFullName,
        array $methods,
        bool $withName = true
    ): void {
        // \App\Controllers\ProductsController => products
        $className = explode('\\', $classFullName);
        $className = $className[array_key_last($className)];
        $className = str_replace('controller', '', strtolower($className));

        foreach ($methods as $method) {
            $method = strtolower($method);

            $url = $className.'/'.$method;

            $name = $withName
                ? $className.'.'.$method
                : null;

            self::new($url, $classFullName, $method, $name);
        }
    }

    protected static function formatUrl(string $url): string
    {
        // Remove white space after and before the URL
        $url = trim($url);

        // Check url is not empty
        if (empty($url)) {
            throw new Exception('Invalid route URL.');
        }

        // Add first "/"
        if ($url[0] !== '/') {
            $url = '/'.$url;
        }

        // Remove last "/"
        if ($url !== '/') {
            $url = rtrim($url, '/');
        }

        return $url;
    }
}