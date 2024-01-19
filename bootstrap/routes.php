<?php

use \App\Controllers\{
    AuthController,
    ChatController,
    NotificationController,
    ProfilController,
    SearchController,
    OtherController,
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
 */
Route::new('/register', AuthController::class, 'register', 'register');
Route::new('/register/store', AuthController::class, 'store', 'register.store');
Route::new('/login', AuthController::class, 'login', 'login');
Route::new('/login/check', AuthController::class, 'check', 'login.check');
Route::new('/modifySignup', AuthController::class, 'modify', 'modify');
Route::new('/modifySignup/update', AuthController::class, 'update', 'modifySignup.update');


/**
 * chatBox routes.
 */
Route::new('/chat', ChatController::class, 'index', 'chat');


/**
 * Notification routes.
 */
Route::new('/notification', NotificationController::class, 'index', 'notification');

/**
 * Profil routes.
 */
Route::new('/profil', ProfilController::class, 'index', 'profil');
Route::new('/logout', ProfilController::class, 'logout', 'logout');


/**
 * Search routes.
 */
Route::new('/search', SearchController::class, 'index', 'search');
Route::new('/search/result', SearchController::class, 'result', 'search.result');

/**
 * Other routes.
 */
Route::new('/conditionGeneral', OtherController::class, 'conditionIndex', 'conditionIndex');
Route::new('/mentionLegal', OtherController::class, 'mentionIndex', 'mentionIndex');
Route::new('/support', OtherController::class, 'supportIndex', 'supportIndex');
