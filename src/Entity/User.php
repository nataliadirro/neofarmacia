<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
      * @ORM\Column(type="string", length=9, nullable=false)
      */
     private $dni;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=250, nullable=false)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $datebirth;

    /**
     * @ORM\Column(type="string", length=18, nullable=true)
     */
    private $healthcard;

    /**
     * @ORM\Column(type="boolean")
     */
    private $partner='false';



     public function getDni(): ?string
     {
         return $this->dni;
     }

     public function setDni(?string $dni): self
     {
         $this->dni = $dni;

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

    public function getDatebirth(): ?string
    {
        return $this->datebirth;
    }

    public function setDatebirth(?string $datebirth): self
    {
        $this->datebirth = $datebirth;

        return $this;
    }

    public function getHealthcard(): ?string
    {
        return $this->healthcard;
    }

    public function setHealthcard(?string $healthcard): self
    {
        $this->healthcard = $healthcard;

        return $this;
    }

    public function getPartner(): ?bool
    {
        return $this->partner;
    }

    public function setPartner(bool $partner): self
    {
        $this->partner = $partner;

        return $this;
    }
}
