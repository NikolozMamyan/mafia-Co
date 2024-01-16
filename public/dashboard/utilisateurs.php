<?php

require_once 'UserController.php';
// use App\Controllers\AuthController;
require_once 'UserView.php';
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
    <div class='d-flex justify-content-end mt-5 col-sm-9 order-2 order-sm-1 gap-5'>
        <a class='user__create__dashboard' href="userCreate.php">Créer un utilisateur</a>
    </div>
    <?php include_once "../../views/menu__dashboard.php";?>

    <?php
    $dbModel = new DashboardModel('mysql:host=localhost;port=3306;dbname=cciCovoiturage', 'root', '');

    $userController = new UserController();
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $itemsPerPage = 4;

    $users = $userController->getUsers($currentPage, $itemsPerPage);

    $totalPages = $dbModel->getTotalPages($itemsPerPage); 

    $userView = new UserView();
    $userView->setDatabaseModel($dbModel);
    $userView->displayTable($users);
    ?>
</section>
<?php
$userView->displayPagination($currentPage, $totalPages);
?>
</body>
</html>
