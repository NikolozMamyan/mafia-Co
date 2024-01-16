<?php

namespace App\Controllers;

use Auth;
use DB;
use App\Models\User;
use App\Models\Itineraire;
use App\Models\ItineraireJourSemaine;
use App\Models\JourSemaine;
use App\Models\Role;
use App\Models\Point;

class ProfilController extends Controller
{

    public function index()
    {
        $currentUser = Auth::getCurrentUser();
        if ($currentUser) {
            $currentId = Auth::getSessionUserId();
            $user = $this->getUserByCurrentId($currentId);  
            //dd($user);
            // $itineraire = Itineraire::getItineraireByCurrentId($currentId);
            // $itineraireJourSemaine = ItineraireJourSemaine::getItineraireJourSemaineByCurrentId($currentId);
             $jourSemaine[] = $this->getJoursemaineByCurrentId($currentId);
             dd($jourSemaine);
            // $role = Role::getRoleByCurrentId($currentId);
            // $point = Point::getPointByCurrentId($currentId);
            $this->render('profil/profilUser', [
                'user' => $user,
                // 'itineraire' => $itineraire,
                // 'itineraireJourSemaine' => $itineraireJourSemaine,
                // 'jourSemaine' => $jourSemaine,
                // 'role' => $role,
                // 'point' => $point,
            ]);
        } else {
            $this->render('profil/profilUser');
        }
    }   



    protected function getUserByCurrentId($currentId)
    {  
         return User::findById( $currentId, 'Utilisateurs');  
    }

    protected function getItineraireByCurrentId($currentId)
    {
        // $joins = [
        //     'Utilisateurs' => 'idUtilisateur',
        //     'Itineraires' => 'idItineraire',
        //     'ItinerairesJourSemaine' => 'idItineraire',
        //     'JoursSemaine' => 'idJourSemaine',
        //     'Roles' => 'idRole',
        //     'Points' => 'idPoint',
        // ];
        // Itineraire::findById( $currentId, 'Itineraires',$joins);
    }

    protected function getItineraireJourSemaineByCurrentId($currentId)
    {
    }

    protected function getJoursemaineByCurrentId($currentId)
    {
        return JourSemaine::findById( $currentId, 'JourSemaine',['Utilisateurs','Itineraires','ItinerairesJourSemaine']);
    }

    protected function getRoleByCurrentId($currentId)
    {
    }
    protected function getPointByCurrentId($currentId)
    {
    }
}
