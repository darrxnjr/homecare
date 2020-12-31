<?php


namespace App\Entity;


class SearchMed
{
    private $nom_med;


    public function getNomMed(): ?string
    {
        return $this->nom_med;
    }

    public function setNom(string $nom_med): self
    {
        $this->nom_med = $nom_med;

        return $this;
    }
}