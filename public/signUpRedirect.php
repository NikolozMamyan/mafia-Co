<?php
require_once __DIR__ . '/../bootstrap/app.php';

// Check only if guest
//Auth::isGuestOrRedirect();

require_once base_path('Controllers/AuthController.php');
$controller = new App\Controllers\AuthController();
$controller->register();

App::terminate();
