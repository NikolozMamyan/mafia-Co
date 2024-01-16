<?php

require_once 'UserController.php';
// use App\Controllers\AuthController;
require_once 'indexDashboardView.php';
require_once 'DashboardModel.php';

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
<?php include_once "../../views/header__dashboard.php"; ?>
<section class='container-fluid row'>

    <?php include_once "../../views/menu__dashboard.php";?>
    <div class='col-sm-6 ms-3 order-3 '>
<h2 class='mt-5 text-start'>Tableau de bord</h2>
<div class='d-flex gap-5 mt-5 text-center'>
    <?php 
    $dbModel = new DashboardModel('mysql:host=localhost;port=3306;dbname=cciCovoiturage', 'root', '');
    $UserController = new UserController($dbModel);
    $data = $UserController->getDataForDashboard();
    
    $dashboardView = new DashboardView();
    $dashboardView->render($data);
    
    ?>
    </div>
    </section>

    </body>
</html>