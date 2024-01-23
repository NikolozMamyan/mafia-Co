<?php

namespace App\Controllers;

use Auth;
use DB;
use App\Models\User;
use App\Models\Itineraire;
use App\Models\Point;

/**
 * Class ProfilController
 * @package App\Controllers
 */
class ProfilController extends Controller
{
    /**
     * Display the user's profile page.
     */
    public function index(): void
    {
        // Compute notifications before rendering the profile page
        NotificationController::computeNotifications();

        $currentUser = Auth::getCurrentUser();

        if ($currentUser) {
            // Fetch user information and related data
            $title = 'Mon profil';
            $currentId = Auth::getSessionUserId();
            $user = $this->getUserByCurrentId($currentId);
            $itineraire =  $this->getItineraireByCurrentId($user->getIdItineraire());
            $itineraireJourSemaine =  $this->getItineraireJourSemaineByCurrentId($user->getIdItineraire());
            $jourSemaine = $this->getJoursemaineByCurrentId($itineraireJourSemaine);
            $role =  $this->getRoleByCurrentId($user->getIdRole());
            $point =  $this->getPointByCurrentId($user->getIdPoint());
            $arrivee = $this->getPointByCurrentId(1);
            $notificationCount = User::getNotificationCount();
            $messageCount = User::getMessageCount();

            // Render the profile page with data
            $this->render('profil/profilUser', [
                'page' => 'index',
                'user' => $user,
                'itineraire' => $itineraire,
                'point' => $point,
                'arrivee' => $arrivee,
                'role' => $role,
                'itineraireJourSemaine' => $itineraireJourSemaine,
                'joursSemaine' => $jourSemaine,
                'title' => $title,
                'notificationCount' => $notificationCount,
                'messageCount' => $messageCount,
            ]);
        } else {
            // Redirect to login page if user is not authenticated
            $this->render('auth/login');
        }
    }

    /**
     * Log out the user.
     */
    public function logout(): void
    {
        unset($_SESSION);
        session_destroy();
        redirectToRouteAndExit('login');
    }

    /**
     * Get user information by ID.
     *
     * @param $currentId
     * @return User
     */
    protected function getUserByCurrentId($currentId): User
    {
        $user = new User();
        $dataUser = DB::fetch(
            "SELECT * FROM utilisateurs WHERE idUtilisateur = :idUtilisateur",
            ['idUtilisateur' => $_SESSION['current_user_id']]
        )[0];

        $user->hydrate($dataUser);
        return $user;
    }

    /**
     * Get itinerary information by ID.
     *
     * @param $idItineraire
     * @return Itineraire
     */
    protected function getItineraireByCurrentId($idItineraire): Itineraire
    {
        $itineraire = new Itineraire();
        $dataItineraire = DB::fetch(
            "SELECT * FROM itineraire WHERE idItineraire = :idItineraire",
            ['idItineraire' => $idItineraire]
        )[0];
        $itineraire->hydrate($dataItineraire);
        return $itineraire;
    }

    /**
     * Get itinerary weekdays by ID.
     *
     * @param $idItineraire
     * @return array
     */
    protected function getItineraireJourSemaineByCurrentId($idItineraire): array
    {
        $dataJours = DB::fetch(
            "SELECT labelJourSemaineCourt FROM itinerairejoursemaine JOIN joursemaine on itinerairejoursemaine.idJourSemaine = joursemaine.idJourSemaine WHERE idItineraire = :idItineraire",
            ['idItineraire' => $idItineraire]
        );
        return $dataJours;
    }

    /**
     * Get weekdays by ID.
     *
     * @param $jours
     * @return array
     */
    protected function getJoursemaineByCurrentId($jours): array
    {
        $joursSemaine = array();
        foreach ($jours as $value) {
            array_push($joursSemaine, $value['labelJourSemaineCourt']);
        }
        return $joursSemaine;
    }

    /**
     * Get user role by ID.
     *
     * @param $idRole
     * @return string
     */
    protected function getRoleByCurrentId($idRole): string
    {
        $dataRole = DB::fetch(
            "SELECT labelRole FROM roles WHERE idRole = :idRole",
            ['idRole' => $idRole]
        )[0]['labelRole'];
        return $dataRole;
    }

    /**
     * Get point information by ID.
     *
     * @param $idPoint
     * @return Point
     */
    protected function getPointByCurrentId($idPoint): Point
    {
        $point = new Point();
        $dataPoint = DB::fetch(
            "SELECT * FROM points WHERE idPoint = :idPoint",
            ['idPoint' => $idPoint]
        )[0];
        $point->hydrate($dataPoint);
        return $point;
    }
}