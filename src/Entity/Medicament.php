<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicamentRepository::class)
 */
class Medicament
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
    private $nom_med;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fabricant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $indications;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contre_indic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $composants;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMed(): ?string
    {
        return $this->nom_med;
    }

    public function setNomMed(string $nom_med): self
    {
        $this->nom_med = $nom_med;

        return $this;
    }

    public function getFabricant(): ?string
    {
        return $this->fabricant;
    }

    public function setFabricant(string $fabricant): self
    {
        $this->fabricant = $fabricant;

        return $this;
    }

    public function getIndications(): ?string
    {
        return $this->indications;
    }

    public function setIndications(string $indications): self
    {
        $this->indications = $indications;

        return $this;
    }

    public function getContreIndic(): ?string
    {
        return $this->contre_indic;
    }

    public function setContreIndic(string $contre_indic): self
    {
        $this->contre_indic = $contre_indic;

        return $this;
    }

    public function getComposants(): ?string
    {
        return $this->composants;
    }

    public function setComposants(string $composants): self
    {
        $this->composants = $composants;

        return $this;
    }
}
