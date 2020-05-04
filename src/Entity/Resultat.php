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
     * @ORM\Column(type="datetime")
     */
    private $resultat1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $resultat2;

    /**
     * @ORM\Column(type="datetime")
     */
    private $resultat_final;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\categorie", inversedBy="resultats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\participant", inversedBy="resultats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $participant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\competition", inversedBy="resultats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultat1(): ?\DateTimeInterface
    {
        return $this->resultat1;
    }

    public function setResultat1(\DateTimeInterface $resultat1): self
    {
        $this->resultat1 = $resultat1;

        return $this;
    }

    public function getResultat2(): ?\DateTimeInterface
    {
        return $this->resultat2;
    }

    public function setResultat2(\DateTimeInterface $resultat2): self
    {
        $this->resultat2 = $resultat2;

        return $this;
    }

    public function getResultat_final(): ?\DateTimeInterface
    {
        return $this->resultat_final;
    }

    public function setResultat_final(\DateTimeInterface $resultat_final): self
    {
        $this->resultat_final = $resultat_final;

        return $this;
    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getParticipant(): ?participant
    {
        return $this->participant;
    }

    public function setParticipant(?participant $participant): self
    {
        $this->participant = $participant;

        return $this;
    }

    public function getCompetition(): ?competition
    {
        return $this->competition;
    }

    public function setCompetition(?competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }
}
