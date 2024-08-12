<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

// Sous ensemble UpdatedAt (date de mise à jour) d'une classe utilisé en import
trait UpdatedAtTrait
{
    // Attribu(s)
    #[ORM\Column]
    private ?\DateTimeImmutable $UpdatedAt = null;

    // Accesseur(s) et Mutateur(s)
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $UpdatedAt): static
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }
}