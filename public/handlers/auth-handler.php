<?php
require_once __DIR__ . '/../helpers/path_functions.php';
require_once __DIR__ . '/../helpers/redirect_functions.php';
require_once __DIR__ . '/../helpers/session_functions.php';
require_once __DIR__ . '/../helpers/Auth.php';
require_once base_path('Controllers/AuthController.php');

var_dump($_POST['action']);
exit;

if (!empty($_POST['action'])) {
    $controller = new Controllers\AuthController();

    if ($_POST['action'] === 'store') {
        Auth::isGuestOrRedirect(); // Check guest only
        $controller->store();
    } elseif ($_POST['action'] === 'check') {
        Auth::isGuestOrRedirect(); // Check guest only
        $controller->check();
    } elseif ($_POST['action'] === 'logout') {
        Auth::isAuthOrRedirect(); // Check auth
        $controller->logout();
    }
}


// Unknown action
redirectAndExit(Controllers\AuthController::URL_AFTER_LOGOUT);
