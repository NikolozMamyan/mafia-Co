<?php include(VIEWS.'login.php') ; 

// $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);

if (!preg_match("/^[a-zA-Z]+$/", $nom)) {
    // Gestion de l'erreur : le nom ne doit contenir que des lettres.
}




?>