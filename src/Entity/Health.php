<?php

namespace App\Entity;

use App\Repository\HealthRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HealthRepository::class)]
class Health
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?string $taille = null;

    #[ORM\Column(nullable: true)]
    private ?string $poids = null;

    #[ORM\Column(length: 50)]
    private ?string $tabac = null;

    #[ORM\Column(length: 50)]
    private ?string $alcool = null;

    #[ORM\Column(length: 50)]
    private ?string $drogue = null;

    #[ORM\Column]
    private ?bool $allergie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_allergie = null;

    #[ORM\Column]
    private ?bool $diabete = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_diabete = null;

    #[ORM\Column]
    private ?bool $asthme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_asthme = null;

    #[ORM\Column]
    private ?bool $cardiaque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_cardiaque = null;

    #[ORM\Column]
    private ?bool $epilepsie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_epilepsie = null;

    #[ORM\Column]
    private ?bool $antecedent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_boolean = null;

    #[ORM\Column]
    private ?bool $traitement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_traitement = null;

    #[ORM\Column(length: 5)]
    private ?string $groupe_sanguin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_general = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $urg_nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $urg_prenom = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $urg_telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment_urg = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $post_it = null;

    #[ORM\OneToOne(inversedBy: 'health', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Citoyen $citoyen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(?string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTabac(): ?string
    {
        return $this->tabac;
    }

    public function setTabac(string $tabac): self
    {
        $this->tabac = $tabac;

        return $this;
    }

    public function getAlcool(): ?string
    {
        return $this->alcool;
    }

    public function setAlcool(string $alcool): self
    {
        $this->alcool = $alcool;

        return $this;
    }

    public function getDrogue(): ?string
    {
        return $this->drogue;
    }

    public function setDrogue(string $drogue): self
    {
        $this->drogue = $drogue;

        return $this;
    }

    public function isAllergie(): ?bool
    {
        return $this->allergie;
    }

    public function setAllergie(bool $allergie): self
    {
        $this->allergie = $allergie;

        return $this;
    }

    public function getCommentAllergie(): ?string
    {
        return $this->comment_allergie;
    }

    public function setCommentAllergie(?string $comment_allergie): self
    {
        $this->comment_allergie = $comment_allergie;

        return $this;
    }

    public function isDiabete(): ?bool
    {
        return $this->diabete;
    }

    public function setDiabete(bool $diabete): self
    {
        $this->diabete = $diabete;

        return $this;
    }

    public function getCommentDiabete(): ?string
    {
        return $this->comment_diabete;
    }

    public function setCommentDiabete(?string $comment_diabete): self
    {
        $this->comment_diabete = $comment_diabete;

        return $this;
    }

    public function isAsthme(): ?bool
    {
        return $this->asthme;
    }

    public function setAsthme(bool $asthme): self
    {
        $this->asthme = $asthme;

        return $this;
    }

    public function getCommentAsthme(): ?string
    {
        return $this->comment_asthme;
    }

    public function setCommentAsthme(?string $comment_asthme): self
    {
        $this->comment_asthme = $comment_asthme;

        return $this;
    }

    public function isCardiaque(): ?bool
    {
        return $this->cardiaque;
    }

    public function setCardiaque(bool $cardiaque): self
    {
        $this->cardiaque = $cardiaque;

        return $this;
    }

    public function getCommentCardiaque(): ?string
    {
        return $this->comment_cardiaque;
    }

    public function setCommentCardiaque(?string $comment_cardiaque): self
    {
        $this->comment_cardiaque = $comment_cardiaque;

        return $this;
    }

    public function isEpilepsie(): ?bool
    {
        return $this->epilepsie;
    }

    public function setEpilepsie(bool $epilepsie): self
    {
        $this->epilepsie = $epilepsie;

        return $this;
    }

    public function getCommentEpilepsie(): ?string
    {
        return $this->comment_epilepsie;
    }

    public function setCommentEpilepsie(?string $comment_epilepsie): self
    {
        $this->comment_epilepsie = $comment_epilepsie;

        return $this;
    }

    public function isAntecedent(): ?bool
    {
        return $this->antecedent;
    }

    public function setAntecedent(bool $antecedent): self
    {
        $this->antecedent = $antecedent;

        return $this;
    }

    public function getCommentBoolean(): ?string
    {
        return $this->comment_boolean;
    }

    public function setCommentBoolean(?string $comment_boolean): self
    {
        $this->comment_boolean = $comment_boolean;

        return $this;
    }

    public function isTraitement(): ?bool
    {
        return $this->traitement;
    }

    public function setTraitement(bool $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getCommentTraitement(): ?string
    {
        return $this->comment_traitement;
    }

    public function setCommentTraitement(?string $comment_traitement): self
    {
        $this->comment_traitement = $comment_traitement;

        return $this;
    }

    public function getGroupeSanguin(): ?string
    {
        return $this->groupe_sanguin;
    }

    public function setGroupeSanguin(string $groupe_sanguin): self
    {
        $this->groupe_sanguin = $groupe_sanguin;

        return $this;
    }

    public function getCommentGeneral(): ?string
    {
        return $this->comment_general;
    }

    public function setCommentGeneral(?string $comment_general): self
    {
        $this->comment_general = $comment_general;

        return $this;
    }

    public function getUrgNom(): ?string
    {
        return $this->urg_nom;
    }

    public function setUrgNom(?string $urg_nom): self
    {
        $this->urg_nom = $urg_nom;

        return $this;
    }

    public function getUrgPrenom(): ?string
    {
        return $this->urg_prenom;
    }

    public function setUrgPrenom(?string $urg_prenom): self
    {
        $this->urg_prenom = $urg_prenom;

        return $this;
    }

    public function getUrgTelephone(): ?string
    {
        return $this->urg_telephone;
    }

    public function setUrgTelephone(?string $urg_telephone): self
    {
        $this->urg_telephone = $urg_telephone;

        return $this;
    }

    public function getCommentUrg(): ?string
    {
        return $this->comment_urg;
    }

    public function setCommentUrg(?string $comment_urg): self
    {
        $this->comment_urg = $comment_urg;

        return $this;
    }

    public function getPostIt(): ?string
    {
        return $this->post_it;
    }

    public function setPostIt(?string $post_it): self
    {
        $this->post_it = $post_it;

        return $this;
    }

    public function getCitoyen(): ?Citoyen
    {
        return $this->citoyen;
    }

    public function setCitoyen(Citoyen $citoyen): self
    {
        $this->citoyen = $citoyen;

        return $this;
    }
}
