
<?php

require_once(__DIR__ . '/../../views/headDev.php');
?>
<link rel="stylesheet" type="text/css" href='../assets/css/main.css'>
<body>
    <header class="header__dashboard">
        <img src="../assets/iconsDashboard/LogoCCI.svg" alt="Logo" class="logo__dashboard">
            <nav class="navBar__dashboard">
                <form action="" class="search__bar">
                    <button class="search__dashbaord">
                        <img class="" type="submit" src="../assets/iconsDashboard/loupe.svg">
                    </button>
                    <input type="text"  class="inp__dashboard" placeholder="Rechercher un utilisateur">
                </form>
                <div class="admin__dashboard">
                    <div class="user__details">
                        <span class="name">John Doe </span>
                        <br>
                        <span >Amin</span>
                    </div>
                    <div class="avatar">
                        <img src="../assets/iconsDashboard/Profile Icon.png" alt="Avatar">
                    </div>
                    </div>
            </nav>
    </header>
<main>
    <div class="sidebar__dashboard">
        <img src="../assets/iconsDashboard/LogoCCI.svg" alt="Logo" class="logo">
        <ul class="menu__dashboard">
            <li><a href="index.php"> <img src="../assets/iconsDashboard/Dashboard.svg" alt="Home"><span> Dashboard</span></a></li>
            <li><a href="utilisateurs.php"> <img src="../assets/iconsDashboard/people.svg" alt="Utilisateurs"> <span> Utilisateurs</span></a></li>
            <li><a href="#"> <img src="../assets/iconsDashboard/folder-open.svg" alt="Trajets"> <span> Trajets</span></a></li>
            <li><a href="#"> <img src="../assets/iconsDashboard/message.svg" alt="Message"> <span> Messages</span></a></li>
            <li><a href="#"> <img src="../assets/iconsDashboard/setting-2.svg" alt="Parametres"> <span> Parametres</span></a></li>
        </ul>
        <li class="deconnexion" ><a href="#"> <img  src="../assets/iconsDashboard/logout.svg" alt="Deconnexion"> <span> Deconnexion</span></a></li>
    </div>
</main>
<div class='flex__title mt-5'>
    <p class='title'>Dashboard-Utilisateurs</p>
    <a class='user__create' href="userCreate.php">Créer un utilisateur</a>
</div>
<section class="container-sm mt-2  container__center ">
  
<table class="users__table ">
        <thead>
            <tr class="table__head">
                <th>Utilisateur</th>
                <th class="display__none">Ville</th>
                <th>Status</th>
                <th class="display__none">Commentaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
// Connecte-toi à ta base de données (remplace ces informations par les tiennes)
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
    
    echo "<td class='display__none'>" . htmlspecialchars($resultVille["nomVille"]) . "</td>";
    $idRole = $row["idRole"];
    $sqlRole = "SELECT labelRole FROM Roles WHERE idRole = :idRole";
    $stmtRole = $db->prepare($sqlRole);
    $stmtRole->bindParam(':idRole', $idRole);
    $stmtRole->execute();
    $resultRole = $stmtRole->fetch(PDO::FETCH_ASSOC);
    
    echo "<td>" . htmlspecialchars($resultRole["labelRole"]) . "</td>";
  
      echo "<td class='display__none'>" . 'test'. "</td>";
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
<div class="pagination mt-5">
    <?php
    // Calcule le nombre total de pages
    $sql = "SELECT COUNT(*) as total FROM utilisateurs";
    $result = $db->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $totalPages = ceil($row['total'] / $itemsPerPage);

    // Affiche les liens de pagination
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
    ?>
</div>

</body>
</html>
