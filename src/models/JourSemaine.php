<?php

namespace models;

/**
 * Class JourSemaine
 *
 * @property int|null $idJourSemaine
 * @property string|null $labelJourSemaine
 * @property string|null $labelJourSemaineCourt
 */
class JourSemaine extends Model
{
    protected static string $childTableName = 'JourSemaine';

    protected ?int $idJourSemaine;
    protected ?string $labelJourSemaine;
    protected ?string $labelJourSemaineCourt;

    /**
     * JourSemaine constructor.
     *
     * @param int|null $idJourSemaine
     * @param string|null $labelJourSemaine
     * @param string|null $labelJourSemaineCourt
     */
    public function __construct(?int $idJourSemaine = null, ?string $labelJourSemaine = null, ?string $labelJourSemaineCourt = null)
    {
        $this->idJourSemaine = $idJourSemaine;
        $this->labelJourSemaine = $labelJourSemaine;
        $this->labelJourSemaineCourt = $labelJourSemaineCourt;
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

    /**
     * @return string|null
     */
    public function getLabelJourSemaine(): ?string
    {
        return $this->labelJourSemaine;
    }

    /**
     * @param string|null $labelJourSemaine
     */
    public function setLabelJourSemaine(?string $labelJourSemaine): void
    {
        $this->labelJourSemaine = $labelJourSemaine;
    }

    /**
     * @return string|null
     */
    public function getLabelJourSemaineCourt(): ?string
    {
        return $this->labelJourSemaineCourt;
    }

    /**
     * @param string|null $labelJourSemaineCourt
     */
    public function setLabelJourSemaineCourt(?string $labelJourSemaineCourt): void
    {
        $this->labelJourSemaineCourt = $labelJourSemaineCourt;
    }
}
