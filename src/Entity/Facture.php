<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 50)]
    private ?string $crediteur = null;

    #[ORM\Column(length: 50)]
    private ?string $debiteur = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column(length: 255)]
    private ?string $detail = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    private ?Society $entreprise = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCrediteur(): ?string
    {
        return $this->crediteur;
    }

    public function setCrediteur(string $crediteur): self
    {
        $this->crediteur = $crediteur;

        return $this;
    }

    public function getDebiteur(): ?string
    {
        return $this->debiteur;
    }

    public function setDebiteur(string $debiteur): self
    {
        $this->debiteur = $debiteur;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function __construct()
    {
        $this->date = new \DateTime('now');
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
}
