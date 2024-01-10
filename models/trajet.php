<?php

namespace models;

use DateTime;

class Trajet extends Model
{
    protected int $idTrajet;
    protected string $adresseDepart;
    protected string $adresseArrivee;
    protected int $jourSemaine;
    protected string $debutCours;
    protected string $finCours;
    protected int $nbrPlaceDispo;
    protected string $infoComplementaire;
    protected DateTime $dateCreation;
    protected DateTime $derniereModificationTrajet;
    protected string $zipcodeDepart;
    protected string $villeDepart;
    protected float $latDepart;
    protected float $lonDepart;
    protected string $zipcodeArrivee;
    protected string $villeArrivee;
    protected float $latArrivee;
    protected float $lonArrivee;


    // Constructeur
    public function __construct(
        $adresseDepart,
        $adresseArrivee,
        $jourSemaine,
        $debutCours,
        $finCours,
        $nbrPlaceDispo,
        $infoComplementaire,
        $dateCreation,
        $derniereModificationTrajet,
        $zipcodeDepart,
        $villeDepart,
        $latDepart,
        $lonDepart,
        $zipcodeArrivee,
        $villeArrivee,
        $latArrivee,
        $lonArrivee
    ) {
        $this->adresseDepart = $adresseDepart;
        $this->adresseArrivee = $adresseArrivee;
        $this->jourSemaine = $jourSemaine;
        $this->debutCours = $debutCours;
        $this->finCours = $finCours;
        $this->nbrPlaceDispo = $nbrPlaceDispo;
        $this->infoComplementaire = $infoComplementaire;
        $this->dateCreation = $dateCreation;
        $this->derniereModificationTrajet = $derniereModificationTrajet;
        $this->zipcodeDepart = $zipcodeDepart;
        $this->villeDepart = $villeDepart;
        $this->latDepart = $latDepart;
        $this->lonDepart = $lonDepart;
        $this->zipcodeArrivee = $zipcodeArrivee;
        $this->villeArrivee = $villeArrivee;
        $this->latArrivee = $latArrivee;
        $this->lonArrivee = $lonArrivee;
    }

    // Getter et Setter pour idTrajet
    public function getIdTrajet()
    {
        return $this->idTrajet;
    }

    public function setIdTrajet($idTrajet)
    {
        $this->idTrajet = $idTrajet;
    }

    // Getter et Setter pour adresseDepart
    public function getAdresseDepart()
    {
        return $this->adresseDepart;
    }

    public function setAdresseDepart($adresseDepart)
    {
        $this->adresseDepart = $adresseDepart;
    }

    // Getter et Setter pour adresseArrivee
    public function getAdresseArrivee()
    {
        return $this->adresseArrivee;
    }

    public function setAdresseArrivee($adresseArrivee)
    {
        $this->adresseArrivee = $adresseArrivee;
    }

    // Getter et Setter pour jourSemaine
    public function getJourSemaine()
    {
        return $this->jourSemaine;
    }

    public function setJourSemaine($jourSemaine)
    {
        $this->jourSemaine = $jourSemaine;
    }

    // Getter et Setter pour debutCours
    public function getDebutCours()
    {
        return $this->debutCours;
    }

    public function setDebutCours($debutCours)
    {
        $this->debutCours = $debutCours;
    }

    // Getter et Setter pour finCours
    public function getFinCours()
    {
        return $this->finCours;
    }

    public function setFinCours($finCours)
    {
        $this->finCours = $finCours;
    }

    // Getter et Setter pour nbrPlaceDispo
    public function getNbrPlaceDispo()
    {
        return $this->nbrPlaceDispo;
    }

    public function setNbrPlaceDispo($nbrPlaceDispo)
    {
        $this->nbrPlaceDispo = $nbrPlaceDispo;
    }

    // Getter et Setter pour infoComplementaire
    public function getInfoComplementaire()
    {
        return $this->infoComplementaire;
    }

    public function setInfoComplementaire($infoComplementaire)
    {
        $this->infoComplementaire = $infoComplementaire;
    }

    // Getter et Setter pour dateCreation
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    // Getter et Setter pour derniereModificationTrajet
    public function getDerniereModificationTrajet()
    {
        return $this->derniereModificationTrajet;
    }

    public function setDerniereModificationTrajet($derniereModificationTrajet)
    {
        $this->derniereModificationTrajet = $derniereModificationTrajet;
    }

    // Getter et Setter pour zipcodeDepart
    public function getZipcodeDepart()
    {
        return $this->zipcodeDepart;
    }

    public function setZipcodeDepart($zipcodeDepart)
    {
        $this->zipcodeDepart = $zipcodeDepart;
    }

    // Getter et Setter pour villeDepart
    public function getVilleDepart()
    {
        return $this->villeDepart;
    }

    public function setVilleDepart($villeDepart)
    {
        $this->villeDepart = $villeDepart;
    }

    // Getter et Setter pour latDepart
    public function getLatDepart()
    {
        return $this->latDepart;
    }

    public function setLatDepart($latDepart)
    {
        $this->latDepart = $latDepart;
    }

    // Getter et Setter pour lonDepart
    public function getLonDepart()
    {
        return $this->lonDepart;
    }

    public function setLonDepart($lonDepart)
    {
        $this->lonDepart = $lonDepart;
    }

    // Getter et Setter pour zipcodeArrivee
    public function getZipcodeArrivee()
    {
        return $this->zipcodeArrivee;
    }

    public function setZipcodeArrivee($zipcodeArrivee)
    {
        $this->zipcodeArrivee = $zipcodeArrivee;
    }

    // Getter et Setter pour villeArrivee
    public function getVilleArrivee()
    {
        return $this->villeArrivee;
    }

    public function setVilleArrivee($villeArrivee)
    {
        $this->villeArrivee = $villeArrivee;
    }

    // Getter et Setter pour latArrivee
    public function getLatArrivee()
    {
        return $this->latArrivee;
    }

    public function setLatArrivee($latArrivee)
    {
        $this->latArrivee = $latArrivee;
    }

    // Getter et Setter pour lonArrivee
    public function getLonArrivee()
    {
        return $this->lonArrivee;
    }

    public function setLonArrivee($lonArrivee)
    {
        $this->lonArrivee = $lonArrivee;
    }

    // Méthode pour obtenir les données sous forme de tableau
    public function toArray()
    {
        return [
            'idTrajet' => $this->idTrajet,
            'adresseDepart' => $this->adresseDepart,
            'adresseArrivee' => $this->adresseArrivee,
            'jourSemaine' => $this->jourSemaine,
            'debutCours' => $this->debutCours,
            'finCours' => $this->finCours,
            'nbrPlaceDispo' => $this->nbrPlaceDispo,
            'infoComplementaire' => $this->infoComplementaire,
            'dateCreation' => $this->dateCreation,
            'derniereModificationTrajet' => $this->derniereModificationTrajet,
            'zipcodeDepart' => $this->zipcodeDepart,
            'villeDepart' => $this->villeDepart,
            'latDepart' => $this->latDepart,
            'lonDepart' => $this->lonDepart,
            'zipcodeArrivee' => $this->zipcodeArrivee,
            'villeArrivee' => $this->villeArrivee,
            'latArrivee' => $this->latArrivee,
            'lonArrivee' => $this->lonArrivee,
        ];
    }
}
