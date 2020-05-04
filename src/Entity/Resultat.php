<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultatRepository")
 */
class Resultat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $resultat1;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $resultat2;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $resultat_final;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="resultats")
     */
    private $competitions;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Participant")
     */
    private $participants;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie")
     */
    private $categories;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultat1(): ?\DateTimeInterface
    {
        return $this->resultat1;
    }

    public function setResultat1(?\DateTimeInterface $resultat1): self
    {
        $this->resultat1 = $resultat1;

        return $this;
    }

    public function getResultat2(): ?\DateTimeInterface
    {
        return $this->resultat2;
    }

    public function setResultat2(?\DateTimeInterface $resultat2): self
    {
        $this->resultat2 = $resultat2;

        return $this;
    }

    public function getResultatFinal(): ?\DateTimeInterface
    {
        return $this->resultat_final;
    }

    public function setResultatFinal(?\DateTimeInterface $resultat_final): self
    {
        $this->resultat_final = $resultat_final;

        return $this;
    }

    public function getCompetitions(): ?Competition
    {
        return $this->competitions;
    }

    public function setCompetitions(?Competition $competitions): self
    {
        $this->competitions = $competitions;

        return $this;
    }

    public function getParticipants(): ?Participant
    {
        return $this->participants;
    }

    public function setParticipants(?Participant $participants): self
    {
        $this->participants = $participants;

        return $this;
    }

    public function getCategories(): ?Categorie
    {
        return $this->categories;
    }

    public function setCategories(?Categorie $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}
