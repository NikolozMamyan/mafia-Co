<?php 
// Users.php
class UsersController {
    public function index() {
        session_start();
        if (!isset($_SESSION['unique_id'])) {
            header("location: login.php");
        }

        include_once "config.php"; // configuration de la base de données

        $unique_id = $_SESSION['unique_id'];
        $userModel = new UserModel($conn);
        $userDetails = $userModel->getUserDetails($unique_id);
        $otherUsers = $userModel->getOtherUsers($unique_id);

        include "views/users.php"; // Afficher la vue des utilisateurs
    }
}
?>