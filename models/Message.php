<?php

namespace models;

class Message extends Model
{
    protected int $idMessage;
    protected string $contenuMessage;
    protected string $dateTimeMessage;
    protected int $idUtilisateur;
    protected int $idUtilisateurDestinataire;

    // Constructeur
    public function __construct($contenuMessage, $idUtilisateur, $idUtilisateurDestinataire)
    {
        $this->contenuMessage = $contenuMessage;
        $this->idUtilisateur = $idUtilisateur;
        $this->idUtilisateurDestinataire = $idUtilisateurDestinataire;
        $this->dateTimeMessage = date('Y-m-d H:i:s');
    }

    // Getters
    public function getIdMessage()
    {
        return $this->idMessage;
    }

    public function getContenuMessage()
    {
        return $this->contenuMessage;
    }

    public function getDateTimeMessage()
    {
        return $this->dateTimeMessage;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getIdUtilisateurDestinataire()
    {
        return $this->idUtilisateurDestinataire;
    }

    // Setters
    public function setIdMessage($idMessage)
    {
        $this->idMessage = $idMessage;
    }

    public function setContenuMessage($contenuMessage)
    {
        $this->contenuMessage = $contenuMessage;
    }

    public function setDateTimeMessage($dateTimeMessage)
    {
        $this->dateTimeMessage = $dateTimeMessage;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setIdUtilisateurDestinataire($idUtilisateurDestinataire)
    {
        $this->idUtilisateurDestinataire = $idUtilisateurDestinataire;
    }

    // Méthode pour obtenir les données sous forme de tableau
    public function toArray()
    {
        return [
            'idMessage' => $this->idMessage,
            'contenuMessage' => $this->contenuMessage,
            'dateTimeMessage' => $this->dateTimeMessage,
            'idUtilisateur' => $this->idUtilisateur,
            'idUtilisateurDestinataire' => $this->idUtilisateurDestinataire,
        ];
    }
}
