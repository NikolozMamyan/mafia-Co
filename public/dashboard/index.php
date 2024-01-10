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



 <h1>Tableau de bord</h1>
 <p>Total d'utilisateurs: <?php echo $totalUsers; ?></p>
    <p>Total d'itinéraires: <?php echo $totalRoutes; ?></p>
    <p>Total de messages: <?php echo $totalMessages; ?></p>


</section>

</body>
</html>