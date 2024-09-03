<?php

namespace App\Entity\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// Sous ensemble DeletedAt (date de suppression en douceur) d'une classe utilisé en import
trait DeletedAtTrait
{
    /**
     * Attribu(s)  
     * */

    #[ORM\Column(nullable: true)]
    private ?\DateTime $deletedAt = null;

    /**
     * Accesseur(s) et Mutateur(s) 
     * */

    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    /**
     * Définit la date de suppression. Si aucune date n'est fournie, la date et l'heure actuelles sont utilisées par défaut.
     *
     * @param \DateTime|null $deletedAt La date et l'heure auxquelles l'entité a été supprimée.
     * @return static
     */
    public function setDeletedAt(?\DateTime $deletedAt = null): static
    {
        // Si aucune date n'est fournie, utiliser la date et l'heure actuelles
        $this->deletedAt = $deletedAt ?? new \DateTime();

        return $this;
    }

}