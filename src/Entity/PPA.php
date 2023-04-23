<?php

namespace App\Entity;

use App\Repository\PPARepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PPARepository::class)]
class PPA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $exam_ems = null;

    #[ORM\Column]
    private ?bool $exam_lspd = null;

    #[ORM\Column]
    private ?bool $ppa = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\OneToOne(inversedBy: 'pPA', cascade: ['persist', 'remove'])]
    private ?Citoyen $citoyen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isExamEms(): ?bool
    {
        return $this->exam_ems;
    }

    public function setExamEms(bool $exam_ems): self
    {
        $this->exam_ems = $exam_ems;

        return $this;
    }

    public function isExamLspd(): ?bool
    {
        return $this->exam_lspd;
    }

    public function setExamLspd(bool $exam_lspd): self
    {
        $this->exam_lspd = $exam_lspd;

        return $this;
    }

    public function isPpa(): ?bool
    {
        return $this->ppa;
    }

    public function setPpa(bool $ppa): self
    {
        $this->ppa = $ppa;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
