<?php

namespace App\models;


/**
 * Classe User
 * 
 * @package models
 */
class User extends Model
{

    // Constantes pour le modèle
    protected static string $childTableName = 'Utilisateur';

    protected ?int $idUtilisateur;
    protected ?string $nomUtilisateur;
    protected ?string $prenomUtilisateur;
    protected ?string $adresseUtilisateur;
    protected ?string $telUtilisateur;
    protected ?string $emailUtilisateur;
    protected ?string $motDePasseUtilisateur;
    protected ?string $photoUtilisateur;
    protected ?int $compteActif;
    protected ?string $dateInscriptionUtilisateur;
    protected ?string $derniereModificationUtilisateur;
    protected ?int $idItineraire;
    protected ?int $idRole;
    protected ?int $idPoint;

    /**
     * Constructeur pour créer des objets User
     *
     * @param string|null $nomUtilisateur
     * @param string|null $prenomUtilisateur
     * @param string|null $adresseUtilisateur
     * @param string|null $telUtilisateur
     * @param string|null $emailUtilisateur
     * @param string|null $motDePasseUtilisateur
     * @param string|null $photoUtilisateur
     * @param int|null $compteActif
     * @param int|null $idRole
     * @param int|null $idPoint
     * @param DateTime|string|null $dateInscriptionUtilisateur
     * @param DateTime|string|null $derniereModificationUtilisateur
     */
    public function __construct(
        ?string $nomUtilisateur = null,
        ?string $prenomUtilisateur = null,
        ?string $adresseUtilisateur = null,
        ?string $telUtilisateur = null,
        ?string $emailUtilisateur = null,
        ?string $motDePasseUtilisateur = null,
        ?string $photoUtilisateur = null,
        ?int $compteActif = null,
        ?int $idRole = null,
        ?int $idPoint = null,
        string $dateInscriptionUtilisateur = null,
        string $derniereModificationUtilisateur = null,
    ) {
        // Initializing object properties
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
        $this->adresseUtilisateur = $adresseUtilisateur;
        $this->telUtilisateur = $telUtilisateur;
        $this->emailUtilisateur = $emailUtilisateur;
        $this->motDePasseUtilisateur = $motDePasseUtilisateur;
        $this->photoUtilisateur = $photoUtilisateur;
        $this->compteActif = $compteActif;
        $this->idRole = $idRole;
        $this->idPoint = $idPoint;
        $this->dateInscriptionUtilisateur = $this->prepareCreatedAt($dateInscriptionUtilisateur);
        $this->derniereModificationUtilisateur = $this->prepareCreatedAt($derniereModificationUtilisateur);
    }

    /**
     * Getter method for idUtilisateur
     *
     * @return int|null
     */
    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    /**
     * Getter method for nomUtilisateur
     *
     * @return string|null
     */
    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    /**
     * Setter method for nomUtilisateur
     *
     * @param string|null $nomUtilisateur
     */
    public function setNomUtilisateur(?string $nomUtilisateur): void
    {
        $this->setFields('nomUtilisateur', $nomUtilisateur);
    }

    /**
     * getPrenomUtilisateur
     *
     * @return string
     */
    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    /**
     * setPrenomUtilisateur
     *
     * @param  mixed $prenomUtilisateur
     * @return void
     */
    public function setPrenomUtilisateur(?string $prenomUtilisateur): void
    {
        $this->setFields('prenomUtilisateur', $prenomUtilisateur);
    }

    /**
     * getAdresseUtilisateur
     *
     * @return string
     */
    public function getAdresseUtilisateur(): ?string
    {
        return $this->adresseUtilisateur;
    }

    /**
     * setAdresseUtilisateur
     *
     * @param  mixed $adresseUtilisateur
     * @return void
     */
    public function setAdresseUtilisateur(?string $adresseUtilisateur): void
    {
        $this->setFields('adresseUtilisateur', $adresseUtilisateur);
    }

