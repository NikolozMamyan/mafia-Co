<?php

namespace App\controllers;

use Auth;
use DB;
use Models\User;

class AuthController extends Controller
{
    const URL_HANDLER = '/applications/mafia-Co/public/handlers/auth-handler.php';
    const URL_REGISTER = '/applications/mafia-Co/public/signupRedirect.php';
    const URL_LOGIN = '/applications/mafia-Co/public/index.php';
    const URL_AFTER_LOGIN = '/applications/mafia-Co/public/Profile.php';
    const URL_AFTER_LOGOUT = '/applications/mafia-Co/public';

    const ALLOWED_EXTENSIONS = ["jpg", "jpeg", "png", "gif"];
    const MAX_PICTURE_SIZE = 1000000;

    public function login(): void
    {
        $actionUrl = self::URL_HANDLER;
        require_once base_path('public/login.php');
    }

    public function register(): void
    {
        $actionUrl = self::URL_HANDLER;
        require_once base_path('public/signup.php');
    }

    public function store(): void
    {
        
        
        // Prepare POST
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $address = $_POST['address'] ?? '';
        $zip = $_POST['zip'] ?? '';
        $city = $_POST['city'] ?? '';
        $tel = $_POST['tel'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password-confirm'] ?? '';
        $role = $_POST['radio-stacked'] ?? '';
        $photo = $_FILES['photo']['name'] ?? '';
        $CGU = $_POST['CGU'] ?? false;

        $user= new User($firstName,$lastName,$address,$zip,$city,$tel,$email,$password,$role,$photo );
        
        $_SESSION['old'] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'address' => $address,
            'zip' => $zip,
            'city' => $city,
            'tel' => $tel,
            'email' => $email,
            'password' => $password,
            'password-confirm' => $passwordConfirm,
            'radio-stacked' => $role,
            'photo' => $photo,
        ];

        // Validation
        if (!$this->validateCredentials($password, $passwordConfirm) or !$this->ValidatePicture($photo)) {
            redirectAndExit('/applications/mafia-Co/public/signupRedirect.php');
        }

        // Check User
        $users = DB::fetch("SELECT * FROM utilisateurs WHERE emailUtilisateur = :email;", ['email' => $email]);
        if ($users === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_REGISTER);
        } elseif (count($users) >= 1) {
            errors('Cette adresse email est déjà utilisée.');
            redirectAndExit(self::URL_REGISTER);
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $idRole = DB::fetch(
            "SELECT idRole FROM Roles WHERE labelRole = :labelRole",
            ['labelRole' => $role]
        )[0];

        $idPoint = AuthController::getIdPoint($zip, $city, '0.0', '0.0');

        $userData = [
            'nomUtilisateur' => $_POST['firstName'] ?? '',
            'prenomUtilisateur' => $_POST['lastName'] ?? '',
            'adresseUtilisateur' => $_POST['address'] ?? '',
            'telUtilisateur' => $_POST['tel'] ?? '',
            'emailUtilisateur' => $_POST['email'] ?? '',
            'motDePasseUtilisateur' => $_POST['password'] ?? '',
            'photoUtilisateur' => $photo = $_FILES['photo']['name'] ?? '',
            'compteActif' => false,
            'dateInscriptionUtilisateur' => date('Y-m-d H:i:s'),
            'derniereModificationUtilisateur' => date('Y-m-d H:i:s'),
            'roleUtilisateur' => $idRole['idRole'],
            'zipcodeUtilisateur' => $_POST['zip'] ?? '',
            'villeUtilisateur' => $_POST['city'] ?? '',
            'latUtilisateur' => '',
            'lonUtilisateur' => '',
        ];
        
        $user->hydrate($userData);

        // dd($user);

        if (!$idPoint) {
            $pointResult = DB::statement(
                "INSERT INTO Points(nomVille, codePostalVille, latitude, longitude)"
                    . " VALUE(:city, :zip, :latitude, :longitude);",
                [
                    'zip' => $zip,
                    'city' => $city,
                    'latitude' => '0.0',
                    'longitude' => '0.0',
                ]
            );
            $idPoint = AuthController::getIdPoint($zip, $city, '0.0', '0.0');
        }

        // Create new user
        $result = DB::statement(
            "INSERT INTO utilisateurs(nomUtilisateur, prenomUtilisateur, adresseUtilisateur, telUtilisateur, emailUtilisateur, motDePasseUtilisateur, photoUtilisateur,idPoint, idRole)"
                . " VALUE(:firstName, :lastName, :address, :tel, :email, :password, :photo, :idPoint, :idRole);",
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'address' => $address,
                'tel' => $tel,
                'email' => $email,
                'password' => $password,
                'photo' => $photo,
                'idPoint' => $idPoint,
                'idRole' => $idRole['idRole'],
            ]
        );
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_REGISTER);
        }

        // Auth new user
        $_SESSION[Auth::getSessionUserIdKey()] = DB::getDB()->lastInsertId();

        // Clear old
        unset($_SESSION['old']);

        // Message + Redirection
        success('Vous êtes maintenant connecté.');
        redirectAndExit(self::URL_AFTER_LOGIN);
    }

    public function check(): void
    {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        // Check DB
        $users = DB::fetch("SELECT * FROM Utilisateurs WHERE emailUtilisateur = :login;", ['login' => $login]);
        if ($users === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_LOGIN);
        }

        // Check user retrieved
        if (count($users) >= 1) {
            $user = $users[0];

            // Version 2: with password hashing
            if (password_verify($password, $user['motDePasseUtilisateur'])) {
                $_SESSION[Auth::getSessionUserIdKey()] = $user['idUtilisateur'];
                redirectAndExit(self::URL_AFTER_LOGIN);
            }
        }

        errors("Les identifiants ne correspondes pas.");
        redirectAndExit(self::URL_LOGIN);
    }

    public function logout(): void
    {
        session_destroy();
        redirectAndExit(self::URL_AFTER_LOGOUT);
    }

    protected function validateCredentials(string $password, string $passwordConfirm): bool
    {
        // Validation
        if (
            !preg_match('/^(?=.*[a-z]{2})(?=.*[A-Z]{2})(?=.*\d{2})(?=.*[!@#$%^&*()_\-+[\]{}|;:,.<>?]{2}).{8,}$/', $password) or
            $password !== $passwordConfirm
        ) {
            return false;
        }
        return true;
    }

    protected function ValidatePicture($photo)
    {
        $targetDir = __DIR__ . "/../uploads/"; // Specify the directory where you want to store the uploaded files
        $targetFile = $targetDir . basename($photo);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($targetFile)) {
            errors("Sorry, the file already exists.");
            $uploadOk = false;
        }

        // Check the file size (you can adjust this value)
        if ($_FILES["photo"]["size"] > self::MAX_PICTURE_SIZE) {
            errors("Sorry, your file is too large.");
            $uploadOk = false;
        }

        // Allow only certain file formats (you can customize this list)
        if (!in_array($imageFileType, self::ALLOWED_EXTENSIONS)) {
            errors("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
            $uploadOk = false;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === false) {
            errors("Sorry, your file was not uploaded.");
        } else {
            // If everything is fine, try to upload the file
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                echo ("The file " . htmlspecialchars(basename($photo)) . " has been uploaded.");
                return true;
            } else {
                errors("Sorry, there was an error uploading your file.");
            }
        }
        return false;
    }

    protected static function getIdPoint($zip, $city, string $latitude, string $longitude)
    {
        $idPoint = DB::fetch(
            "SELECT idPoint FROM Points WHERE nomVille = :city AND codePostalVille = :zip AND latitude = :latitude AND longitude = :longitude;",
            [
                'zip' => $zip,
                'city' => $city,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]
        )[0];
        return $idPoint['idPoint'];
    }
}
