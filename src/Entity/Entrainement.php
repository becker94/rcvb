<?php

namespace App\Entity;

use App\Repository\EntrainementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrainementRepository::class)]
class Entrainement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $jour = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\Column(length: 100)]
    private ?string $terrain = null;

    #[ORM\OneToMany(mappedBy: 'idEntrainement', targetEntity: Terrain::class)]
    private Collection $idTerrain;

    #[ORM\ManyToMany(targetEntity: StaffPersonnel::class, inversedBy: 'idEntrainement')]
    private Collection $idStraffPersonnel;

    #[ORM\ManyToOne(inversedBy: 'idEntrainement')]
    private ?Categorie $idCategorie = null;

    public function __construct()
    {
        $this->idTerrain = new ArrayCollection();
        $this->idStraffPersonnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getTerrain(): ?string
    {
        return $this->terrain;
    }

    public function setTerrain(string $terrain): self
    {
        $this->terrain = $terrain;

        return $this;
    }

    /**
     * @return Collection<int, Terrain>
     */
    public function getIdTerrain(): Collection
    {
        return $this->idTerrain;
    }

    public function addIdTerrain(Terrain $idTerrain): self
    {
        if (!$this->idTerrain->contains($idTerrain)) {
            $this->idTerrain->add($idTerrain);
            $idTerrain->setIdEntrainement($this);
        }

        return $this;
    }

    public function removeIdTerrain(Terrain $idTerrain): self
    {
        if ($this->idTerrain->removeElement($idTerrain)) {
            // set the owning side to null (unless already changed)
            if ($idTerrain->getIdEntrainement() === $this) {
                $idTerrain->setIdEntrainement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StaffPersonnel>
     */
    public function getIdStraffPersonnel(): Collection
    {
        return $this->idStraffPersonnel;
    }

    public function addIdStraffPersonnel(StaffPersonnel $idStraffPersonnel): self
    {
        if (!$this->idStraffPersonnel->contains($idStraffPersonnel)) {
            $this->idStraffPersonnel->add($idStraffPersonnel);
        }

        return $this;
    }

    public function removeIdStraffPersonnel(StaffPersonnel $idStraffPersonnel): self
    {
        $this->idStraffPersonnel->removeElement($idStraffPersonnel);

        return $this;
    }

    public function getIdCategorie(): ?Categorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?Categorie $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }
}
