<?php

namespace App\Models;

/**
 * Class ItineraireJourSemaine
 *
 * @property int|null $idItineraire
 * @property int|null $idJourSemaine
 */
class ItineraireJourSemaine extends Model
{
    protected static string $childTableName = 'ItineraireJourSemaine';

    protected ?int $idItineraire;
    protected ?int $idJourSemaine;

    /**
     * ItineraireJourSemaine constructor.
     *
     * @param int|null $idItineraire
     * @param int|null $idJourSemaine
     */
    public function __construct(?int $idItineraire = null, ?int $idJourSemaine = null)
    {
        $this->idItineraire = $idItineraire;
        $this->idJourSemaine = $idJourSemaine;
    }

    /**
     * @return int|null
     */
    public function getIdItineraire(): ?int
    {
        return $this->idItineraire;
    }

    /**
     * @param int|null $idItineraire
     */
    public function setIdItineraire(?int $idItineraire): void
    {
        $this->idItineraire = $idItineraire;
    }

    /**
     * @return int|null
     */
    public function getIdJourSemaine(): ?int
    {
        return $this->idJourSemaine;
    }

    /**
     * @param int|null $idJourSemaine
     */
    public function setIdJourSemaine(?int $idJourSemaine): void
    {
        $this->idJourSemaine = $idJourSemaine;
    }
}
