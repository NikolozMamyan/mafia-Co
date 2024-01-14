<?php

/**
 * Class Route
 *
 * Represents a routing system for handling URLs and routes in a web application.
 */
class Route
{
    /**
     * @var array $routes An array to store all registered routes.
     */
    protected static array $routes = [];

    /**
     * @var array $urlsByName An array to store URLs indexed by route names.
     */
    protected static array $urlsByName = [];

    /**
     * Get all registered routes.
     *
     * @return array An array containing all registered routes.
     */
    public static function getAllRoutes(): array
    {
        return self::$routes;
    }

    /**
     * Get route information based on the provided URL.
     *
     * @param string $url The URL for which to retrieve the route information.
     *
     * @return array|null An array containing route information or null if not found.
     */
    public static function getRouteByUrl(string $url): ?array
    {
        $url = explode('?', $url)[0];
        return self::$routes[$url] ?? null;
    }

    /**
     * Get the URL for a route based on its name.
     *
     * @param string $name The name of the route.
     *
     * @return string The URL corresponding to the route name.
     *
     * @throws Exception If the route name is not found.
     */
    public static function getUrlByRouteName(string $name): string
    {
        return self::$urlsByName[$name] ?? throw new Exception('Route name "'.$name.'" not found.');
    }

    /**
     * Create a new route and register it.
     *
     * @param string      $url            The URL pattern for the route.
     * @param string      $classFullName  The full name of the class handling the route.
     * @param string      $methodName     The method within the class to handle the route.
     * @param string|null $name           Optional: The name of the route.
     *
     * @return void
     */
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

    /**
     * Automatically create routes for a class based on its methods.
     *
     * @param string $classFullName The full name of the class.
     * @param array  $methods       An array of method names to create routes for.
     * @param bool   $withName      Whether to include route names or not.
     *
     * @return void
     */
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

    /**
     * Format a given URL by trimming, adding a leading '/', and removing trailing '/'.
     *
     * @param string $url The URL to format.
     *
     * @return string The formatted URL.
     *
     * @throws Exception If the URL is invalid.
     */
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
