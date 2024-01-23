<?php
namespace App\Controllers;
// Récupération des valeurs 
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse']; 
$codePostal = $_POST['codePostal'];
$ville = $_POST['ville'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$motDePasseUtilisateur = $_POST['$motDePasseUtilisateur'];


// Si ok, enregistrer le mot de passe
$role = $_POST['role'];

// Instantiation du contrôleur
$dashboardController = new \App\Controllers\DashboardController();

// Appel de la méthode pour insérer l'utilisateur
$dashboardController->createUser(
  $nom,
  $prenom,
  $adresse,
  $codePostal,
  $ville,
  $telephone,
  $email,
  $motDePasseUtilisateur,
  $role   
);

// Redirection vers la liste des utilisateurs
header("Location: adminUtilisateurs");
?>