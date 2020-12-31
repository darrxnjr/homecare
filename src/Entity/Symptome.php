<?php

namespace App\Entity;

use App\Repository\SymptomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SymptomeRepository::class)
 */
class Symptome
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
    private $nom_symptome;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSymptome(): ?string
    {
        return $this->nom_symptome;
    }

    public function setNomSymptome(string $nom_symptome): self
    {
        $this->nom_symptome = $nom_symptome;

        return $this;
    }
}
