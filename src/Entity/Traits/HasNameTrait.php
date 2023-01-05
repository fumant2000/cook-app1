<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

trait HasNameTrait
{
    #[ORM\Column(length: 128)]
    #[Groups(['get', 'Recipe:item:get'])]
    private ?string $nom = null;

    #[ORM\Column(length: 128, unique: true)]
    #[Gedmo\Slug(fields: ['nom'], unique: true)]
    #[Groups(['get', 'Recipe:item:get'])]
    private ?string $slug = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
