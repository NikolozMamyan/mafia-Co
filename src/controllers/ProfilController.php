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

         if ($currentUser) {
             // Utilise la méthode pour obtenir les détails de l'utilisateur par son ID
             $userDetails = $this->getUserByCurrentId($currentUser['idUtilisateur']);
 
             // Affiche les détails de l'utilisateur (tu peux ajuster cela en fonction de ta logique d'affichage)
             if ($userDetails) {
                 echo "Nom: " . $userDetails[0]['nomUtilisateur'] . "<br>";
                 echo "Prénom: " . $userDetails[0]['prenomUtilisateur']  . "<br>";
                 echo "Nom: " . $userDetails[0]['nomUtilisateur'] . "<br>";
                 echo "Prénom: " . $userDetails[0]['prenomUtilisateur']  . "<br>";
                 echo "Nom: " . $userDetails[0]['nomUtilisateur'] . "<br>";
                 echo "Prénom: " . $userDetails[0]['prenomUtilisateur']  . "<br>";
             } else {
                 echo "Utilisateur non trouvé.";
             }
         } else {
             echo "Utilisateur non connecté.";
         }
      
    }

    protected function getUserByCurrentId($currentId){
         dd(User::getUserById($currentId));
        return User::getUserById($currentId);

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