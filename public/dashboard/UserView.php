<?php

class UserView {
    private $dbModel;

    public function setDatabaseModel($dbModel) {
        $this->dbModel = $dbModel;
    }

    public function displayTable($users) {
        // ... (le reste du code)
        // Affiche les données dans le tableau HTML
        echo '<table class="users__table col-sm-6 ms-3 order-3 mt-2">';
        echo '<thead>';
        echo '<tr class="table__head">';
        echo '<th>Utilisateur</th>';
        echo '<th class="display__none__dashboard">Ville</th>';
        echo '<th>Status</th>';
        echo '<th class="display__none__dashboard">Commentaire</th>';
        echo '<th>Actions</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($users as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["nomUtilisateur"] . " " . $row["prenomUtilisateur"]) . "</td>";

            $idPoint = $row["idPoint"];
            $resultVille = $this->dbModel->getVilleByPointId($idPoint);

            echo "<td class='display__none__dashboard'>" . htmlspecialchars($resultVille["nomVille"]) . "</td>";

            $idRole = $row["idRole"];
            $resultRole = $this->dbModel->getRoleById($idRole);

            echo "<td>" . htmlspecialchars($resultRole["labelRole"]) . "</td>";
            echo "<td class='display__none__dashboard'>" . 'test'. "</td>";
            echo "<td class='user-details action__icon mt-5'>";
            echo "<a href='editUser.php?id=" . htmlspecialchars($row["idUtilisateur"]) . "'><img src='../assets/iconsDashboard/modifier.svg' alt='iconModifier'></a>";
            echo "<a href='deleteUser.php?id=" . htmlspecialchars($row["idUtilisateur"]) . "'><img src='../assets/iconsDashboard/supprimer.svg' alt='iconSupprimer'></a>";
            echo "</td>";

            echo "</tr>";
            // ... (le reste du code)
        }
        echo '</tbody>';
        echo '</table>';
        // ... (le reste du code)
    }

    public function displayPagination($currentPage, $totalPages) {
        echo '<div class="pagination__dashboard mt-5 d-flex justify-content-center">';
        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($currentPage == $i) ? 'active' : '';
            echo "<a class='$activeClass a__dashboard'  href='?page=$i'>$i</a> ";
        }
        echo '</div>';
    }
}
?>
