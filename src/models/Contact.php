<?php

namespace models;

/**
 * Class Contact
 *
 * @property int|null $idUtilisateur
 * @property int|null $idContacte
 */
class Contact extends Model
{
    protected static string $childTableName = 'Contact';

    protected ?int $idUtilisateur;
    protected ?int $idContacte;

    /**
     * Contact constructor.
     *
     * @param int|null $idUtilisateur
     * @param int|null $idContacte
     */
    public function __construct(?int $idUtilisateur = null, ?int $idContacte = null)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->idContacte = $idContacte;
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
    public function getIdContacte(): ?int
    {
        return $this->idContacte;
    }

    /**
     * @param int|null $idContacte
     */
    public function setIdContacte(?int $idContacte): void
    {
        $this->idContacte = $idContacte;
    }  
}