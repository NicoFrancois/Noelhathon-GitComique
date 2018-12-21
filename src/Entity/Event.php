<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EditionEvent", mappedBy="event")
     */
    private $editionEvents;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Satisfaction", mappedBy="event")
     */
    private $satisfactions;

    public function __construct()
    {
        $this->editionEvents = new ArrayCollection();
        $this->satisfactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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
     * @return Collection|EditionEvent[]
     */
    public function getEditionEvents(): Collection
    {
        return $this->editionEvents;
    }

    public function addEditionEvent(EditionEvent $editionEvent): self
    {
        if (!$this->editionEvents->contains($editionEvent)) {
            $this->editionEvents[] = $editionEvent;
            $editionEvent->setEvent($this);
        }

        return $this;
    }

    public function removeEditionEvent(EditionEvent $editionEvent): self
    {
        if ($this->editionEvents->contains($editionEvent)) {
            $this->editionEvents->removeElement($editionEvent);
            // set the owning side to null (unless already changed)
            if ($editionEvent->getEvent() === $this) {
                $editionEvent->setEvent(null);
            }
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
            $satisfaction->setEvent($this);
        }

        return $this;
    }

    public function removeSatisfaction(Satisfaction $satisfaction): self
    {
        if ($this->satisfactions->contains($satisfaction)) {
            $this->satisfactions->removeElement($satisfaction);
            // set the owning side to null (unless already changed)
            if ($satisfaction->getEvent() === $this) {
                $satisfaction->setEvent(null);
            }
        }

        return $this;
    }
}
