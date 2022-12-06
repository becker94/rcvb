<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(length: 50)]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    private ?string $ageMini = null;

    #[ORM\Column]
    private ?int $ageMax = null;

    #[ORM\OneToMany(mappedBy: 'idCategorie', targetEntity: Entrainement::class)]
    private Collection $idEntrainement;

    #[ORM\ManyToMany(targetEntity: Adherent::class, inversedBy: 'idCategorie')]
    private Collection $idCategorie;

    #[ORM\ManyToOne(inversedBy: 'idCategorie')]
    private ?Pole $idPole = null;

    #[ORM\OneToMany(mappedBy: 'idCategorieAdherent', targetEntity: CategorieAdherent::class)]
    private Collection $idCategorieAdherent;

    public function __construct()
    {
        $this->idEntrainement = new ArrayCollection();
        $this->idCategorie = new ArrayCollection();
        $this->idCategorieAdherent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAgeMini(): ?string
    {
        return $this->ageMini;
    }

    public function setAgeMini(string $ageMini): self
    {
        $this->ageMini = $ageMini;

        return $this;
    }

    public function getAgeMax(): ?int
    {
        return $this->ageMax;
    }

    public function setAgeMax(int $ageMax): self
    {
        $this->ageMax = $ageMax;

        return $this;
    }

    /**
     * @return Collection<int, Entrainement>
     */
    public function getIdEntrainement(): Collection
    {
        return $this->idEntrainement;
    }

    public function addIdEntrainement(Entrainement $idEntrainement): self
    {
        if (!$this->idEntrainement->contains($idEntrainement)) {
            $this->idEntrainement->add($idEntrainement);
            $idEntrainement->setIdCategorie($this);
        }

        return $this;
    }

    public function removeIdEntrainement(Entrainement $idEntrainement): self
    {
        if ($this->idEntrainement->removeElement($idEntrainement)) {
            // set the owning side to null (unless already changed)
            if ($idEntrainement->getIdCategorie() === $this) {
                $idEntrainement->setIdCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Adherent>
     */
    public function getIdCategorie(): Collection
    {
        return $this->idCategorie;
    }

    public function addIdCategorie(Adherent $idCategorie): self
    {
        if (!$this->idCategorie->contains($idCategorie)) {
            $this->idCategorie->add($idCategorie);
        }

        return $this;
    }

    public function removeIdCategorie(Adherent $idCategorie): self
    {
        $this->idCategorie->removeElement($idCategorie);

        return $this;
    }

    public function getIdPole(): ?Pole
    {
        return $this->idPole;
    }

    public function setIdPole(?Pole $idPole): self
    {
        $this->idPole = $idPole;

        return $this;
    }

    /**
     * @return Collection<int, CategorieAdherent>
     */
    public function getIdCategorieAdherent(): Collection
    {
        return $this->idCategorieAdherent;
    }

    public function addIdCategorieAdherent(CategorieAdherent $idCategorieAdherent): self
    {
        if (!$this->idCategorieAdherent->contains($idCategorieAdherent)) {
            $this->idCategorieAdherent->add($idCategorieAdherent);
            $idCategorieAdherent->setIdCategorieAdherent($this);
        }

        return $this;
    }

    public function removeIdCategorieAdherent(CategorieAdherent $idCategorieAdherent): self
    {
        if ($this->idCategorieAdherent->removeElement($idCategorieAdherent)) {
            // set the owning side to null (unless already changed)
            if ($idCategorieAdherent->getIdCategorieAdherent() === $this) {
                $idCategorieAdherent->setIdCategorieAdherent(null);
            }
        }

        return $this;
    }
}
