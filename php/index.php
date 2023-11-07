<?php 
include_once ("views/header.php"); 
include_once('views/login.php');
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
} else {
    include_once "./php/config.php";// configuration de la base de données
    $loginController = new LoginController();
    $loginController->index();
}
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
} else {
    include_once "./php/config.php"; // configuration de la base de données
    $signupController = new SignupController();
    $signupController->register();
}
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
} else {
    include_once "./php/config.php"; // configuration de la base de données
    $usersController = new UsersController();
    $usersController->index();
}

?>