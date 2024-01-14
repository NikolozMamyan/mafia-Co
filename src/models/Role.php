<?php

namespace App\Models;

/**
 * Class Role
 *
 * @property int|null $idRole
 * @property string|null $labelRole
 */
class Role extends Model
{
    protected static string $childTableName = 'Role';

    protected ?int $idRole;
    protected ?string $labelRole;

    /**
     * Role constructor.
     *
     * @param int|null $idRole
     * @param string|null $labelRole
     */
    public function __construct(?int $idRole = null, ?string $labelRole = null)
    {
        $this->idRole = $idRole;
        $this->labelRole = $labelRole;
    }

    /**
     * @return int|null
     */
    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    /**
     * @param int|null $idRole
     */
    public function setIdRole(?int $idRole): void
    {
        $this->idRole = $idRole;
    }

    /**
     * @return string|null
     */
    public function getLabelRole(): ?string
    {
        return $this->labelRole;
    }

    /**
     * @param string|null $labelRole
     */
    public function setLabelRole(?string $labelRole): void
    {
        $this->labelRole = $labelRole;
    }

    

}
