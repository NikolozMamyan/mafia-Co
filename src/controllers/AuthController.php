<?php

namespace App\Controllers;

use Auth;
use DB;
use App\Models\Point;
use App\Models\User;

/**
 * Class AuthController
 *
 * Handles authentication-related actions in the application.
 */
class AuthController extends Controller
{
    // const URL_HANDLER = 'handlers/auth-handler.php';
    // const URL_REGISTER = 'signup.php';
    // const URL_LOGIN = 'index.php';
    // const URL_AFTER_LOGIN = 'Profile.php';
    // const URL_AFTER_LOGOUT = 'index.php';

    const ALLOWED_EXTENSIONS = ["jpg", "jpeg", "png", "gif"];
    const MAX_PICTURE_SIZE = 1000000;
    /**
     * Display the login page.
     */
    public function login(): void
    {
        $this->render('auth/login'); // require views/auth/login.php

    }

    /**
     * Display the registration page.
     */
    public function register(): void
    {
        $this->render('auth/signup'); // require views/auth/login.php
    }

    public function url_after_login(): void
    {
        $this->render('profil/profilUser'); // require views/auth/login.php
    }



    /**
     * Handle user registration.
     */
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

        $latitude = $_POST['latitude'] ?? '';
        $longitude = $_POST['longitude'] ?? '';

