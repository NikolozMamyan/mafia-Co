<?php
require_once __DIR__.'/../bootstrap/app.php';

// Check only if guest
Auth::isGuestOrRedirect();

$controller = new App\Controllers\AuthController();
$controller->login();

// Remove errors, success and old data
App::terminate();
