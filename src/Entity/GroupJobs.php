<?php

namespace App\Entity;

use App\Repository\GroupJobsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupJobsRepository::class)]
class GroupJobs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $groupjobs = null;

    #[ORM\OneToMany(mappedBy: 'groupjobs', targetEntity: Citoyen::class)]
    private Collection $citoyens;

    public function __construct()
    {
        $this->citoyens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupjobs(): ?string
    {
        return $this->groupjobs;
    }

    public function setGroupjobs(string $groupjobs): self
    {
        $this->groupjobs = $groupjobs;

        return $this;
    }

    /**
     * @return Collection<int, Citoyen>
     */
    public function getCitoyens(): Collection
    {
        return $this->citoyens;
    }

    public function addCitoyen(Citoyen $citoyen): self
    {
        if (!$this->citoyens->contains($citoyen)) {
            $this->citoyens->add($citoyen);
            $citoyen->setGroupjobs($this);
        }

        return $this;
    }

    public function removeCitoyen(Citoyen $citoyen): self
    {
        if ($this->citoyens->removeElement($citoyen)) {
            // set the owning side to null (unless already changed)
            if ($citoyen->getGroupjobs() === $this) {
                $citoyen->setGroupjobs(null);
            }
        }

        return $this;
    }
}
