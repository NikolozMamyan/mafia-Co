<?php 
<<<<<<< HEAD
=======
include_once ("views/header.php"); 
include_once('views/login.php');
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
} else {
    include_once "config.php";// configuration de la base de données
    $loginController = new LoginController();
    $loginController->index();
}
if (isset($_SESSION['unique_idd'])) {
    header("location: users.php");
} else {
    include_once "config.php"; // configuration de la base de données
    $signupController = new SignupController();
    $signupController->register();
}
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
} else {
    include_once "config.php"; // configuration de la base de données
    $usersController = new UsersController();
    $usersController->index();
}
>>>>>>> 38eb9bfc94f031b9910c741df9a35d005aa08718

?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>