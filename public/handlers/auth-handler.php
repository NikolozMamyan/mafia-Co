<?php
require_once __DIR__ . '/../../bootstrap/app.php';
require_once base_path('Controllers/AuthController.php');

if (!empty($_POST['action'])) {
    $controller = new Controllers\AuthController();

    if ($_POST['action'] === 'store') {
        //Auth::isGuestOrRedirect(); // Check guest only
        $controller->store();
    } elseif ($_POST['action'] === 'check') {
        //Auth::isGuestOrRedirect(); // Check guest only
        $controller->check();
    } elseif ($_POST['action'] === 'logout') {
        //Auth::isAuthOrRedirect(); // Check auth
        $controller->logout();
    }
}


// Unknown action
redirectAndExit(Controllers\AuthController::URL_AFTER_LOGOUT);
