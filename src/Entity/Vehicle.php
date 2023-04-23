<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 10)]
    private ?string $service = null;

    #[ORM\Column(length: 10)]
    private ?string $plate = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $license = null;

    #[ORM\Column(nullable: true)]
    private ?int $unity = null;

    #[ORM\Column(nullable: true)]
    private ?int $upgrade = null;

    #[ORM\Column]
    private ?bool $available = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $file = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $local = null;

    #[ORM\OneToOne(mappedBy: 'vehicle', cascade: ['persist', 'remove'])]
    private ?Performance $performance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getPlate(): ?string
    {
        return $this->plate;
    }

    public function setPlate(string $plate): self
    {
        $this->plate = $plate;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLicense(): ?string
    {
        return $this->license;
    }

    public function setLicense(?string $license): self
    {
        $this->license = $license;

        return $this;
    }

    public function getUnity(): ?int
    {
        return $this->unity;
    }

    public function setUnity(?int $unity): self
    {
        $this->unity = $unity;

        return $this;
    }

    public function getUpgrade(): ?int
    {
        return $this->upgrade;
    }

    public function setUpgrade(?int $upgrade): self
    {
        $this->upgrade = $upgrade;

        return $this;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getLocal(): ?string
    {
        return $this->local;
    }

    public function setLocal(?string $local): self
    {
        $this->local = $local;

        return $this;
    }

    public function getStats(): ?Stats
    {
        return $this->stats;
    }

    public function setStats(Stats $stats): self
    {
        if($stats->getVehicle() !== $this){
            $stats->setVehicle($this);
        }

        $this->stats = $stats;

        return $this;
    }

    public function getPerformance(): ?Performance
    {
        return $this->performance;
    }

    public function setPerformance(?Performance $performance): self
    {
        // unset the owning side of the relation if necessary
        if ($performance === null && $this->performance !== null) {
            $this->performance->setVehicle(null);
        }

        // set the owning side of the relation if necessary
        if ($performance !== null && $performance->getVehicle() !== $this) {
            $performance->setVehicle($this);
        }

        $this->performance = $performance;

        return $this;
    }
}
