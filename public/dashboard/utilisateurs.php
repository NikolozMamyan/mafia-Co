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
// Connexion à la base de données
$dsn = 'mysql:host=localhost;port=3306;dbname=cciCovoiturage';
$username = 'root';
$password = '';

try {
$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Détermine la page actuelle
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Détermine le nombre d'éléments par page
$itemsPerPage = 4;

// Calcule l'offset pour la requête SQL
$offset = ($currentPage - 1) * $itemsPerPage;

// Récupère les données de la base de données en fonction de la page actuelle
$sql = "SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, idRole, idPoint FROM utilisateurs LIMIT $offset, $itemsPerPage";

$result = $db->query($sql);


// Affiche les données dans le tableau HTML
foreach ($result as $row) {
echo "<tr>";
echo "<td>" . htmlspecialchars($row["nomUtilisateur"] . " " . $row["prenomUtilisateur"]) . "</td>";

// Récupère la ville associée à l'idPoint
$idPoint = $row["idPoint"];
$sqlVille = "SELECT nomVille FROM Points WHERE idPoint = :idPoint";
$stmtVille = $db->prepare($sqlVille);
$stmtVille->bindParam(':idPoint', $idPoint);
$stmtVille->execute();
$resultVille = $stmtVille->fetch(PDO::FETCH_ASSOC);

echo "<td class='display__none__dashboard'>" . htmlspecialchars($resultVille["nomVille"]) . "</td>";
$idRole = $row["idRole"];
$sqlRole = "SELECT labelRole FROM Roles WHERE idRole = :idRole";
$stmtRole = $db->prepare($sqlRole);
$stmtRole->bindParam(':idRole', $idRole);
$stmtRole->execute();
$resultRole = $stmtRole->fetch(PDO::FETCH_ASSOC);

echo "<td>" . htmlspecialchars($resultRole["labelRole"]) . "</td>";

echo "<td class='display__none__dashboard'>" . 'test'. "</td>";
echo "<td class='user-details action__icon mt-5'>";
echo "<a href='editUser.php?id=" . htmlspecialchars($row["idUtilisateur"]) . "'><img src='../assets/iconsDashboard/modifier.svg' alt='iconModifier'></a>";
echo "<a href='deleteUser.php?id=" . htmlspecialchars($row["idUtilisateur"]) . "'><img src='../assets/iconsDashboard/supprimer.svg' alt='iconSupprimer'></a>";

echo "</tr>";
}


} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();
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