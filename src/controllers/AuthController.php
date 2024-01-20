<?php

namespace App\Controllers;

use Auth;
use DB;
use App\Models\Point;
use App\Models\User;
use App\Models\Itineraire;

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
    const CCI_ADDRESS = ''; //TODO a modifier

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
        $title = 'JE M\'INSCRIT';

        $this->render('auth/signup', ['page' => 'register', 'title' => $title]);
    }

    public function modify(): void
    {
        $title = 'Modifier mes informations';

        $user = new User();
        $currUser = DB::fetch(
            "SELECT * FROM utilisateurs WHERE idUtilisateur = :idUtilisateur",
            ['idUtilisateur' => $_SESSION['current_user_id']]
        )[0];
        $user->hydrate($currUser);

        $point = new Point();
        $currPoint = DB::fetch(
            "SELECT * FROM points WHERE idPoint = :idPoint",
            ['idPoint' => $user->getIdPoint()]
        )[0];
        $point->hydrate($currPoint);

        $itineraire = new Itineraire();
        $currItineraire = DB::fetch(
            "SELECT * FROM itineraire WHERE idItineraire = :idItineraire",
            ['idItineraire' => $user->getIdItineraire()]
        )[0];
        $itineraire->hydrate($currItineraire);

        $jours = DB::fetch(
            "SELECT labelJourSemaineCourt FROM itinerairejoursemaine JOIN joursemaine on itinerairejoursemaine.idJourSemaine = joursemaine.idJourSemaine WHERE idItineraire = :idItineraire",
            ['idItineraire' => $user->getIdItineraire()]
        );

        $joursSemaine = array();
        foreach ($jours as $value) {
            array_push($joursSemaine, $value['labelJourSemaineCourt']);
        }

        $currRole = DB::fetch(
            "SELECT labelRole FROM roles WHERE idRole = :idRole",
            ['idRole' => $user->getIdRole()]
        )[0]['labelRole'];

        $this->render('auth/signup', ['page' => 'modify', 'user' => $user, 'itineraire' => $itineraire, 'point' => $point, 'role' => $currRole, 'joursSemaine' => $joursSemaine, 'title' => $title]);
    }

    public function profil(): void
    {
        $this->render('profil/profilUser');
    }



    /**
     * Handle user registration.
     * gestion du formulaire signup
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

        $latitude = $_POST['latitude'] ?? 0.0;
        $longitude = $_POST['longitude'] ?? 0.0;

        $days = $_POST['days'] ?? [];
        $timeStart = $_POST['timeStart'];
        $timeEnd = $_POST['timeEnd'];
        $comment = $_POST['comment'];

        $_SESSION['old'] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'address' => $address,
            'zip' => $zip,
            'city' => $city,
            'tel' => $tel,
            'email' => $email,
            'radio-stacked' => $role,
            'photo' => $photo,
            'days' => $days,
            'timeStart' => $timeStart,
            'timeEnd' => $timeEnd,
            'comment' => $comment,
        ];

        self::validateLatLon($latitude, $longitude);

        // Validation
        if (!$this->validateCredentials($password, $passwordConfirm)  or !$CGU) {
            redirectToRouteAndExit('register');
        }

        // Check User
        $users = DB::fetch("SELECT * FROM utilisateurs WHERE emailUtilisateur = :email;", ['email' => $email]);
        if ($users === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectToRouteAndExit('register');
        } elseif (count($users) >= 1) {
            errors('Cette adresse email est déjà utilisée.');
            redirectToRouteAndExit('register');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $idRole = DB::fetch(
            "SELECT idRole FROM Roles WHERE labelRole = :labelRole",
            ['labelRole' => $role]
        )[0];

        $point = $this->getOrSetPoint($zip, $city, $latitude, $longitude);
        //  $user = new User($firstName, $lastName, $address, $tel, $email, $password, $photo, 0,1, $idRole['idRole'], $point->getIdPoint());
        $user = new User();

        // Utiliser les setters pour définir les propriétés
        $user->setNomUtilisateur($firstName);
        $user->setPrenomUtilisateur($lastName);
        $user->setAdresseUtilisateur($address);
        $user->setTelUtilisateur($tel);
        $user->setEmailUtilisateur($email);
        $user->setMotDePasseUtilisateur($password);
        $user->setPhotoUtilisateur($photo);
        $user->setCompteActif(0); // Exemple de valeur pour compteActif
        $user->setIdRole($idRole['idRole']);
        $user->setIdPoint($point->getIdPoint());

        $itineraire = new Itineraire();

        $itineraire->setAdresseDepart($address);
        $itineraire->setAdresseArrivee(self::CCI_ADDRESS);
        $itineraire->setDebutCours($timeStart);
        $itineraire->setFinCours($timeEnd);
        $itineraire->setNbrPlaceDispo(0);
        $itineraire->setInfoComplementaire($comment);
        $itineraire->setIdPointDepart($user->getIdPoint());
        $itineraire->setIdPointArrivee(1);

        $result = DB::statement(
            "INSERT INTO itineraire(adresseDepart, adresseArrivee, debutCours, finCours, infoComplementaire, idPointDepart, idPointArrivee)"
                . " VALUE(:adresseDepart, :adresseArrivee, :debutCours, :finCours, :infoComplementaire, :idPointDepart, :idPointArrivee);",
            [
                'adresseDepart' => $itineraire->getAdresseDepart(),
                'adresseArrivee' => $itineraire->getAdresseArrivee(),
                'debutCours' => $itineraire->getDebutCours(),
                'finCours' => $itineraire->getFinCours(),
                'infoComplementaire' => $itineraire->getInfoComplementaire(),
                'idPointDepart' => $itineraire->getIdPointDepart(),
                'idPointArrivee' => $itineraire->getIdPointArrivee(),
            ]
        );

        $user->setIdItineraire(DB::getDB()->lastInsertId());

        // Create new user
        $result = DB::statement(
            "INSERT INTO utilisateurs(nomUtilisateur, prenomUtilisateur, adresseUtilisateur, telUtilisateur, emailUtilisateur, motDePasseUtilisateur, photoUtilisateur, compteActif, idItineraire, idPoint, idRole)"
                . " VALUE(:firstName, :lastName, :address, :tel, :email, :password, :photo, :idItineraire, 1, :idPoint, :idRole);",
            [
                'firstName' => $user->getPrenomUtilisateur(),
                'lastName' => $user->getNomUtilisateur(),
                'address' => $user->getAdresseUtilisateur(),
                'tel' => $user->getTelUtilisateur(),
                'email' => $user->getEmailUtilisateur(),
                'password' => $user->getMotDePasseUtilisateur(),
                'photo' => $user->getPhotoUtilisateur(),
                'idItineraire' => $user->getIdItineraire(),
                'idPoint' => $user->getIdPoint(),
                'idRole' => $user->getIdRole(),
            ]
        );

        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectToRouteAndExit('register');
        }
        $user->setIdUtilisateur(DB::getDB()->lastInsertId());

        foreach ($days as $day) {
            $idDay = DB::fetch(
                "SELECT idJourSemaine FROM joursemaine WHERE labelJourSemaine = :labelJourSemaine",
                ['labelJourSemaine' => $day]
            )[0];

            $result = DB::statement(
                "INSERT INTO itineraireJourSemaine(idItineraire, idJourSemaine)"
                    . " VALUE(:idItineraire, :idJourSemaine);",
                [
                    'idItineraire' => $user->getIdItineraire(),
                    'idJourSemaine' => $idDay['idJourSemaine'],
                ]
            );
        }

        // Clear old
        unset($_SESSION['old']);

        $this->ValidatePicture($photo);

        $_SESSION[Auth::getSessionUserIdKey()] = $user->getIdUtilisateur();
        // Message + Redirection
        success('Vous êtes maintenant connecté.');
        redirectToRouteAndExit('profil');
    }

    public function update()
    {
        // Prepare POST
        $dataUser['prenomUtilisateur'] = $_POST['firstName'] ?? '';
        $dataUser['nomUtilisateur'] = $_POST['lastName'] ?? '';
        $dataUser['adresseUtilisateur'] = $_POST['address'] ?? '';
        $dataUser['telUtilisateur'] = $_POST['tel'] ?? '';
        $dataUser['emailUtilisateur'] = $_POST['email'] ?? '';

        $password = $_POST['password'] ?? null;
        $passwordConfirm = $_POST['password-confirm'] ?? null;

        $zip = $_POST['zip'] ?? '';
        $city = $_POST['city'] ?? '';
        $role = $_POST['radio-stacked'] ?? '';
        $photo = $_FILES['photo']['name'] ?? null;
        $CGU = $_POST['CGU'] ?? false;

        $latitude = $_POST['latitude'] ?? 0.0;
        $longitude = $_POST['longitude'] ?? 0.0;

        $days = $_POST['days'] ?? [];
        $dataItineraire['adresseDepart'] = $_POST['address'];
        $dataItineraire['debutCours'] = $_POST['timeStart'];
        $dataItineraire['finCours'] = $_POST['timeEnd'];
        $dataItineraire['infoComplementaire'] = $_POST['comment'];

        self::validateLatLon($latitude, $longitude);

        $idRole = DB::fetch(
            "SELECT idRole FROM Roles WHERE labelRole = :labelRole",
            ['labelRole' => $role]
        )[0]['idRole'];
        $dataUser['idRole'] = $idRole;

        $user = DB::fetch(
            "SELECT * FROM utilisateurs WHERE compteActif = 1 AND idUtilisateur = :idUtilisateur;",
            ['idUtilisateur' => $_SESSION['current_user_id']]
        )[0];

        if (
            (!empty($password) && !empty($passwordConfirm) && !$this->validateCredentials($password, $passwordConfirm)) ||
            (!empty($photo) && !$this->validatePicture($photo))
        ) {
            redirectToRouteAndExit('modify');
        }

        $dataUser['motDePasseUtilisateur'] = password_hash($password, PASSWORD_DEFAULT);

        $point = $this->getOrSetPoint($zip, $city, $latitude, $longitude);
        $dataUser['idPoint'] = $point->getIdPoint();
        $dataUser['idUtilisateur'] = $user['idUtilisateur'];

        DB::update('utilisateurs', $dataUser, $_SESSION['current_user_id'], 'idUtilisateur');
        DB::update('itineraire', $dataItineraire, $user['idItineraire'], 'idItineraire');

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

                redirectToRouteAndExit('profil');
            }
        }
        errors("Les identifiants ne correspondes pas.");
        redirectToRouteAndExit('login');
    }


    protected function logout()
    {
        AUTH::removeSessionUserId();
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
            !preg_match('/^(?=(.*[a-z]){2})(?=(.*[A-Z]){2})(?=(.*\d){2})(?=(.*[!@#$%^&*()_\-+[\]{}|;:,.<>?]){2}).{12,}$/', $password) or
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
        $originalFileName = basename($photo);
        $targetFile = $targetDir . basename($photo);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($targetFile)) {
            $uniqueIdentifier = uniqid();
            $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $uniqueIdentifier . '.' . $imageFileType;
            $targetFile = $targetDir . $newFileName;
            $photo = $newFileName;
        }

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
            if (is_uploaded_file($_FILES["photo"]["tmp_name"]) && move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                echo ("The file " . htmlspecialchars(basename($photo)) . " has been uploaded.");
                return true;
            } else {
                errors("Sorry, there was an error uploading your file.");
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
        $point = new Point();
        $point->setNomVille($city);
        $point->setCodePostalVille($zip);
        $point->setLatitude($latitude);
        $point->setLongitude($longitude);
        $dataPoint = DB::fetch(
            "SELECT * FROM points WHERE nomVille = :city AND codePostalVille = :zip AND latitude = :latitude AND longitude = :longitude;",
            [
                'zip' => $zip,
                'city' => $city,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]
        );
        if ($dataPoint) {
            $point->hydrate($dataPoint);
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
        );
        if ($tempPoint === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectToRouteAndExit('register');
        }
        if (empty($tempPoint)) {
            return false;
        }
        $tempPoint = $tempPoint[0];
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

        DB::statement(
            "INSERT INTO points (nomVille, codePostalVille, latitude, longitude) VALUES (:nomVille, :codePostalVille, :latitude, :longitude)",
            [
                'codePostalVille' => $zip,
                'nomVille' => $city,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]
        );
    }

    public static function validateLatLon($latitude, $longitude)
    {
        if ($latitude == -1 or $longitude == -1) {
            dd('err');
            errors("l'adresse n'est pas valide");
            redirectToRouteAndExit('profil');
        }
    }
}
