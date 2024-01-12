<?php

namespace models;

use DateTime;

/**
 * Class Message
 *
 * @property int|null $idMessage
 * @property string|null $contenuMessage
 * @property DateTime|null $dateTimeMessage
 * @property int|null $idUtilisateur
 * @property int|null $idUtilisateurDestinataire
 * @property int|null $isReadMessage
 */
class Message extends Model
{
    protected static string $childTableName = 'Message';

    protected ?int $idMessage;
    protected ?string $contenuMessage;
    protected ?DateTime $dateTimeMessage;
    protected ?int $idUtilisateur;
    protected ?int $idUtilisateurDestinataire;
    protected ?int $isReadMessage;

    /**
     * Message constructor.
     *
     * @param int|null $idMessage
     * @param string|null $contenuMessage
     * @param DateTime|null $dateTimeMessage
     * @param int|null $idUtilisateur
     * @param int|null $idUtilisateurDestinataire
     * @param int|null $isReadMessage
     */
    public function __construct(
        ?int $idMessage = null,
        ?string $contenuMessage = null,
        ?DateTime $dateTimeMessage = null,
        ?int $idUtilisateur = null,
        ?int $idUtilisateurDestinataire = null,
        ?int $isReadMessage = null
    ) {
        $this->idMessage = $idMessage;
        $this->contenuMessage = $contenuMessage;
        $this->dateTimeMessage = $dateTimeMessage;
        $this->idUtilisateur = $idUtilisateur;
        $this->idUtilisateurDestinataire = $idUtilisateurDestinataire;
        $this->isReadMessage = $isReadMessage;
    }

    /**
     * @return int|null
     */
    public function getIdMessage(): ?int
    {
        return $this->idMessage;
    }

    /**
     * @param int|null $idMessage
     */
    public function setIdMessage(?int $idMessage): void
    {
        $this->idMessage = $idMessage;
    }

    /**
     * @return string|null
     */
    public function getContenuMessage(): ?string
    {
        return $this->contenuMessage;
    }

    /**
     * @param string|null $contenuMessage
     */
    public function setContenuMessage(?string $contenuMessage): void
    {
        $this->contenuMessage = $contenuMessage;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTimeMessage(): ?DateTime
    {
        return $this->dateTimeMessage;
    }

    /**
     * @param DateTime|null $dateTimeMessage
     */
    public function setDateTimeMessage(?DateTime $dateTimeMessage): void
    {
        $this->dateTimeMessage = $dateTimeMessage;
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
    public function getIdUtilisateurDestinataire(): ?int
    {
        return $this->idUtilisateurDestinataire;
    }

    /**
     * @param int|null $idUtilisateurDestinataire
     */
    public function setIdUtilisateurDestinataire(?int $idUtilisateurDestinataire): void
    {
        $this->idUtilisateurDestinataire = $idUtilisateurDestinataire;
    }

    /**
     * @return int|null
     */
    public function getIsReadMessage(): ?int
    {
        return $this->isReadMessage;
    }

    /**
     * @param int|null $isReadMessage
     */
    public function setIsReadMessage(?int $isReadMessage): void
    {
        $this->isReadMessage = $isReadMessage;
    }
}
