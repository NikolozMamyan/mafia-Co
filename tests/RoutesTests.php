<?php

// command is ./vendor/bin/phpunit tests/RoutesTests.php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Route;

class RoutesTests extends TestCase
{
    /** @test */
    public function getAllRoutesBeforeNewTest(): void
    {
        TestCase::assertEquals(
            [],
            Route::getAllRoutes()
        );
    }

    /** @test */
    public static function getRouteByUrlBeforeNewTest(): void
    {
        TestCase::assertEquals(
            null,
            Route::getRouteByUrl('/login')
        );
    }

    public static function runNew(): void
    {
        Route::new('/register', '', 'register', 'register');
        Route::new('/login', '', 'login', 'login');
    }

    /** @test */
    public function getAllRoutesAfterNewTest(): void
    {
        self::runNew();
        TestCase::assertEquals(
            [
                '/register' =>
                [
                    'url' => '/register',
                    'class' => '',
                    'method' => 'register',
                    'name' => 'register'
                ],
                '/login' =>
                [
                    'url' => '/login',
                    'class' => '',
                    'method' => 'login',
                    'name' => 'login'
                ]
            ],
            Route::getAllRoutes()
        );
    }

    /** @test */
    public static function getRouteByUrlAfterNewTest(): void
    {
        TestCase::assertEquals(
            [
                'url' => '/login',
                'class' => '',
                'method' => 'login',
                'name' => 'login'
            ],
            Route::getRouteByUrl('/login')
        );
        TestCase::assertEquals(
            null,
            Route::getRouteByUrl('/test')
        );
    }
}
