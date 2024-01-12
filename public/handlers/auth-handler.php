<?php
// require_once __DIR__ . '/../../bootstrap/app.php';

// if (!empty($_POST['action'])) {
//     $controller = new App\Controllers\AuthController();

//     if ($_POST['action'] === 'store') {
//         Auth::isGuestOrRedirect(); // Check guest only
//         $controller->store();
//     } elseif ($_POST['action'] === 'check') {
//         Auth::isGuestOrRedirect(); // Check guest only
//         $controller->check();
//     } elseif ($_POST['action'] === 'logout') {
//         Auth::isAuthOrRedirect(); // Check auth
//         $controller->logout();
//     }
// }

// // Remove errors, success and old data
// App::terminate();

// // Unknown action
// redirectAndExit(App\Controllers\AuthController::URL_AFTER_LOGOUT);
