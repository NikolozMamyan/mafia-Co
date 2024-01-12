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
<section class="container-fluid row">
    <div class='d-flex justify-content-end mt-5 col-sm-9 order-2 order-sm-1 gap-5'>
        <a class='user__create__dashboard' href="userCreate.php">Créer un utilisateur</a>
    </div>
    
    <?php
    include_once "../../views/menu__dashboard.php";
    ?>
    <table class="users__table col-sm-6 ms-3 order-3 mt-2">
        <thead>
            <tr class="table__head">
                <th>Utilisateur</th>
                <th class="display__none__dashboard">Ville</th>
                <th>Status</th>
                <th class="display__none__dashboard">Commentaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Utilisation d'AuthController pour obtenir la liste des utilisateurs
            require_once ('../../src/controllers/AuthController.php');
            $users = \Controllers\AuthController::getAllUsers();


            // Affiche les données dans le tableau HTML
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user["nomUtilisateur"] . " " . $user["prenomUtilisateur"]) . "</td>";

                // Récupère la ville associée à l'idPoint
                $idPoint = $user["idPoint"];
                $city = \Controllers\AuthController::getCityByIdPoint($idPoint);

                echo "<td class='display__none__dashboard'>" . htmlspecialchars($city) . "</td>";

                $idRole = $user["idRole"];
                $roleLabel = \Controllers\AuthController::getRoleLabelByIdRole($idRole);

                echo "<td>" . htmlspecialchars($roleLabel) . "</td>";

                echo "<td class='display__none__dashboard'>" . 'test'. "</td>";
                echo "<td class='user-details action__icon mt-5'>";
                echo "<a href='editUser.php?id=" . htmlspecialchars($user["idUtilisateur"]) . "'><img src='../assets/iconsDashboard/modifier.svg' alt='iconModifier'></a>";
                echo "<a href='deleteUser.php?id=" . htmlspecialchars($user["idUtilisateur"]) . "'><img src='../assets/iconsDashboard/supprimer.svg' alt='iconSupprimer'></a>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</section>
<?php
include_once "../../views/pagination__dashboard.php";
?>
</body>
</html>
