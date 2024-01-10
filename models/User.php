<?php

namespace models;

require_once __DIR__ . '/Model.php';

use DateTime;

class User extends Model
{
    protected int $idUtilisateur;
    protected string $nomUtilisateur;
    protected string $prenomUtilisateur;
    protected string $adresseUtilisateur;
    protected string $telUtilisateur;
    protected string $emailUtilisateur;
    protected string $motDePasseUtilisateur;
    protected string $photoUtilisateur;
    protected bool $compteActif;
    protected string $dateInscriptionUtilisateur;
    protected string $derniereModificationUtilisateur;
    protected string $roleUtilisateur;
    protected string $zipcodeUtilisateur;
    protected string $villeUtilisateur;
    protected string $latUtilisateur;
    protected string $lonUtilisateur;
    protected array $contacts;
    protected array $notifications;
    protected int $trajet;

    // Getter pour idUtilisateur
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    // Setter pour idUtilisateur
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    // Getter pour PrenomUtilisateur
    public function getPrenomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    // Setter pour PrenomUtilisateur
    public function setPrenomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    // Getter pour nomUtilisateur
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    // Setter pour nomUtilisateur
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    // Getter pour adresseUtilisateur
    public function getAdresseUtilisateur()
    {
        return $this->adresseUtilisateur;
    }

    // Setter pour adresseUtilisateur
    public function setAdresseUtilisateur($adresseUtilisateur)
    {
        $this->adresseUtilisateur = $adresseUtilisateur;
    }

    // Getter pour telUtilisateur
    public function getTelUtilisateur()
    {
        return $this->telUtilisateur;
    }

    // Setter pour telUtilisateur
    public function setTelUtilisateur($telUtilisateur)
    {
        $this->telUtilisateur = $telUtilisateur;
    }

    // Getter pour emailUtilisateur
    public function getEmailUtilisateur()
    {
        return $this->emailUtilisateur;
    }

    // Setter pour emailUtilisateur
    public function setEmailUtilisateur($emailUtilisateur)
    {
        $this->emailUtilisateur = $emailUtilisateur;
    }

    // Getter pour motDePasseUtilisateur
    public function getMotDePasseUtilisateur()
    {
        return $this->motDePasseUtilisateur;
    }

    // Setter pour motDePasseUtilisateur
    public function setMotDePasseUtilisateur($motDePasseUtilisateur)
    {
        $this->motDePasseUtilisateur = $motDePasseUtilisateur;
    }

    // Getter pour photoUtilisateur
    public function getPhotoUtilisateur()
    {
        return $this->photoUtilisateur;
    }

    // Setter pour photoUtilisateur
    public function setPhotoUtilisateur($photoUtilisateur)
    {
        $this->photoUtilisateur = $photoUtilisateur;
    }

    // Getter pour compteActif
    public function getCompteActif()
    {
        return $this->compteActif;
    }

    // Setter pour compteActif
    public function setCompteActif($compteActif)
    {
        $this->compteActif = $compteActif;
    }

    // Getter pour dateInscriptionUtilisateur
    public function getDateInscriptionUtilisateur()
    {
        return $this->dateInscriptionUtilisateur;
    }

    // Setter pour dateInscriptionUtilisateur
    public function setDateInscriptionUtilisateur($dateInscriptionUtilisateur)
    {
        $this->dateInscriptionUtilisateur = $dateInscriptionUtilisateur;
    }

    // Getter pour derniereModificationUtilisateur
    public function getDerniereModificationUtilisateur()
    {
        return $this->derniereModificationUtilisateur;
    }

    // Setter pour derniereModificationUtilisateur
    public function setDerniereModificationUtilisateur($derniereModificationUtilisateur)
    {
        $this->derniereModificationUtilisateur = $derniereModificationUtilisateur;
    }

    // Getter pour roleUtilisateur
    public function getRoleUtilisateur()
    {
        return $this->roleUtilisateur;
    }

    // Setter pour roleUtilisateur
    public function setRoleUtilisateur($roleUtilisateur)
    {
        $this->roleUtilisateur = $roleUtilisateur;
    }

    // Getter pour zipcodeUtilisateur
    public function getZipcodeUtilisateur()
    {
        return $this->zipcodeUtilisateur;
    }

    // Setter pour zipcodeUtilisateur
    public function setZipcodeUtilisateur($zipcodeUtilisateur)
    {
        $this->zipcodeUtilisateur = $zipcodeUtilisateur;
    }

    // Getter pour villeUtilisateur
    public function getVilleUtilisateur()
    {
        return $this->villeUtilisateur;
    }

    // Setter pour villeUtilisateur
    public function setVilleUtilisateur($villeUtilisateur)
    {
        $this->villeUtilisateur = $villeUtilisateur;
    }

    // Getter pour latUtilisateur
    public function getLatUtilisateur()
    {
        return $this->latUtilisateur;
    }

    // Setter pour latUtilisateur
    public function setLatUtilisateur($latUtilisateur)
    {
        $this->latUtilisateur = $latUtilisateur;
    }

    // Getter pour lonUtilisateur
    public function getLonUtilisateur()
    {
        return $this->lonUtilisateur;
    }

    // Setter pour lonUtilisateur
    public function setLonUtilisateur($lonUtilisateur)
    {
        $this->lonUtilisateur = $lonUtilisateur;
    }

    // Méthodes pour gérer les contacts
    public function ajouterContact($contact)
    {
        $this->contacts[] = $contact;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    // Méthodes pour gérer les notifications
    public function ajouterNotification($notification)
    {
        $this->notifications[] = $notification;
    }

    public function getNotifications()
    {
        return $this->notifications;
    }

    // Méthodes pour gérer les trajets
    public function ajouterTrajet($trajet)
    {
        $this->trajet = $trajet;
    }

    public function getTrajets()
    {
        return $this->trajet;
    }

    // Méthode pour obtenir les données de l'utilisateur sous forme de tableau
    public function toArray()
    {
        return [
            'idUtilisateur' => $this->idUtilisateur,
            'nomUtilisateur' => $this->nomUtilisateur,
            'prenomUtilisateur' => $this->prenomUtilisateur,
            'adresseUtilisateur' => $this->adresseUtilisateur,
            'telUtilisateur' => $this->telUtilisateur,
            'emailUtilisateur' => $this->emailUtilisateur,
            'motDePasseUtilisateur' => $this->motDePasseUtilisateur,
            'photoUtilisateur' => $this->photoUtilisateur,
            'compteActif' => $this->compteActif,
            'dateInscriptionUtilisateur' => $this->dateInscriptionUtilisateur,
            'derniereModificationUtilisateur' => $this->derniereModificationUtilisateur,
            'roleUtilisateur' => $this->roleUtilisateur,
            'zipcodeUtilisateur' => $this->zipcodeUtilisateur,
            'villeUtilisateur' => $this->villeUtilisateur,
            'latUtilisateur' => $this->latUtilisateur,
            'lonUtilisateur' => $this->lonUtilisateur,
        ];
    }
}
