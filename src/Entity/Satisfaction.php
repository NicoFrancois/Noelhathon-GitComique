<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SatisfactionRepository")
 */
class Satisfaction
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
    private $satisfactionRatio;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $amelioration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eventElarge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $existance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StartUp", inversedBy="satisfactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $society;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $function;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSatisfactionRatio(): ?string
    {
        return $this->satisfactionRatio;
    }

    public function setSatisfactionRatio(string $satisfactionRatio): self
    {
        $this->satisfactionRatio = $satisfactionRatio;

        return $this;
    }

    public function getAmelioration(): ?string
    {
        return $this->amelioration;
    }

    public function setAmelioration(?string $amelioration): self
    {
        $this->amelioration = $amelioration;

        return $this;
    }

    public function getEventElarge(): ?string
    {
        return $this->eventElarge;
    }

    public function setEventElarge(string $eventElarge): self
    {
        $this->eventElarge = $eventElarge;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getExistance(): ?string
    {
        return $this->existance;
    }

    public function setExistance(string $existance): self
    {
        $this->existance = $existance;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
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

    public function getSociety(): ?StartUp
    {
        return $this->society;
    }

    public function setSociety(?StartUp $society): self
    {
        $this->society = $society;

        return $this;
    }

    public function getFunction(): ?string
    {
        return $this->function;
    }

    public function setFunction(string $function): self
    {
        $this->function = $function;

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
}
