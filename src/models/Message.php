<?php

namespace App\Models;

use DB;
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
    protected static string $childTableName = 'Messages';

    protected ?int $idMessage;
    protected ?string $contenuMessage;
    protected ?string $dateTimeMessage;
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
        ?string $dateTimeMessage = null,
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
    public function getDateTimeMessage(): ?string
    {
        return $this->dateTimeMessage;
    }

    /**
     * @param DateTime|null $dateTimeMessage
     */
    public function setDateTimeMessage(?string $dateTimeMessage): void
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

    /**
     * Méthode pour obtenir les derniers messages entre un utilisateur et ses contacts
     *
     * @param int $userId ID de l'utilisateur
     * @return array Liste des derniers messages
     */
    public function getLatestMessagesForUser(int $userId, int $limit = 10): array
    {
        $query = "SELECT * FROM Messages WHERE idUtilisateurDestinataire = :userId OR idUtilisateur = :userId ORDER BY dateTimeMessage DESC LIMIT :limit";

        $params = [
            ':userId' => $userId,
            ':limit' => $limit,
        ];

        $messages = DB::fetchAll($query, $params);

        // Convertir les dates de chaînes en objets DateTime
        foreach ($messages as &$message) {
            $message['dateTimeMessage'] = new DateTime($message['dateTimeMessage']);
        }

        return $messages;
    }
}
