<?php

namespace App\Entity;

use App\Repository\TerrainRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TerrainRepository::class)]
class Terrain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelleTerrain = null;

    #[ORM\Column(length: 100)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $cp = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\ManyToOne(inversedBy: 'idTerrain')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entrainement $idEntrainement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTerrain(): ?string
    {
        return $this->libelleTerrain;
    }

    public function setLibelleTerrain(string $libelleTerrain): self
    {
        $this->libelleTerrain = $libelleTerrain;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getIdEntrainement(): ?Entrainement
    {
        return $this->idEntrainement;
    }

    public function setIdEntrainement(?Entrainement $idEntrainement): self
    {
        $this->idEntrainement = $idEntrainement;

        return $this;
    }
}
