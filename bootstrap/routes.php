<?php

use \App\Controllers\{
    AuthController,
    ChatController,
    ContactController,
    MessageController,
    NotificationController,
    ProfilController,
    SearchController,
    DashboardController,
};

/**
 * Define routes for the application.
 */

/**
 * Default route for the login page.
 */
Route::new('/', AuthController::class, 'login', 'index');


/**
 * Auth routes.
 * string $url,
 * string $classFullName,
 *  string $methodName,
 *  ?string $name = null,
 */
Route::new('/register', AuthController::class, 'register','register');
Route::new('/register/store', AuthController::class, 'store', 'register.store');
Route::new('/login', AuthController::class, 'login', 'login');
Route::new('/login/check', AuthController::class, 'check', 'login.check');
Route::new('/logout', AuthController::class, 'afterLogoutUrl', 'logout');
Route::new('/profil', AuthController::class, 'profil', 'profil');


Route::new('/admin', DashboardController::class, 'index');
Route::new('/adminUtilisateurs', DashboardController::class, 'utilisateurs', 'index.utilisateurs');
Route::new('/deleteUserAdmin', DashboardController::class, 'deleteUserR', 'deleteUser');
Route::new('/createUserAdmin', DashboardController::class, 'createUserAdmin', 'createUserAdmin');









