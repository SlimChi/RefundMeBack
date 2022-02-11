<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FactureRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['facture_read']],
    denormalizationContext: ['groups' => ['facture_write']],
)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("facture_read")]
    private $id;

    #[ORM\Column(type: 'integer')]
    #[Groups(["facture_read", "facture_write"])]
    private $numberProduct;

    #[ORM\Column(type: 'float')]
    #[Groups(["facture_read", "facture_write"])]
    private $totalPrice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberProduct(): ?int
    {
        return $this->numberProduct;
    }

    public function setNumberProduct(int $numberProduct): self
    {
        $this->numberProduct = $numberProduct;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }
}