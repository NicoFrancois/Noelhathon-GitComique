<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InternalPartnerRepository")
 */
class InternalPartner
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EditionEvent", inversedBy="internalPartners")
     */
    private $editionEvent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StartUp", inversedBy="internalPartners")
     */
    private $startup;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="internalPartners")
     */
    private $event;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\StartUp", mappedBy="internatinalParner")
     */
    private $startUps;

    public function __construct()
    {
        $this->startUps = new ArrayCollection();
    }

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

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEditionEvent(): ?EditionEvent
    {
        return $this->editionEvent;
    }

    public function setEditionEvent(?EditionEvent $editionEvent): self
    {
        $this->editionEvent = $editionEvent;
    }

        public function getStartup(): ?StartUp
    {
        return $this->startup;
    }

    public function setStartup(?StartUp $startup): self
    {
        $this->startup = $startup;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return Collection|StartUp[]
     */
    public function getStartUps(): Collection
    {
        return $this->startUps;
    }

    public function addStartUp(StartUp $startUp): self
    {
        if (!$this->startUps->contains($startUp)) {
            $this->startUps[] = $startUp;
            $startUp->addInternatinalParner($this);
        }

        return $this;
    }

    public function removeStartUp(StartUp $startUp): self
    {
        if ($this->startUps->contains($startUp)) {
            $this->startUps->removeElement($startUp);
            $startUp->removeInternatinalParner($this);
        }

        return $this;
    }
}
