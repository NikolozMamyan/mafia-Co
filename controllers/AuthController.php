<?php

namespace Controllers;

require_once 'Controller.php';
require_once __DIR__ . '/../helpers/path_functions.php';
require_once __DIR__ . '/../helpers/Auth.php';
require_once __DIR__ . '/../helpers/redirect_functions.php';
require_once __DIR__ . '/../helpers/session_functions.php';

use Auth;
use DB;

class AuthController extends Controller
{
    const URL_HANDLER = '/handlers/auth-handler.php';
    const URL_REGISTER = '/signup.php';
    const URL_LOGIN = '/login.php';
    const URL_AFTER_LOGIN = '/';
    const URL_AFTER_LOGOUT = '/';

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
        $photo = $_POST['photo'] ?? '';
        $CGU = $_POST['CGU'] ?? false;

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
        // TODO <------------

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

        $pointResult = DB::statement(
            "INSERT INTO Points(nomVille, codePostalVille, latitude, longitude)"
                . " VALUE(:city, :zip, :latitude, :longitude);",
            [
                'zip' => $zip,
                'city' => $city,
                'latitude' => null,
                'longitude' => null,
            ]
        );
        var_dump($pointResult);
        exit;

        // Create new user
        $result = DB::statement(
            "INSERT INTO utilisateurs(nomUtilisateur, prenomUtilisateur, adresseUtilisateur, telUtilisateur, emailUtilisateur, motDePasseUtilisateur, photoUtilisateur, idRole)"
                . " VALUE(:firstName, :lastName, :address, :tel, :email, :password, :photo, :idRole);",
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'address' => $address,
                'tel' => $tel,
                'email' => $email,
                'password' => $password,
                'photo' => $photo,
                'idRole' => $idRole,
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

        // Validation
        if (!$this->validateCredentials($password)) {
            errors("Le champs d'e-mail doit avoir au moins 6 charactères.");
            errors("Le champs de mot de passe doit avoir au moins 8 charactères");
            redirectAndExit(self::URL_LOGIN);
        }

        // Check DB
        $users = DB::fetch("SELECT * FROM users WHERE email = :login;", ['login' => $login]);
        if ($users === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_LOGIN);
        }

        // Check user retrieved
        if (count($users) >= 1) {
            $user = $users[0];

            // Version 2: with password hashing
            if (password_verify($password, $user['password'])) {
                $_SESSION[Auth::getSessionUserIdKey()] = $user['id'];
                redirectAndExit(self::URL_AFTER_LOGIN);
            }
        }

        errors("Les identifiants ne correspondes pas.");
        redirectAndExit(self::URL_LOGIN);
    }

    public function validateCredentials(string $password): bool
    {
        // Validation
        if (strlen($password) < 8) {
            return false;
        }

        return true;
    }

    public function logout(): void
    {
        session_destroy();
        redirectAndExit(self::URL_AFTER_LOGOUT);
    }
}
