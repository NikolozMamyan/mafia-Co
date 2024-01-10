<?php

namespace models;

require_once __DIR__ . '/Model.php';

use DateTime; // Import DateTime class for handling date/time
use DB; // Assuming there's a DB class for database operations

class User extends Model
{
    // Database table name
    const TABLE_NAME = 'Utilisateurs';
    // Date format for created_at field
    const CREATED_AT_FORMAT = 'Y-m-d H:i:s';

    // Properties corresponding to database columns
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

    // Array to track changed fields for updates
    protected array $changedFields = [];

    // Constructor for creating User objects
    public function __construct(
        ?string $nomUtilisateur,
        ?string $prenomUtilisateur,
        ?string $adresseUtilisateur,
        ?string $telUtilisateur,
        ?string $emailUtilisateur,
        ?string $motDePasseUtilisateur,
        ?string $photoUtilisateur,
        ?int $compteActif,
        ?int $idRole,
        ?int $idPoint,
        string|DateTime|null $dateInscriptionUtilisateur = null,
        string|DateTime|null $derniereModificationUtilisateur = null,
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



    // Getter method for idUtilisateur
    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    // Getter method for nomUtilisateur
    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    // Setter method for nomUtilisateur
    public function setNomUtilisateur(?string $nomUtilisateur): void
    {
        $this->setFields('nomUtilisateur', $nomUtilisateur);
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur(?string $prenomUtilisateur): void
    {
        $this->setFields('prenomUtilisateur', $prenomUtilisateur);
    }

    public function getAdresseUtilisateur(): ?string
    {
        return $this->adresseUtilisateur;
    }

    public function setAdresseUtilisateur(?string $adresseUtilisateur): void
    {
        $this->setFields('adresseUtilisateur', $adresseUtilisateur);
    }

    public function getTelUtilisateur(): ?string
    {
        return $this->telUtilisateur;
    }

    public function setTelUtilisateur(?string $telUtilisateur): void
    {
        $this->setFields('telUtilisateur', $telUtilisateur);
    }

    public function getEmailUtilisateur(): ?string
    {
        return $this->emailUtilisateur;
    }

    public function setEmailUtilisateur(?string $emailUtilisateur): void
    {
        $this->setFields('emailUtilisateur', $emailUtilisateur);
    }

    public function getMotDePasseUtilisateur(): ?string
    {
        return $this->motDePasseUtilisateur;
    }

    public function setMotDePasseUtilisateur(?string $motDePasseUtilisateur): void
    {
        $this->setFields('motDePasseUtilisateur', $motDePasseUtilisateur);
    }

    public function getPhotoUtilisateur(): ?string
    {
        return $this->photoUtilisateur;
    }

    public function setPhotoUtilisateur(?string $photoUtilisateur): void
    {
        $this->setFields('photoUtilisateur', $photoUtilisateur);
    }

    public function getCompteActif(): ?int
    {
        return $this->compteActif;
    }

    public function isCompteActif(): bool
    {
        return $this->getCompteActif() == 1;
    }

    public function setCompteActif(?int $compteActif): void
    {
        $this->setFields('compteActif', $compteActif);
    }

    public function getDateInscriptionUtilisateur(): ?string
    {
        return $this->dateInscriptionUtilisateur;
    }

    public function getDerniereModificationUtilisateur(): ?string
    {
        return $this->derniereModificationUtilisateur;
    }

    public function getIdItineraire(): ?int
    {
        return $this->idItineraire;
    }

    public function setIdItineraire(?int $idItineraire): void
    {
        $this->setFields('idItineraire', $idItineraire);
    }

    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    public function setIdRole(?int $idRole): void
    {
        $this->setFields('idRole', $idRole);
    }

    public function getIdPoint(): ?int
    {
        return $this->idPoint;
    }

    public function setIdPoint(?int $idPoint): void
    {
        $this->setFields('idPoint', $idPoint);
    }

    // Méthode pour obtenir les données de l'utilisateur sous forme de tableau
    // Method to convert object data to an associative array
    public function toArray()
    {
        return [
            'nomUtilisateur' => $this->nomUtilisateur,
            'prenomUtilisateur' => $this->prenomUtilisateur,
            'adresseUtilisateur' => $this->adresseUtilisateur,
            'telUtilisateur' => $this->telUtilisateur,
            'emailUtilisateur' => $this->emailUtilisateur,
            'motDePasseUtilisateur' => $this->motDePasseUtilisateur,
            'photoUtilisateur' => $this->photoUtilisateur,
            'compteActif' => $this->compteActif,
            'idRole' => $this->idRole,
            'idPoint' => $this->idPoint,
            'dateInscriptionUtilisateur' => $this->dateInscriptionUtilisateur,
            'derniereModificationUtilisateur' => $this->derniereModificationUtilisateur,
            'idItineraire' => $this->idItineraire,
        ];
    }

    // Method to save or update the user data in the database
    public function save($forced = false): int|false
    {
        if ($this->idUtilisateur ?? null) {
            // Update
            if ($forced) {
                return DB::update(self::TABLE_NAME, $this->toArray(), $this->idUtilisateur);
            } elseif ($this->changedFields) {
                $toArray = $this->toArray();
                $updates = [];
                foreach ($this->changedFields as $key) {
                    if (array_key_exists($key, $toArray)) {
                        $updates[$key] = $toArray[$key];
                    }
                }

                return DB::update(self::TABLE_NAME, $updates, $this->idUtilisateur);
            }
        } else {
            // Insert
            return DB::insert(self::TABLE_NAME, $this->toArray());
        }

        return 0;
    }

    // Method to delete the user data from the database
    public function delete(): int|false
    {
        return self::staticDelete($this->idUtilisateur);
    }

    // Static method to delete a user by ID from the database
    public static function staticDelete(int $id): int|false
    {
        return DB::statement(
            "DELETE FROM Utilisateurs WHERE idUtilisateur = :id",
            ['id' => $id],
        );
    }

    // Protected method to track changed fields
    protected function setFields($name, $value)
    {
        if (property_exists($this, $name) and isset($this->$name) and $this->$name != $value) {
            $this->changedFields[] = $name;
        }

        $this->$name = $value;
    }

    // Protected method to prepare the created_at field
    protected function prepareCreatedAt(string|DateTime|null $created_at): string
    {
        if (!$created_at) {
            $created_at = date(self::CREATED_AT_FORMAT);
        } elseif ($created_at instanceof DateTime) {
            $created_at = $created_at->format(self::CREATED_AT_FORMAT);
        }

        return $created_at;
    }
}
