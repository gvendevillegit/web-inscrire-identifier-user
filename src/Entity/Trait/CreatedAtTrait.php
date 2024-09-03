<?php

namespace App\Entity\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// Sous ensemble CreatedAt (date de création) d'une classe utilisé en import
trait CreatedAtTrait
{
    /**
     * Attribu(s)  
     * */

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * Accesseur(s) et Mutateur(s) 
     * */

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Définit la date de création. Si aucune date n'est fournie, la date et l'heure actuelles sont utilisées par défaut.
     *
     * @param \DateTime|null $createdAt La date et l'heure auxquelles l'entité a été créé.
     * @return static
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        // Si aucune date n'est fournie, utiliser la date et l'heure actuelles
        $this->createdAt = $createdAt ?? new \DateTimeImmutable();

        return $this;
    }
}