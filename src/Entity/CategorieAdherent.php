<?php

namespace App\Entity;

use App\Repository\CategorieAdherentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieAdherentRepository::class)]
class CategorieAdherent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\ManyToOne(inversedBy: 'idCategorieAdherent')]
    private ?Categorie $idCategorieAdherent = null;

    #[ORM\ManyToOne(inversedBy: 'idAdherent')]
    private ?Adherent $idAdherent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getIdCategorieAdherent(): ?Categorie
    {
        return $this->idCategorieAdherent;
    }

    public function setIdCategorieAdherent(?Categorie $idCategorieAdherent): self
    {
        $this->idCategorieAdherent = $idCategorieAdherent;

        return $this;
    }

    public function getIdAdherent(): ?Adherent
    {
        return $this->idAdherent;
    }

    public function setIdAdherent(?Adherent $idAdherent): self
    {
        $this->idAdherent = $idAdherent;

        return $this;
    }
}
