<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StartUpRepository")
 */
class StartUp
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomDirigeant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fondationDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $siretNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $workerNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $intellectualProperty;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getNomDirigeant(): ?string
    {
        return $this->nomDirigeant;
    }

    public function setNomDirigeant(string $nomDirigeant): self
    {
        $this->nomDirigeant = $nomDirigeant;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getFondationDate(): ?\DateTimeInterface
    {
        return $this->fondationDate;
    }

    public function setFondationDate(?\DateTimeInterface $fondationDate): self
    {
        $this->fondationDate = $fondationDate;

        return $this;
    }

    public function getSiretNumber(): ?int
    {
        return $this->siretNumber;
    }

    public function setSiretNumber(int $siretNumber): self
    {
        $this->siretNumber = $siretNumber;

        return $this;
    }

    public function getWorkerNumber(): ?int
    {
        return $this->workerNumber;
    }

    public function setWorkerNumber(int $workerNumber): self
    {
        $this->workerNumber = $workerNumber;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getIntellectualProperty(): ?string
    {
        return $this->intellectualProperty;
    }

    public function setIntellectualProperty(?string $intellectualProperty): self
    {
        $this->intellectualProperty = $intellectualProperty;

        return $this;
    }
}
