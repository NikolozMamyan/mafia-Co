<?php

use \App\Controllers\{
    AuthController,
    ChatController,
    ContactController,
    MessageController,
    NotificationController,
    ProfilController,
    SearchController,
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
Route::new('/register', AuthController::class, 'register', 'register');
Route::new('/register/store', AuthController::class, 'store', 'register.store');
Route::new('/login', AuthController::class, 'login', 'login');
Route::new('/login/check', AuthController::class, 'check', 'login.check');
Route::new('/modifySignup', AuthController::class, 'modify', 'modify');
Route::new('/modifySignup/update', AuthController::class, 'update', 'modifySignup.update');
Route::new('/logout', AuthController::class, 'afterLogoutUrl', 'logout');
Route::new('/profil', AuthController::class, 'profil', 'profil');
<<<<<<< HEAD

Route::new('/profil', ProfilController::class, 'index', 'profil.index');







=======
Route::new('/search', SearchController::class, 'index', 'search');
>>>>>>> 4fdc98d76990652808909b15761b0990eace3725
