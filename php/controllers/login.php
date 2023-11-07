<?php
// Login.php
class LoginController {
    public function login() {
        include_once "config.php"; // Inclure la configuration de la base de données
        $userModel = new UserModel($conn);

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = $userModel->login($email, $password);

            if (is_numeric($result)) {
                // Authentification réussie, redirigez l'utilisateur
                $_SESSION['unique_id'] = $result;
                header("location: users.php");
            } else {
                // Affichez un message d'erreur en fonction du résultat
                echo $result;
            }
        }
    }
}
?>