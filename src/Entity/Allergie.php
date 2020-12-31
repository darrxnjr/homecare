<?php

namespace App\Entity;

use App\Repository\AllergieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AllergieRepository::class)
 */
class Allergie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomAllergie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAllergie(): ?string
    {
        return $this->nomAllergie;
    }

    public function setNomAllergie(string $nomAllergie): self
    {
        $this->nomAllergie = $nomAllergie;

        return $this;
    }
}
