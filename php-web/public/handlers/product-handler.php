<?php
require_once __DIR__.'/../../bootstrap/app.php';

// Check auth
Auth::isAuthOrRedirect();

if (!empty($_POST['action'])) {
    $controller = new App\Controllers\ProductsController();

    if ($_POST['action'] === 'store') {
        $controller->store();
    } elseif ($_POST['action'] === 'delete') {
        $controller->delete();
    } elseif ($_POST['action'] === 'update') {
        $controller->update();
    }
}

// Remove errors, success and old data
App::terminate();

// Unknown action
redirectAndExit(App\Controllers\ProductsController::URL_INDEX);
