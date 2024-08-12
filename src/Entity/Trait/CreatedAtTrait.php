<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

// Sous ensemble CreatedAt (date de création) d'une classe utilisé en import
trait CreatedAtTrait
{
    // Attribu(s)
    #[ORM\Column]
    private ?\DateTimeImmutable $CreatedAt = null;

    // Accesseur(s) et Mutateur(s)
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): static
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }
}