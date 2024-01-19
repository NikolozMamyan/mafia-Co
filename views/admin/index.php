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
        <?php include_once base_path('views/components/menu__dashboard.php'); ?>
        <div class='col-sm-6 ms-3 order-3 '>
            <h2 class='mt-5 text-start'>Tableau de bord</h2>
            <div class='d-flex gap-5 mt-5 text-center'>
                <?php 
                    $yourDBObject = new DashboardController();
                    $users = $yourDBObject->getTotalUsers();
                ?>
                <p>Total d'utilisateurs : <?php echo $users; ?></p>
        
                <p>Total d'itinéraires : </p>
                <p>Total de messages : </p>
            </div>
        </div>
    </section>

    </body>
</html>