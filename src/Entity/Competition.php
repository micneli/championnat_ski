<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetitionRepository")
 */
class Competition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $ville_comp;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $date_comp;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultat", mappedBy="competition", orphanRemoval=true)
     */
    private $resultats;

    public function __construct()
    {
        $this->resultats = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleComp(): ?string
    {
        return $this->ville_comp;
    }

    public function setVilleComp(string $ville_comp): self
    {
        $this->ville_comp = $ville_comp;

        return $this;
    }

    public function getDateComp(): ?string
    {
        return $this->date_comp;
    }

    public function setDateComp(string $date_comp): self
    {
        $this->date_comp = $date_comp;

        return $this;
    }

    /**
     * @return Collection|Resultat[]
     */
    public function getResultats(): Collection
    {
        return $this->resultats;
    }

    public function addResultat(Resultat $resultat): self
    {
        if (!$this->resultats->contains($resultat)) {
            $this->resultats[] = $resultat;
            $resultat->setCompetition($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): self
    {
        if ($this->resultats->contains($resultat)) {
            $this->resultats->removeElement($resultat);
            // set the owning side to null (unless already changed)
            if ($resultat->getCompetition() === $this) {
                $resultat->setCompetition(null);
            }
        }

        return $this;
    }

   
}