    /**
     * getTelUtilisateur
     *
     * @return string
     */
    public function getTelUtilisateur(): ?string
    {
        return $this->telUtilisateur;
    }

    /**
     * setTelUtilisateur
     *
     * @param  mixed $telUtilisateur
     * @return void
     */
    public function setTelUtilisateur(?string $telUtilisateur): void
    {
        $this->setFields('telUtilisateur', $telUtilisateur);
    }

    /**
     * getEmailUtilisateur
     *
     * @return string
     */
    public function getEmailUtilisateur(): ?string
    {
        return $this->emailUtilisateur;
    }

    /**
     * setEmailUtilisateur
     *
     * @param  mixed $emailUtilisateur
     * @return void
     */
    public function setEmailUtilisateur(?string $emailUtilisateur): void
    {
        $this->setFields('emailUtilisateur', $emailUtilisateur);
    }

    /**
     * getMotDePasseUtilisateur
     *
     * @return string
     */
    public function getMotDePasseUtilisateur(): ?string
    {
        return $this->motDePasseUtilisateur;
    }

    /**
     * setMotDePasseUtilisateur
     *
     * @param  mixed $motDePasseUtilisateur
     * @return void
     */
    public function setMotDePasseUtilisateur(?string $motDePasseUtilisateur): void
    {
        $this->setFields('motDePasseUtilisateur', $motDePasseUtilisateur);
    }

    /**
     * getPhotoUtilisateur
     *
     * @return string
     */
    public function getPhotoUtilisateur(): ?string
    {
        return $this->photoUtilisateur;
    }

    /**
     * setPhotoUtilisateur
     *
     * @param  mixed $photoUtilisateur
     * @return void
     */
    public function setPhotoUtilisateur(?string $photoUtilisateur): void
    {
        $this->setFields('photoUtilisateur', $photoUtilisateur);
    }

    /**
     * getCompteActif
     *
     * @return int
     */
    public function getCompteActif(): ?int
    {
        return $this->compteActif;
    }

    /**
     * isCompteActif
     *
     * @return bool
     */
    public function isCompteActif(): bool
    {
        return $this->getCompteActif() == 1;
    }

    /**
     * setCompteActif
     *
     * @param  mixed $compteActif
     * @return void
     */
    public function setCompteActif(?int $compteActif): void
    {
        $this->setFields('compteActif', $compteActif);
    }

    /**
     * getDateInscriptionUtilisateur
     *
     * @return string
     */
    public function getDateInscriptionUtilisateur(): ?string
    {
        return $this->dateInscriptionUtilisateur;
    }

    /**
     * getDerniereModificationUtilisateur
     *
     * @return string
     */
    public function getDerniereModificationUtilisateur(): ?string
    {
        return $this->derniereModificationUtilisateur;
    }

    /**
     * getIdItineraire
     *
     * @return int
     */
    public function getIdItineraire(): ?int
    {
        return $this->idItineraire;
    }

    /**
     * setIdItineraire
     *
     * @param  mixed $idItineraire
     * @return void
     */
    public function setIdItineraire(?int $idItineraire): void
    {
        $this->setFields('idItineraire', $idItineraire);
    }

    /**
     * getIdRole
     *
     * @return int
     */
    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    /**
     * setIdRole
     *
     * @param  mixed $idRole
     * @return void
     */
    public function setIdRole(?int $idRole): void
    {
        $this->setFields('idRole', $idRole);
    }

    /**
     * getIdPoint
     *
     * @return int
     */
    public function getIdPoint(): ?int
    {
        return $this->idPoint;
    }

    /**
     * setIdPoint
     *
     * @param  mixed $idPoint
     * @return void
     */
    public function setIdPoint(?int $idPoint): void
    {
        $this->setFields('idPoint', $idPoint);
    }

    /**
     * Méthode pour obtenir les données de l'utilisateur sous forme de tableau
     *
     * @return array
     */
    public function toArray(): array
    {
        $userArray = parent::toArray();



        return $userArray;
    }
}
