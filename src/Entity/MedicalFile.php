<?php

namespace App\Entity;

use App\Repository\MedicalFileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicalFileRepository::class)]
class MedicalFile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $motif = null;

    #[ORM\Column(length: 255)]
    private ?string $examen = null;

    #[ORM\Column(length: 255)]
    private ?string $soin = null;

    #[ORM\Column(length: 255)]
    private ?string $doc = null;

    #[ORM\Column(length: 255)]
    private ?string $annexe = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column]
    private ?bool $facture = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getExamen(): ?string
    {
        return $this->examen;
    }

    public function setExamen(string $examen): self
    {
        $this->examen = $examen;

        return $this;
    }

    public function getSoin(): ?string
    {
        return $this->soin;
    }

    public function setSoin(string $soin): self
    {
        $this->soin = $soin;

        return $this;
    }

    public function getDoc(): ?string
    {
        return $this->doc;
    }

    public function setDoc(string $doc): self
    {
        $this->doc = $doc;

        return $this;
    }

    public function getAnnexe(): ?string
    {
        return $this->annexe;
    }

    public function setAnnexe(string $annexe): self
    {
        $this->annexe = $annexe;

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

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function isFacture(): ?bool
    {
        return $this->facture;
    }

    public function setFacture(bool $facture): self
    {
        $this->facture = $facture;

        return $this;
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

    public function __construct()
    {
        $this->date = new \DateTime('now');
    }
}
