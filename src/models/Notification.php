<?php

namespace models;

/**
 * Class Notification
 *
 * @property int|null $idUtilisateur
 * @property int|null $idUtilisateurNotif
 * @property string|null $dateNotification
 * @property int|null $isReadNotification
 */
class Notification extends Model
{
    protected static string $childTableName = 'Notification';

    protected ?int $idUtilisateur;
    protected ?int $idUtilisateurNotif;
    protected ?string $dateNotification;
    protected ?int $isReadNotification;

    /**
     * Notification constructor.
     *
     * @param int|null $idUtilisateur
     * @param int|null $idUtilisateurNotif
     * @param string|null $dateNotification
     * @param int|null $isReadNotification
     */
    public function __construct(
        ?int $idUtilisateur = null,
        ?int $idUtilisateurNotif = null,
        ?string $dateNotification = null,
        ?int $isReadNotification = null
    ) {
        $this->idUtilisateur = $idUtilisateur;
        $this->idUtilisateurNotif = $idUtilisateurNotif;
        $this->dateNotification = $dateNotification;
        $this->isReadNotification = $isReadNotification;
    }

    /**
     * @return int|null
     */
    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    /**
     * @param int|null $idUtilisateur
     */
    public function setIdUtilisateur(?int $idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @return int|null
     */
    public function getIdUtilisateurNotif(): ?int
    {
        return $this->idUtilisateurNotif;
    }

    /**
     * @param int|null $idUtilisateurNotif
     */
    public function setIdUtilisateurNotif(?int $idUtilisateurNotif): void
    {
        $this->idUtilisateurNotif = $idUtilisateurNotif;
    }

    /**
     * @return string|null
     */
    public function getDateNotification(): ?string
    {
        return $this->dateNotification;
    }

    /**
     * @param string|null $dateNotification
     */
    public function setDateNotification(?string $dateNotification): void
    {
        $this->dateNotification = $dateNotification;
    }

    /**
     * @return int|null
     */
    public function getIsReadNotification(): ?int
    {
        return $this->isReadNotification;
    }

    /**
     * @param int|null $isReadNotification
     */
    public function setIsReadNotification(?int $isReadNotification): void
    {
        $this->isReadNotification = $isReadNotification;
    }
}
