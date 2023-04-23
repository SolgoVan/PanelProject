<?php

namespace App\Entity;

use App\Repository\PermisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PermisRepository::class)]
class Permis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $A = null;

    #[ORM\Column(nullable: true)]
    private ?bool $B = null;

    #[ORM\Column(nullable: true)]
    private ?bool $C = null;

    #[ORM\Column(nullable: true)]
    private ?bool $H = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Z = null;

    #[ORM\OneToOne(inversedBy: 'permis', cascade: ['persist', 'remove'])]
    private ?Citoyen $citoyen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isA(): ?bool
    {
        return $this->A;
    }

    public function setA(?bool $A): self
    {
        $this->A = $A;

        return $this;
    }

    public function isB(): ?bool
    {
        return $this->B;
    }

    public function setB(?bool $B): self
    {
        $this->B = $B;

        return $this;
    }

    public function isC(): ?bool
    {
        return $this->C;
    }

    public function setC(?bool $C): self
    {
        $this->C = $C;

        return $this;
    }

    public function isH(): ?bool
    {
        return $this->H;
    }

    public function setH(?bool $H): self
    {
        $this->H = $H;

        return $this;
    }

    public function isZ(): ?bool
    {
        return $this->Z;
    }

    public function setZ(?bool $Z): self
    {
        $this->Z = $Z;

        return $this;
    }

    public function getCitoyen(): ?Citoyen
    {
        return $this->citoyen;
    }

    public function setCitoyen(?Citoyen $citoyen): self
    {
        $this->citoyen = $citoyen;

        return $this;
    }
}
