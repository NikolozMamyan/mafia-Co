<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit07803b3a4610d9868b38f322b67d6374
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        '667aeda72477189d0494fecd327c3641' => __DIR__ . '/..' . '/symfony/var-dumper/Resources/functions/dump.php',
        '06ed1fb8b9021db03e9a03c614d3013d' => __DIR__ . '/../..' . '/helpers/html_functions.php',
        'dc7e795209b3aab59968c007028f03ec' => __DIR__ . '/../..' . '/helpers/path_functions.php',
        'a3f3ae41b34263769deb0ae173955d70' => __DIR__ . '/../..' . '/helpers/redirect_functions.php',
        '288580b3f35edbf534664e97ec20b821' => __DIR__ . '/../..' . '/helpers/session_functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\VarDumper\\' => 28,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\VarDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-dumper',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App' => __DIR__ . '/../..' . '/helpers/class/App.php',
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Auth' => __DIR__ . '/../..' . '/helpers/class/Auth.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DB' => __DIR__ . '/../..' . '/helpers/class/Db.php',
        'Map' => __DIR__ . '/../..' . '/helpers/class/Map.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Route' => __DIR__ . '/../..' . '/helpers/class/Route.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit07803b3a4610d9868b38f322b67d6374::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit07803b3a4610d9868b38f322b67d6374::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit07803b3a4610d9868b38f322b67d6374::$classMap;

        }, null, ClassLoader::class);
    }
}
