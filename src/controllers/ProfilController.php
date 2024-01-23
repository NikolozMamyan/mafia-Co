<?php

namespace App\Controllers;

use Auth;
use DB;
use App\Models\User;
use App\Models\Itineraire;
use App\Models\Point;

class ProfilController extends Controller
{

    public function index()
    {
        $currentUser = Auth::getCurrentUser();
        if ($currentUser) {
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
            // var_dump(  $itineraire);
            // exit;
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
            $this->render('auth/login');
        }
    }
    public function logout(): void
    {
        unset($_SESSION);
        session_destroy();
        redirectToRouteAndExit('login');
    }


    protected function getUserByCurrentId($currentId)
    {
        $user = new User();
        $dataUser = DB::fetch(
            "SELECT * FROM utilisateurs WHERE idUtilisateur = :idUtilisateur",
            ['idUtilisateur' => $_SESSION['current_user_id']]
        )[0];
        $user->hydrate($dataUser);
        return $user;
    }

    protected function getItineraireByCurrentId($idItineraire)
    {
        $itineraire = new Itineraire();
        $dataItineraire = DB::fetch(
            "SELECT * FROM itineraire WHERE idItineraire = :idItineraire",
            ['idItineraire' => $idItineraire]
        )[0];
        $itineraire->hydrate($dataItineraire);
        return $itineraire;
    }

    protected function getItineraireJourSemaineByCurrentId($idItineraire)
    {
        $dataJours = DB::fetch(
            "SELECT labelJourSemaineCourt FROM itinerairejoursemaine JOIN joursemaine on itinerairejoursemaine.idJourSemaine = joursemaine.idJourSemaine WHERE idItineraire = :idItineraire",
            ['idItineraire' => $idItineraire]
        );
        return $dataJours;
    }

    protected function getJoursemaineByCurrentId($jours)
    {
        $joursSemaine = array();
        foreach ($jours as $value) {
            array_push($joursSemaine, $value['labelJourSemaineCourt']);
        }
        return $joursSemaine;
    }

    protected function getRoleByCurrentId($idRole)
    {
        $dataRole = DB::fetch(
            "SELECT labelRole FROM roles WHERE idRole = :idRole",
            ['idRole' => $idRole]
        )[0]['labelRole'];
        return $dataRole;
    }

    protected function getPointByCurrentId($idPoint)
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
