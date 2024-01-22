<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href='../assets/css/main.css'>
    <link rel="stylesheet" href="styles/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<?php

include_once "../../views/header__dashboard.php";
?>
<section class='container-fluid row'>
<?php
include_once "../../views/menu__dashboard.php";
?>
<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;port=3306;dbname=cciCovoiturage';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour obtenir le nombre total d'utilisateurs
    $requete_utilisateurs = "SELECT COUNT(*) AS nombre_utilisateurs FROM utilisateurs";
    $resultat_utilisateurs = $db->query($requete_utilisateurs);
    $nombre_utilisateurs = $resultat_utilisateurs->fetch(PDO::FETCH_ASSOC)['nombre_utilisateurs'];

    // Requête SQL pour obtenir le nombre total d'itinéraires
    $requete_itineraires = "SELECT COUNT(*) AS nombre_itineraires FROM Itineraire";
    $resultat_itineraires = $db->query($requete_itineraires);
    $nombre_itineraires = $resultat_itineraires->fetch(PDO::FETCH_ASSOC)['nombre_itineraires'];

    // Requête SQL pour obtenir le nombre total de messages
    $requete_messages = "SELECT COUNT(*) AS nombre_messages FROM messages";
    $resultat_messages = $db->query($requete_messages);
    $nombre_messages = $resultat_messages->fetch(PDO::FETCH_ASSOC)['nombre_messages'];

    // Fermer la connexion à la base de données
    $db = null;

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
<!-- Partie HTML -->
<div class='col-sm-6 ms-3 order-3 '>
<h2 class='mt-5 text-start'>Tableau de bord</h2>
<div class='d-flex gap-5 mt-5 text-center'>
<p>Total d'utilisateurs <br> <?php echo $nombre_utilisateurs; ?></p>
<p>Total d'itinéraires <br>  <?php echo $nombre_itineraires; ?></p>
<p>Total de messages <br>  <?php echo $nombre_messages; ?></p>
</div>

</div>
</section>

</body>
</html>