<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

// Sous ensemble DeletedAt (date de suppression en douceur) d'une classe utilisé en import
trait DeletedAtTrait
{
    // Attribu(s)
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $deletedAt = null;

    // Accesseur(s) et Mutateur(s)
    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeImmutable $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

}