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
    
    
    public function show()
    {
         // Obtiens l'utilisateur actuellement connecté
         $currentUser = Auth::getCurrentUser();

         
      
    }

    protected function getUserByCurrentId($currentId){
        //  dd(User::getUserById($currentId));
        // return User::getUserById($currentId);

    }

    protected function getItineraireByCurrentId($currentId){


    }

    protected function getItineraireJourSemaineByCurrentId($currentId){


    }

    protected function getJoursemaineByCurrentId($currentId){


    }

    protected function getRoleByCurrentId($currentId){


    }
    protected function getPointByCurrentId($currentId){


    }
}