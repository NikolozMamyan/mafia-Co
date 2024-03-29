<?php
require_once 'db.php';

//  l'identifiant de l'utilisateur (verifications)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];

    // les informations de l'utilisateur à modifier, y compris les données de la table Points
    $sql = "SELECT U.*, P.nomVille, P.codePostalVille 
            FROM utilisateurs U
            JOIN Points P ON U.idPoint = P.idPoint
            WHERE U.idUtilisateur = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

    try {
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de récupération des données : " . $e->getMessage();
    }

    // Si l'utilisateur n'existe pas, redirigez vers utilisateurs.php
    if (!$user) {
        header("Location: utilisateurs.php");
        exit();
    }
} else {
    // Si l'identifiant de l'utilisateur n'est pas fourni, redirigez vers utilisateurs.php
    header("Location: utilisateurs.php");
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // les nouvelles informations de l'utilisateur depuis le formulaire
    $newNom = $_POST['newNom'];
    $newPrenom = $_POST['newPrenom'];
    $newAdresse = $_POST['newAdresse'];
    $newCodePostal = $_POST['newCodePostal'];
    $newVille = $_POST['newVille'];
    $newTelephone = $_POST['newTelephone'];
    $newEmail = $_POST['newEmail'];
    $newRole = $_POST['newRole'];

    // Mettre à jour la table Points pour refléter les modifications de code postal et de ville
    $sqlUpdatePoints = "UPDATE Points SET nomVille = :ville, codePostalVille = :codePostal WHERE idPoint = :idPoint";
    $stmtUpdatePoints = $db->prepare($sqlUpdatePoints);
    $stmtUpdatePoints->bindParam(':idPoint', $user['idPoint'], PDO::PARAM_INT);
    $stmtUpdatePoints->bindParam(':ville', $newVille);
    $stmtUpdatePoints->bindParam(':codePostal', $newCodePostal);

    // Mettre à jour les informations de l'utilisateur dans la table Utilisateurs
    $sqlUpdateUtilisateur = "UPDATE utilisateurs SET 
        nomUtilisateur = :nom, 
        prenomUtilisateur = :prenom, 
        adresseUtilisateur = :adresse, 
        telUtilisateur = :telephone, 
        emailUtilisateur = :email, 
        idRole = :role
        WHERE idUtilisateur = :id";

    $stmtUpdateUtilisateur = $db->prepare($sqlUpdateUtilisateur);
    $stmtUpdateUtilisateur->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmtUpdateUtilisateur->bindParam(':nom', $newNom);
    $stmtUpdateUtilisateur->bindParam(':prenom', $newPrenom);
    $stmtUpdateUtilisateur->bindParam(':adresse', $newAdresse);
    $stmtUpdateUtilisateur->bindParam(':telephone', $newTelephone);
    $stmtUpdateUtilisateur->bindParam(':email', $newEmail);
    $stmtUpdateUtilisateur->bindParam(':role', $newRole);

    try {
        // la mise à jour de la table Points
        $stmtUpdatePoints->execute();

        // la mise à jour de la table Utilisateurs
        $stmtUpdateUtilisateur->execute();

        // Redirirection  vers utilisateurs.php après la mise à jour
        header("Location: utilisateurs.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur de mise à jour : " . $e->getMessage();
    }
}
?>
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
<div class='col-sm-6 ms-3 order-3 '>
<!-- Formulaire HTML -->
<form method="post" action="" enctype="multipart/form-data" class="registration-form">
    <div class="user__create">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="newNom" value="<?php echo htmlspecialchars($user['nomUtilisateur']); ?>" required class="form-input">

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="newPrenom" value="<?php echo htmlspecialchars($user['prenomUtilisateur']); ?>" required class="form-input">

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="newAdresse" value="<?php echo htmlspecialchars($user['adresseUtilisateur']); ?>" required class="form-input">

        <label for="codePostal">Code Postal :</label>
        <input type="text" id="codePostal" name="newCodePostal" value="<?php echo htmlspecialchars($user['codePostalVille']); ?>" required class="small-input">

        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="newVille" value="<?php echo htmlspecialchars($user['nomVille']); ?>" required class="small-input">

        <label for="telephone">Téléphone :</label>
        <input type="tel" id="telephone" name="newTelephone" value="<?php echo htmlspecialchars($user['telUtilisateur']); ?>" required class="form-input">

        <label for="email">Email :</label>
        <input type="email" id="email" name="newEmail" value="<?php echo htmlspecialchars($user['emailUtilisateur']); ?>" required class="form-input">

        <label for="role">Rôle :</label>
        <select id="role" name="newRole" class="form-input">
            <option value="1" <?php echo ($user['idRole'] == 1) ? 'selected' : ''; ?>>Admin</option>
            <option value="2" <?php echo ($user['idRole'] == 2) ? 'selected' : ''; ?>>Conducteur</option>
            <option value="3" <?php echo ($user['idRole'] == 3) ? 'selected' : ''; ?>>Passager</option>
            <option value="4" <?php echo ($user['idRole'] == 4) ? 'selected' : ''; ?>>Conducteur / Passager</option>
        </select>

   

        <button type="submit" class="form-submit-button">Enregistrer les modifications</button>
    </div>
</form>
</div>
</section>