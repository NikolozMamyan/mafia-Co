<?php

use \App\Controllers\{
    WelcomeController,
    AuthController,
    HomeController,
    ProductsController,
};

 Route::new('/', WelcomeController::class, 'index', 'welcome');

// // Auth
// Route::new('/register', AuthController::class, 'register', 'register');
// Route::new('/register/store', AuthController::class, 'store', 'register.store');
// Route::new('/login', AuthController::class, 'login', 'login');
// Route::new('/login/check', AuthController::class, 'check', 'login.check');
// Route::new('/logout', AuthController::class, 'logout', 'logout');

// // Home
// Route::new('/dashboard', HomeController::class, 'index', 'home');


// // Products
// Route::auto(ProductsController::class, [
//     'index', // => /products/index + products.index
//     'create',
//     'store',
//     'show',
//     'edit',
//     'update',
//     'delete',
// ]);
