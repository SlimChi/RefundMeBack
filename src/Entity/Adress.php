<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdressRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AdressRepository::class)]
#[ApiResource(
              normalizationContext: ['groups' => ['adress_read']],
              denormalizationContext: ['groups' => ['adress_write']],
              )]
class Adress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("adress_read")]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["adress_read","adress_write"])]
    private $country;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["adress_read","adress_write"])]
    private $city;

    #[ORM\Column(type: 'integer')]
    #[Groups(["adress_read","adress_write"])]
    private $postCode;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["adress_read","adress_write"])]
    private $street;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(["adress_read","adress_write"])]
    private $num_street;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(["adress_read","adress_write"])]
    private $additional_street;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostCode(): ?int
    {
        return $this->postCode;
    }

    public function setPostCode(int $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getNumStreet(): ?string
    {
        return $this->num_street;
    }

    public function setNumStreet(string $num_street): self
    {
        $this->num_street = $num_street;

        return $this;
    }

    public function getAdditionalStreet(): ?string
    {
        return $this->additional_street;
    }

    public function setAdditionalStreet(?string $additional_street): self
    {
        $this->additional_street = $additional_street;

        return $this;
    }
}
