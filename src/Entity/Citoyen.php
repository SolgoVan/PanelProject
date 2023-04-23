<?php

namespace App\Entity;

use App\Repository\CitoyenRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitoyenRepository::class)]
class Citoyen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE )]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 100)]
    private ?string $profession = null;

    #[ORM\Column]
    private ?bool $criminal = false;

    #[ORM\ManyToOne(inversedBy: 'citoyens')]
    private ?GroupJobs $groupjobs = null;

    #[ORM\OneToOne(mappedBy: 'citoyen', cascade: ['persist', 'remove'])]
    private ?Health $health = null;

    #[ORM\ManyToOne(inversedBy: 'citoyens')]
    private ?Society $entreprise = null;

    #[ORM\OneToOne(mappedBy: 'citoyen', cascade: ['persist', 'remove'])]
    private ?Permis $permis = null;

    #[ORM\OneToOne(mappedBy: 'citoyen', cascade: ['persist', 'remove'])]
    private ?PPA $pPA = null;



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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAge()
    {
        $dateDiff = $this->date_naissance->diff(new \DateTime());
        return $dateDiff->y;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function isCriminal(): ?bool
    {
        return $this->criminal;
    }

    public function setCriminal(bool $criminal): self
    {
        $this->criminal = $criminal;

        return $this;
    }

    public function getGroupjobs(): ?GroupJobs
    {
        return $this->groupjobs;
    }

    public function setGroupjobs(?GroupJobs $groupjobs): self
    {
        $this->groupjobs = $groupjobs;

        return $this;
    }

    public function getHealth(): ?Health
    {
        return $this->health;
    }

    public function setHealth(Health $health): self
    {
        // set the owning side of the relation if necessary
        if ($health->getCitoyen() !== $this) {
            $health->setCitoyen($this);
        }

        $this->health = $health;

        return $this;
    }

    public function getEntreprise(): ?Society
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Society $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getPermis(): ?Permis
    {
        return $this->permis;
    }

    public function setPermis(?Permis $permis): self
    {
        // unset the owning side of the relation if necessary
        if ($permis === null && $this->permis !== null) {
            $this->permis->setCitoyen(null);
        }

        // set the owning side of the relation if necessary
        if ($permis !== null && $permis->getCitoyen() !== $this) {
            $permis->setCitoyen($this);
        }

        $this->permis = $permis;

        return $this;
    }

    public function getPPA(): ?PPA
    {
        return $this->pPA;
    }

    public function setPPA(?PPA $pPA): self
    {
        // unset the owning side of the relation if necessary
        if ($pPA === null && $this->pPA !== null) {
            $this->pPA->setCitoyen(null);
        }

        // set the owning side of the relation if necessary
        if ($pPA !== null && $pPA->getCitoyen() !== $this) {
            $pPA->setCitoyen($this);
        }

        $this->pPA = $pPA;

        return $this;
    }


}
