<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $EventCount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $partnerIntake;

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

    public function getEventCount(): ?int
    {
        return $this->EventCount;
    }

    public function setEventCount(?int $EventCount): self
    {
        $this->EventCount = $EventCount;

        return $this;
    }

    public function getPartnerIntake(): ?int
    {
        return $this->partnerIntake;
    }

    public function setPartnerIntake(?int $partnerIntake): self
    {
        $this->partnerIntake = $partnerIntake;

        return $this;
    }
}
