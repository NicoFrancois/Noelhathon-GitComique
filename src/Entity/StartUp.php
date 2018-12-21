<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phoneNumber;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Service", inversedBy="startUps")
     */
    private $service;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Satisfaction", mappedBy="society")
     */
    private $satisfactions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="society")
     */
    private $participants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InternalPartner", mappedBy="startup")
     */
    private $internalPartners;

    /**

     * @ORM\ManyToMany(targetEntity="App\Entity\Event", inversedBy="startUps")
     */
    private $event;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\InternalPartner", inversedBy="startUps")
     */
    private $internatinalParner;

//      * @ORM\ManyToMany(targetEntity="App\Entity\EditionEvent", mappedBy="startup")
//      */
//     private $editionEvents;


    public function __construct()
    {
        $this->service = new ArrayCollection();
        $this->satisfactions = new ArrayCollection();
        $this->participants = new ArrayCollection();
        $this->internalPartners = new ArrayCollection();

        $this->event = new ArrayCollection();
        $this->internatinalParner = new ArrayCollection();

//         $this->editionEvents = new ArrayCollection();

    }

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addServouse(Service $service): self
    {
        if (!$this->service->contains($service)) {
            $this->service[] = $service;
        }

        return $this;
    }

    public function removeServouse(Service $service): self
    {
        if ($this->service->contains($service)) {
            $this->service->removeElement($service);
        }

        return $this;
    }

    /*
     * @param mixed $service
     */
    public function setService($service): void
    {
        $this->service[] = $service;
    }

    public function removeSatisfaction(Satisfaction $satisfaction): self
    {
        if ($this->satisfactions->contains($satisfaction)) {
            $this->satisfactions->removeElement($satisfaction);
            // set the owning side to null (unless already changed)
            if ($satisfaction->getSociety() === $this) {
                $satisfaction->setSociety(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(Participant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->setSociety($this);
        }

        return $this;
    }

    public function removeParticipant(Participant $participant): self
    {
        if ($this->participants->contains($participant)) {
            $this->participants->removeElement($participant);
            // set the owning side to null (unless already changed)
            if ($participant->getSociety() === $this) {
                $participant->setSociety(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InternalPartner[]
     */
    public function getInternalPartners(): Collection
    {
        return $this->internalPartners;
    }

    public function addInternalPartner(InternalPartner $internalPartner): self
    {
        if (!$this->internalPartners->contains($internalPartner)) {
            $this->internalPartners[] = $internalPartner;
            $internalPartner->setStartup($this);
        }

        return $this;
    }

    public function removeInternalPartner(InternalPartner $internalPartner): self
    {
        if ($this->internalPartners->contains($internalPartner)) {
            $this->internalPartners->removeElement($internalPartner);
            // set the owning side to null (unless already changed)
            if ($internalPartner->getStartup() === $this) {
                $internalPartner->setStartup(null);
            }
        }

        return $this;
    }

    /**
// <<<<<<< eventStartUp
     * @return Collection|Event[]
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->event->contains($event)) {
            $this->event[] = $event;
    }
    public function removeEvent(Event $event): self
    {
        if ($this->event->contains($event)) {
            $this->event->removeElement($event);
        }

        return $this;
    }

public function addService(Service $service): self
{
    if (!$this->service->contains($service)) {
        $this->service[] = $service;
    }

    return $this;
}

public function removeService(Service $service): self
{
    if ($this->service->contains($service)) {
        $this->service->removeElement($service);
    }
}
      
      /**
 * @return Collection|InternalPartner[]
 */
public function getInternatinalParner(): Collection
{
    return $this->internatinalParner;
}

public function addInternatinalParner(InternalPartner $internatinalParner): self
{
    if (!$this->internatinalParner->contains($internatinalParner)) {
        $this->internatinalParner[] = $internatinalParner;
    }

    return $this;
}

/**
 * @return Collection|Satisfaction[]
 */
public function getSatisfactions(): Collection
{
    return $this->satisfactions;
}

public function addSatisfaction(Satisfaction $satisfaction): self
{
    if (!$this->satisfactions->contains($satisfaction)) {
        $this->satisfactions[] = $satisfaction;
        $satisfaction->setSociety($this);
    }
}
      
public function removeInternatinalParner(InternalPartner $internatinalParner): self
{
    if ($this->internatinalParner->contains($internatinalParner)) {
        $this->internatinalParner->removeElement($internatinalParner);
    }
    return $this;
}
}