        $days = $_POST['days'] ?? [];
        $timeStart = $_POST['timeStart'];
        $timeEnd = $_POST['timeEnd'];
        $comment = $_POST['comment'] ?? '';

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
            'days' => $days,
            'timeStart' => $timeStart,
            'timeEnd' => $timeEnd,
            'comment' => $comment,
        ];

        // Validation
        if (!$this->validateCredentials($password, $passwordConfirm) or !$this->ValidatePicture($photo) or !$CGU) {
            redirectAndExit('/applications/mafia-Co/public/signup.php');
        }

        // Check User
        $users = DB::fetch("SELECT * FROM utilisateurs WHERE emailUtilisateur = :email;", ['email' => $email]);
        if ($users === false) {
             dd('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            
            redirectToRouteAndExit('register');
        } elseif (count($users) >= 1) {
             dd('Cette adresse email est déjà utilisée.');
            redirectToRouteAndExit('register');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $idRole = DB::fetch(
            "SELECT idRole FROM Roles WHERE labelRole = :labelRole",
            ['labelRole' => $role]
        )[0];

        $point = $this->getOrSetPoint($zip, $city, $latitude, $longitude);
         $user = new User($firstName, $lastName, $address, $tel, $email, $password, $photo, 0,1, $idRole['idRole'], $point->getIdPoint());
        // $user=new User();
        // Create new user
        $result = DB::statement(
            "INSERT INTO utilisateurs(nomUtilisateur, prenomUtilisateur, adresseUtilisateur, telUtilisateur, emailUtilisateur, motDePasseUtilisateur, photoUtilisateur,idPoint, idRole)"
                . " VALUE(:firstName, :lastName, :address, :tel, :email, :password, :photo, :idPoint, :idRole);",
            [
                'firstName' => $user->getPrenomUtilisateur(),
                'lastName' => $user->getNomUtilisateur(),
                'address' => $user->getAdresseUtilisateur(),
                'tel' => $user->getTelUtilisateur(),
                'email' => $user->getEmailUtilisateur(),
                'password' => $user->getMotDePasseUtilisateur(),
                'photo' => $user->getPhotoUtilisateur(),
                'idPoint' => $user->getIdPoint(),
                'idRole' => $user->getIdRole(),
            ]
        );
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            
            redirectToRouteAndExit('register');
        }

        // Auth new user
        $_SESSION[Auth::getSessionUserIdKey()] = DB::getDB()->lastInsertId();

        // Clear old
        unset($_SESSION['old']);

        // Message + Redirection
        success('Vous êtes maintenant connecté.');

        redirectToRouteAndExit('profil');
    }

    /**
     * Check user credentials during login.
     */
    public function check(): void
    {   
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        // Check DB
        $users = DB::fetch("SELECT * FROM utilisateurs WHERE compteActif = 1 AND emailUtilisateur = :login;", ['login' => $login]);
        if ($users === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectToRouteAndExit('login');
        }

        // Check user retrieved
        if (count($users) >= 1) {
            $user = $users[0];

            // Version 2: with password hashing
            if (password_verify($password, $user['motDePasseUtilisateur'])) {
                $_SESSION[Auth::getSessionUserIdKey()] = $user['idUtilisateur'];

                $me = new User();

                $userData = [
                    'idUtilisateur' => $users['idUtilisateur'],
                    'nomUtilisateur' => $users['nomUtilisateur'],
                    'prenomUtilisateur' => $users['prenomUtilisateur'],
                    'adresseUtilisateur' => $users['adresseUtilisateur'],
                    'telUtilisateur' => $users['telUtilisateur'],
                    'emailUtilisateur' => $users['emailUtilisateur'],
                    'motDePasseUtilisateur' => $users['motDePasseUtilisateur'],
                    'photoUtilisateur' => $users['photoUtilisateur'],
                    'dateInscriptionUtilisateur' => $users['dateInscriptionUtilisateur'],
                    'derniereModificationUtilisateur' => $users['derniereModificationUtilisateur'],
                ];
                $me->hydrate($userData);

                redirectToRouteAndExit('url_after_login');
            }
        }

        errors("Les identifiants ne correspondes pas.");
        redirectToRouteAndExit('login');
    }



    /**
     * Validate user credentials.
     *
     * @param string $password The user's password.
     * @param string $passwordConfirm The confirmed password.
     *
     * @return bool Returns true if credentials are valid, false otherwise.
     */
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

    /**
     * Validate user-uploaded profile picture.
     *
     * @param string $photo The file name of the uploaded picture.
     *
     * @return bool Returns true if the picture is valid, false otherwise.
     */
    protected function ValidatePicture($photo)
    {
        $targetDir = __DIR__ . "/../../storage/";
        $targetFile = $targetDir . basename($photo);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($targetFile)) {
            dd("Sorry, the file already exists.");
            $uploadOk = false;
        }

        // Check the file size (you can adjust this value)
        if ($_FILES["photo"]["size"] > self::MAX_PICTURE_SIZE) {
             dd("Sorry, your file is too large.");
            $uploadOk = false;
        }

        // Allow only certain file formats (you can customize this list)
        if (!in_array($imageFileType, self::ALLOWED_EXTENSIONS)) {
             dd("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
            $uploadOk = false;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === false) {
            dd("Sorry, your file was not uploaded.");
        } else {
            // If everything is fine, try to upload the file
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                echo ("The file " . htmlspecialchars(basename($photo)) . " has been uploaded.");
                return true;
            } else {
                dd("Sorry, there was an error uploading your file.");
            }
        }
        return false;
    }

    /**
     * Get the ID of a point based on zip code, city, latitude, and longitude.
     *
     * @param string $zip The zip code.
     * @param string $city The city name.
     * @param string $latitude The latitude.
     * @param string $longitude The longitude.
     *
     * @return mixed The ID of the point.
     */
    protected static function getIdPoint($zip, $city, string $latitude, string $longitude)
    {
        $point = new Point($city, $zip, $latitude, $longitude);
        $idPoint = DB::fetch(
            "SELECT idPoint FROM points WHERE nomVille = :city AND codePostalVille = :zip AND latitude = :latitude AND longitude = :longitude;",
            [
                'zip' => $zip,
                'city' => $city,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]
        );
        if ($idPoint) {
            $point->setidPoint($idPoint);
            return $point;
        }
        return false;
    }

    protected function getOrSetPoint($zip, $city, string $latitude, string $longitude): Point
    {
        $point = $this->getPointById($zip, $city, $latitude, $longitude);
        if (!$point) {
            $this->insertPoint($zip, $city, $latitude, $longitude);
            $point = $this->getPointById($zip, $city, $latitude, $longitude);
        }
        return $point;
    }

    protected function getPointById($zip, $city, string $latitude, string $longitude): Point|false
    {
        
        $tempPoint = DB::fetch(
            "SELECT * FROM points WHERE nomVille = :city AND codePostalVille = :zip AND latitude = :latitude AND longitude = :longitude;",
            [
                'zip' => $zip,
                'city' => $city,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]
        )[0];
        if ($tempPoint === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectToRouteAndExit('register');
        }
        if (empty($tempPoint)) {
            return false;
        }
        $tempPoint['latitude'] = (float)$tempPoint['latitude'];
        $tempPoint['longitude'] = (float)$tempPoint['longitude'];
        $point = new Point();
        $point->hydrate($tempPoint);
        return $point;
    }

    protected function insertPoint($zip, $city, string $latitude, string $longitude): void
    {
        // $point = new Point(
        //     $city,
        //     $zip,
        //     floatval($latitude),
        //     floatval($longitude),
        // );
        // $point->save('points');

        $point = DB::statement(
            "INSERT INTO points (nomVille, codePostalVille, latitude, longitude) VALUES (:nomVille, :codePostalVille, :latitude, :longitude)",
            [
                'codePostalVille' => $zip,
                'nomVille' => $city,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]
        );
    }
}
