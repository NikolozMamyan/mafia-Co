<?php
// HeaderController.php

namespace App\Controllers;

class HeaderController extends Controller
{
    /**
     * Affiche le contenu du header.
     */
    public function show(): void
    {
        // Vous pouvez ajouter du code ici pour récupérer des données nécessaires au header
        // Puis, affichez la vue du header
        $this->render('components/header');
    }
}
