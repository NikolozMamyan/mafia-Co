<?php
require_once __DIR__.'/../bootstrap/app.php';

// Check auth
Auth::isAuthOrRedirect();

$controller = new App\Controllers\ProductsController();
$controller->show();

// Remove errors, success and old data
App::terminate();
