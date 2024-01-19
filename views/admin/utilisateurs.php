<?php
namespace App\Controllers;
// require_once 'UserController.php';
// use App\Controllers\AuthController;
// require_once 'indexDashboardView.php';
// require_once 'DashboardModel.php';

?>

<?php require_once base_path('views/components/headDev.php'); ?>

<body>
    <?php require_once base_path('views/components/header__dashboard.php'); ?>
    <section class='container-fluid row'>
        
        <div class='d-flex justify-content-end mt-5 col-sm-9 order-2 order-sm-1 gap-5'>
            <a class='user__create__dashboard' href="userCreate.php">Créer un utilisateur</a>
        </div>
        
        <?php include_once base_path('views/components/menu__dashboard.php'); ?>

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
                $userMethode = new DashboardController();
                
                $users = $userMethode->getUsers();
                ?>


<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user["nomUtilisateur"] . " " . $user["prenomUtilisateur"]; ?></td>

        <?php 
        $ville = $userMethode->getVilleByPointId($user['idPoint']);  
        ?>
        <td class='display__none__dashboard'><?php echo $ville['nomVille']; ?></td>

        <?php
        $role = $userMethode->getRoleById($user['idRole']);
        ?>
        <td><?php echo $role['labelRole']; ?></td>

        <?php
        $comments = $userMethode->getComments($user['idUtilisateur']);
        ?>
        <td class='display__none__dashboard'><?php echo isset($comments[0]['comment']) ? $comments[0]['comment'] : ''; ?> </td>

        <td class='user-details action__icon mt-5'>
            <a href='editUser.php?id=<?php echo $user['idUtilisateur']; ?>'><img src='../assets/iconsDashboard/modifier.svg' alt='iconModifier'></a>
            
            <a href='deleteUserAdmin?id=<?php echo $user['idUtilisateur']; ?>'><img src='../assets/iconsDashboard/supprimer.svg' alt='iconSupprimer'></a>
        </td>
    </tr>
<?php endforeach; ?>

            </tbody>
        </table>
    </section>

    <!-- <?php
    // $userView->displayPagination($currentPage, $totalPages);
    ?> -->
</body>
</html>
