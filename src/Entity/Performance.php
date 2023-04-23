<?php

namespace App\Entity;

use App\Repository\PerformanceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PerformanceRepository::class)]
class Performance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $armure = null;

    #[ORM\Column]
    private ?int $frein = null;

    #[ORM\Column]
    private ?int $moteur = null;

    #[ORM\Column]
    private ?int $suspension = null;

    #[ORM\Column]
    private ?int $transmission = null;

    #[ORM\Column]
    private ?int $turbo = null;

    #[ORM\OneToOne(inversedBy: 'performance', cascade: ['persist', 'remove'])]
    private ?Vehicle $vehicle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArmure(): ?int
    {
        return $this->armure;
    }

    public function setArmure(int $armure): self
    {
        $this->armure = $armure;

        return $this;
    }

    public function getFrein(): ?int
    {
        return $this->frein;
    }

    public function setFrein(int $frein): self
    {
        $this->frein = $frein;

        return $this;
    }

    public function getMoteur(): ?int
    {
        return $this->moteur;
    }

    public function setMoteur(int $moteur): self
    {
        $this->moteur = $moteur;

        return $this;
    }

    public function getSuspension(): ?int
    {
        return $this->suspension;
    }

    public function setSuspension(int $suspension): self
    {
        $this->suspension = $suspension;

        return $this;
    }

    public function getTransmission(): ?int
    {
        return $this->transmission;
    }

    public function setTransmission(int $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getTurbo(): ?int
    {
        return $this->turbo;
    }

    public function setTurbo(int $turbo): self
    {
        $this->turbo = $turbo;

        return $this;
    }

    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(?Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }
}
