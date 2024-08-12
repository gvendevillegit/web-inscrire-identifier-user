<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

// Sous ensemble DeletedAt (date de suppression en douceur) d'une classe utilisé en import
trait DeletedAtTrait
{
    // Attribu(s)
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $DeletedAt = null;

    // Accesseur(s) et Mutateur(s)
    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->DeletedAt;
    }

    public function setDeletedAt(?\DateTimeImmutable $DeletedAt): static
    {
        $this->DeletedAt = $DeletedAt;

        return $this;
    }

}