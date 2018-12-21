<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipantRepository")
 */
class Participant
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
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StartUp", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $society;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasResponse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="participants")
     */
    private $register;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPresent;

    public function __construct()
    {
        $this->register = new ArrayCollection();
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getSociety(): ?StartUp
    {
        return $this->society;
    }

    public function setSociety(?StartUp $society): self
    {
        $this->society = $society;

        return $this;
    }

    public function getHasResponse(): ?bool
    {
        return $this->hasResponse;
    }

    public function setHasResponse(bool $hasResponse): self
    {
        $this->hasResponse = $hasResponse;

        return $this;
    }

    public function getRegister()
    {
        return $this->register;
    }

    public function setRegister(?Event $register): self
    {
        $this->register = $register;

        return $this;
    }

    public function getIsPresent(): ?bool
    {
        return $this->isPresent;
    }

    public function setIsPresent(bool $isPresent): self
    {
        $this->isPresent = $isPresent;

        return $this;
    }

    public function addRegister(Event $register): self
    {
        if (!$this->register->contains($register)) {
            $this->register[] = $register;
            $register->setParticipant($this);
        }

        return $this;
    }

    public function removeRegister(Event $register): self
    {
        if ($this->register->contains($register)) {
            $this->register->removeElement($register);
            // set the owning side to null (unless already changed)
            if ($register->getParticipant() === $this) {
                $register->setParticipant(null);
            }
        }

        return $this;
    }
}
