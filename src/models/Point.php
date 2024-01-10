<?php

namespace models;

require_once __DIR__ . '/Model.php';

class Point extends Model
{
    protected ?int $idPoint;
    protected ?string $nomVille;
    protected ?string $codePostalVille;
    protected ?float $latitude;
    protected ?float $longitude;

    public function __construct(
        ?string $nomVille,
        ?string $codePostalVille,
        ?float $latitude,
        ?float $longitude
    ) {
        $this->nomVille = $nomVille;
        $this->codePostalVille = $codePostalVille;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    // Getter method for idPoint
    public function getidPoint(): ?int
    {
        return $this->idPoint;
    }

    // Setter method for idPoint
    public function setidPoint($idPoint): void
    {
        $this->idPoint = $idPoint;
    }

    // Getter method for nomVille
    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    // Setter method for nomVille
    public function setNomVille($nomVille): void
    {
        $this->nomVille = $nomVille;
    }

    // Getter method for codePostalVille
    public function getCodePostalVille(): ?string
    {
        return $this->codePostalVille;
    }

    // Setter method for codePostalVille
    public function setCodePostalVille($codePostalVille): void
    {
        $this->codePostalVille = $codePostalVille;
    }

    // Getter method for latitude
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    // Setter method for latitude
    public function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    // Getter method for longitude
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    // Setter method for longitude
    public function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }
}
