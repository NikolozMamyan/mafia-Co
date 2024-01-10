<?php
require_once __DIR__.'/../bootstrap/app.php';

// Guest or Auth allowed

$controller = new App\Controllers\WelcomeController();
$controller->index();

// Remove errors, success and old data
App::terminate();
