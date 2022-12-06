<?php

namespace App\Entity;

use App\Repository\StaffPersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StaffPersonnelRepository::class)]
class StaffPersonnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 100)]
    private ?string $motPasse = null;

    #[ORM\ManyToMany(targetEntity: Entrainement::class, mappedBy: 'idStraffPersonnel')]
    private Collection $idEntrainement;

    public function __construct()
    {
        $this->idEntrainement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMotPasse(): ?string
    {
        return $this->motPasse;
    }

    public function setMotPasse(string $motPasse): self
    {
        $this->motPasse = $motPasse;

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
            $idEntrainement->addIdStraffPersonnel($this);
        }

        return $this;
    }

    public function removeIdEntrainement(Entrainement $idEntrainement): self
    {
        if ($this->idEntrainement->removeElement($idEntrainement)) {
            $idEntrainement->removeIdStraffPersonnel($this);
        }

        return $this;
    }
}
