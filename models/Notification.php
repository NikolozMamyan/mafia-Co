<?php

namespace models;

use DateTime;

class Notification extends Model
{
    protected int $idUtilisateur;
    protected int $idUtilisateurNotif;
    protected DateTime $dateNotification;
    protected bool $isReadNotification;
    protected DateTime $dateReadNotification;

    public function __construct($idUtilisateur, $idUtilisateurNotif)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->idUtilisateurNotif = $idUtilisateurNotif;
        $this->dateNotification = date('Y-m-d H:i:s');
        $this->isReadNotification = false;
        $this->dateReadNotification = null;
    }

    // Getters
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getIdUtilisateurNotif()
    {
        return $this->idUtilisateurNotif;
    }

    public function getDateNotification()
    {
        return $this->dateNotification;
    }

    public function getIsReadNotification()
    {
        return $this->isReadNotification;
    }

    public function getDateReadNotification()
    {
        return $this->dateReadNotification;
    }


    public function setIsReadNotification()
    {
        $this->isReadNotification = true;
        $this->dateReadNotification = date('Y-m-d H:i:s');
    }
}
