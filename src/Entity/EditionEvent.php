<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EditionEventRepository")
 */
class EditionEvent
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
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="editionEvents")
     */
    private $event;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Satisfaction", mappedBy="editionEvent")
     */
    private $satisfactions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InternalPartner", mappedBy="editionEvent")
     */
    private $internalPartners;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\StartUp", inversedBy="editionEvents")
     */
    private $startup;

    public function __construct()
    {
        $this->satisfactions = new ArrayCollection();
        $this->internalPartners = new ArrayCollection();
        $this->startup = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
            $satisfaction->setEditionEvent($this);
        }

        return $this;
    }

    public function removeSatisfaction(Satisfaction $satisfaction): self
    {
        if ($this->satisfactions->contains($satisfaction)) {
            $this->satisfactions->removeElement($satisfaction);
            // set the owning side to null (unless already changed)
            if ($satisfaction->getEditionEvent() === $this) {
                $satisfaction->setEditionEvent(null);
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
            $internalPartner->setEditionEvent($this);
        }

        return $this;
    }

    public function removeInternalPartner(InternalPartner $internalPartner): self
    {
        if ($this->internalPartners->contains($internalPartner)) {
            $this->internalPartners->removeElement($internalPartner);
            // set the owning side to null (unless already changed)
            if ($internalPartner->getEditionEvent() === $this) {
                $internalPartner->setEditionEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|StartUp[]
     */
    public function getStartup(): Collection
    {
        return $this->startup;
    }

    public function addStartup(StartUp $startup): self
    {
        if (!$this->startup->contains($startup)) {
            $this->startup[] = $startup;
        }

        return $this;
    }

    public function removeStartup(StartUp $startup): self
    {
        if ($this->startup->contains($startup)) {
            $this->startup->removeElement($startup);
        }

        return $this;
    }
}
