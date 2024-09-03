<?php

namespace App\Entity\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// Sous ensemble UpdatedAt (date de mise à jour) d'une classe utilisé en import
trait UpdatedAtTrait
{
    /**
     * Attribu(s)  
     * */

    #[ORM\Column]
    private ?\DateTime$updatedAt = null;

    /**
     * Accesseur(s) et Mutateur(s) 
     * */

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Définit la date de mise à jour. Si aucune date n'est fournie, la date et l'heure actuelles sont utilisées par défaut.
     *
     * @param \DateTime|null $updatedAt La date et l'heure auxquelles l'entité a été mis à jour.
     * @return static
     */
    public function setUpdatedAt(\DateTime $updatedAt = null): static
    {
        // Si aucune date n'est fournie, utiliser la date et l'heure actuelles
        $this->updatedAt = $updatedAt ?? new \DateTime();

        return $this;
    }
}