<?php

namespace App\Entity;

use App\Repository\SocietyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocietyRepository::class)]
class Society
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $money = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $patron = null;

    #[ORM\Column]
    private ?bool $locked = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Facture::class)]
    private Collection $factures;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Citoyen::class)]
    private Collection $citoyens;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Stock::class)]
    private Collection $stocks;

    public function __construct()
    {
        $this->factures = new ArrayCollection();
        $this->citoyens = new ArrayCollection();
        $this->stocks = new ArrayCollection();
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

    public function getMoney(): ?int
    {
        return $this->money;
    }

    public function setMoney(int $money): self
    {
        $this->money = $money;

        return $this;
    }

    public function getPatron(): ?string
    {
        return $this->patron;
    }

    public function setPatron(?string $patron): self
    {
        $this->patron = $patron;

        return $this;
    }

    public function isLocked(): ?bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): self
    {
        $this->locked = $locked;

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

    /**
     * @return Collection<int, Facture>
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->factures->contains($facture)) {
            $this->factures->add($facture);
            $facture->setEntreprise($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->factures->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getEntreprise() === $this) {
                $facture->setEntreprise(null);
            }
        }

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
            $citoyen->setEntreprise($this);
        }

        return $this;
    }

    public function removeCitoyen(Citoyen $citoyen): self
    {
        if ($this->citoyens->removeElement($citoyen)) {
            // set the owning side to null (unless already changed)
            if ($citoyen->getEntreprise() === $this) {
                $citoyen->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Stock>
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks->add($stock);
            $stock->setEntreprise($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getEntreprise() === $this) {
                $stock->setEntreprise(null);
            }
        }

        return $this;
    }
}
