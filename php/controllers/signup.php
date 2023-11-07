<?php 
// SignupController.php
class SignupController {
    public function register() {
        include_once "config.php"; // Inclure la configuration de la base de données
        $userModel = new UserModel($conn);

        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $image = $_FILES['image'];

            $result = $userModel->registerUser($fname, $lname, $email, $password, $image);

            if ($result === "success") {
                // Redirigez l'utilisateur vers la page de connexion après l'inscription réussie
                header("location: login.php");
            } else {
                // Affichez un message d'erreur en fonction du résultat
                echo $result;
            }
        }
    }
}
?>