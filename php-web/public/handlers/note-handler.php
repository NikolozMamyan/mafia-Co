<?php
require_once __DIR__.'/../../bootstrap/app.php';

// Auth
Auth::isAuthOrRedirect();

if (!empty($_POST['action'])) {
    $controller = new App\Controllers\NotesController();

    if ($_POST['action'] === 'store') {
        $controller->store();
    }
}

// Remove errors, success and old data
App::terminate();

// Unknown action
redirectAndExit(App\Controllers\NotesController::URL_INDEX);
