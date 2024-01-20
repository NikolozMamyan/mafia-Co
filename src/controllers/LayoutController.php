<?php

namespace App\Controllers;

class LayoutController extends Controller {

    public function index() {
        // Traitement spécifique à la page
        $this->render('components/header' );
    }
}