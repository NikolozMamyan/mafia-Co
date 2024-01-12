<?php

namespace models;


use DB; // Assuming there's a DB class for database operations

/**
 * Classe Itineraire
 *
 * @package models
 */
class Itineraire extends Model
{

    protected static string $childTableName  = 'Itineraire';

    protected ?int $idItineraire;
    protected ?string $adresseDepart;
    protected ?string $adresseArrivee;
    protected ?string $debutCours;
    protected ?string $finCours;
    protected ?int $nbrPlaceDispo;
    protected ?string $infoComplementaire;
    protected ?string $dateCreation;
    protected ?string $derniereModificationTrajet;
    protected int $idPointDepart; // Assuming idPointDepart cannot be null
    protected int $idPointArrivee; // Assuming idPointArrivee cannot be null

    /**
     * Constructeur pour créer des objets Itineraire
     *
     * @param string|null $nomItineraire
     * @param string|null $descriptionItineraire
     * @param int|null $dureeItineraire
     * @param float|null $distanceItineraire
     * @param DateTime|string|null $dateCreationItineraire
     * @param DateTime|string|null $derniereModificationItineraire
     */
    public function __construct(
        ?string $adresseDepart = null,
        ?string $adresseArrivee = null,
        ?string $debutCours = null,
        ?string $finCours = null,
        ?int $nbrPlaceDispo = null,
        ?string $infoComplementaire = null,
        ?string $dateCreation = null,
        ?string $derniereModificationTrajet = null,
        int $idPointDepart = null,
        int $idPointArrivee = null
    ) {
        parent::__construct();

        $this->adresseDepart = $adresseDepart;
        $this->adresseArrivee = $adresseArrivee;
        $this->debutCours = $debutCours;
        $this->finCours = $finCours;
        $this->nbrPlaceDispo = $nbrPlaceDispo;
        $this->infoComplementaire = $infoComplementaire;
        $this->dateCreation = $this->prepareCreatedAt($dateCreation);
        $this->derniereModificationTrajet  = $this->prepareCreatedAt($derniereModificationTrajet);
        $this->idPointDepart = $idPointDepart;
        $this->idPointArrivee = $idPointArrivee;
    }

    // Getter method for idItineraire    
    /**
     * getIdItineraire
     *
     * @return int
     */
    public function getIdItineraire(): ?int
    {
        return $this->idItineraire;
    }

    // Setter method for idItineraire    
    /**
     * setIdItineraire
     *
     * @param  mixed $idItineraire
     * @return void
     */
    public function setIdItineraire($idItineraire): void
    {
        $this->idItineraire = $idItineraire;
    }

    // Getter method for adresseDepart    
    /**
     * getAdresseDepart
     *
     * @return string
     */
    public function getAdresseDepart(): ?string
    {
        return $this->adresseDepart;
    }

    // Setter method for adresseDepart    
    /**
     * setAdresseDepart
     *
     * @param  mixed $adresseDepart
     * @return void
     */
    public function setAdresseDepart($adresseDepart): void
    {
        $this->setFields('adresseDepart', $adresseDepart);
    }

    // Getter method for adresseArrivee    
    /**
     * getAdresseArrivee
     *
     * @return string
     */
    public function getAdresseArrivee(): ?string
    {
        return $this->adresseArrivee;
    }

    // Setter method for adresseArrivee    
    /**
     * setAdresseArrivee
     *
     * @param  mixed $adresseArrivee
     * @return void
     */
    public function setAdresseArrivee($adresseArrivee): void
    {
        $this->setFields('adresseArrivee', $adresseArrivee);
    }

    // Getter method for debutCours    
    /**
     * getDebutCours
     *
     * @return string
     */
    public function getDebutCours(): ?string
    {
        return $this->debutCours;
    }

    // Setter method for debutCours    
    /**
     * setDebutCours
     *
     * @param  mixed $debutCours
     * @return void
     */
    public function setDebutCours($debutCours): void
    {
        $this->setFields('debutCours', $debutCours);
    }

    // Getter method for finCours    
    /**
     * getFinCours
     *
     * @return string
     */
    public function getFinCours(): ?string
    {
        return $this->finCours;
    }

    // Setter method for finCours    
    /**
     * setFinCours
     *
     * @param  mixed $finCours
     * @return void
     */
    public function setFinCours($finCours): void
    {
        $this->setFields('finCours', $finCours);
    }

    // Getter method for nbrPlaceDispo    
    /**
     * getNbrPlaceDispo
     *
     * @return int
     */
    public function getNbrPlaceDispo(): ?int
    {
        return $this->nbrPlaceDispo;
    }

    // Setter method for nbrPlaceDispo    
    /**
     * setNbrPlaceDispo
     *
     * @param  mixed $nbrPlaceDispo
     * @return void
     */
    public function setNbrPlaceDispo($nbrPlaceDispo): void
    {
        $this->setFields('nbrPlaceDispo', $nbrPlaceDispo);
    }

    // Getter method for infoComplementaire    
    /**
     * getInfoComplementaire
     *
     * @return string
     */
    public function getInfoComplementaire(): ?string
    {
        return $this->infoComplementaire;
    }

    // Setter method for infoComplementaire    
    /**
     * setInfoComplementaire
     *
     * @param  mixed $infoComplementaire
     * @return void
     */
    public function setInfoComplementaire($infoComplementaire): void
    {
        $this->setFields('infoComplementaire', $infoComplementaire);
    }

    // Getter method for dateCreation    
    /**
     * getDateCreation
     *
     * @return string
     */
    public function getDateCreation(): ?string
    {
        return $this->dateCreation;
    }

    // Getter method for derniereModificationTrajet    
    /**
     * getDerniereModificationTrajet
     *
     * @return string
     */
    public function getDerniereModificationTrajet(): ?string
    {
        return $this->derniereModificationTrajet;
    }

    // Getter method for idPointDepart    
    /**
     * getIdPointDepart
     *
     * @return int
     */
    public function getIdPointDepart(): int
    {
        return $this->idPointDepart;
    }

    // Setter method for idPointDepart    
    /**
     * setIdPointDepart
     *
     * @param  mixed $idPointDepart
     * @return void
     */
    public function setIdPointDepart(int $idPointDepart): void
    {
        $this->setFields('idPointDepart', $idPointDepart);
    }

    // Getter method for idPointArrivee    
    /**
     * getIdPointArrivee
     *
     * @return int
     */
    public function getIdPointArrivee(): int
    {
        return $this->idPointArrivee;
    }

    // Setter method for idPointArrivee    
    /**
     * setIdPointArrivee
     *
     * @param  mixed $idPointArrivee
     * @return void
     */
    public function setIdPointArrivee(int $idPointArrivee): void
    {
        $this->setFields('idPointArrivee', $idPointArrivee);
    }

    /**
     * Méthode pour obtenir les données de l'itinéraire sous forme de tableau
     *
     * @return array
     */
    public function toArray(): array
    {
        $itineraireArray = parent::toArray();

        return $itineraireArray;
    }
}
