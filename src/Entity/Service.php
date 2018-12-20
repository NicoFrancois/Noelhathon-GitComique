<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
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
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EditionService", inversedBy="service")
     */
    private $edition;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EditionService", mappedBy="service")
     */
    private $editionServices;

    public function __construct()
    {
        $this->editionServices = new ArrayCollection();
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


    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }


    public function getEdition(): ?EditionService
    {
        return $this->edition;
    }

    public function setEdition(?EditionService $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * @return Collection|EditionService[]
     */
    public function getEditionServices(): Collection
    {
        return $this->editionServices;
    }

    public function addEditionService(EditionService $editionService): self
    {
        if (!$this->editionServices->contains($editionService)) {
            $this->editionServices[] = $editionService;
            $editionService->setService($this);
        }

        return $this;
    }

    public function removeEditionService(EditionService $editionService): self
    {
        if ($this->editionServices->contains($editionService)) {
            $this->editionServices->removeElement($editionService);
            // set the owning side to null (unless already changed)
            if ($editionService->getService() === $this) {
                $editionService->setService(null);
            }
        }

        return $this;
    }
}
