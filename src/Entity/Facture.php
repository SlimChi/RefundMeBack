<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $number_product;

    #[ORM\Column(type: 'float')]
    private $total_price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberProduct(): ?int
    {
        return $this->number_product;
    }

    public function setNumberProduct(int $number_product): self
    {
        $this->number_product = $number_product;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(float $total_price): self
    {
        $this->total_price = $total_price;

        return $this;
    }
}
