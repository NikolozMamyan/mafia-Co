<?php
require_once __DIR__ . '/../bootstrap/app.php';

// Check only if guest
//Auth::isGuestOrRedirect();

$controller = new Controllers\AuthController();
$controller->register();

App::terminate();
