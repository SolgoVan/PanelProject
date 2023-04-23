<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatsRepository::class)]
class Stats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'stats',cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicle $stats = null;

    #[ORM\Column(nullable: true)]
    private ?int $arumure = null;

    #[ORM\Column(nullable: true)]
    private ?int $frein = null;

    #[ORM\Column(nullable: true)]
    private ?int $moteur = null;

    #[ORM\Column(nullable: true)]
    private ?int $suspension = null;

    #[ORM\Column(nullable: true)]
    private ?int $transmission = null;

    #[ORM\Column(nullable: true)]
    private ?int $turbo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStats(): ?Vehicle
    {
        return $this->stats;
    }

    public function setStats(?Vehicle $stats): self
    {
        $this->stats = $stats;

        return $this;
    }

    public function getArumure(): ?int
    {
        return $this->arumure;
    }

    public function setArumure(?int $arumure): self
    {
        $this->arumure = $arumure;

        return $this;
    }

    public function getFrein(): ?int
    {
        return $this->frein;
    }

    public function setFrein(?int $frein): self
    {
        $this->frein = $frein;

        return $this;
    }

    public function getMoteur(): ?int
    {
        return $this->moteur;
    }

    public function setMoteur(?int $moteur): self
    {
        $this->moteur = $moteur;

        return $this;
    }

    public function getSuspension(): ?int
    {
        return $this->suspension;
    }

    public function setSuspension(?int $suspension): self
    {
        $this->suspension = $suspension;

        return $this;
    }

    public function getTransmission(): ?int
    {
        return $this->transmission;
    }

    public function setTransmission(?int $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getTurbo(): ?int
    {
        return $this->turbo;
    }

    public function setTurbo(?int $turbo): self
    {
        $this->turbo = $turbo;

        return $this;
    }

    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }
}
