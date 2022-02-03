<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titleProduct;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Column(type: 'boolean')]
    private $is_available;

    #[ORM\Column(type: 'boolean')]
    private $packaging;

    #[ORM\Column(type: 'integer')]
    private $stock_product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleProduct(): ?string
    {
        return $this->titleProduct;
    }

    public function setTitleProduct(string $titleProduct): self
    {
        $this->titleProduct = $titleProduct;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->is_available;
    }

    public function setIsAvailable(bool $is_available): self
    {
        $this->is_available = $is_available;

        return $this;
    }

    public function getPackaging(): ?bool
    {
        return $this->packaging;
    }

    public function setPackaging(bool $packaging): self
    {
        $this->packaging = $packaging;

        return $this;
    }

    public function getStockProduct(): ?int
    {
        return $this->stock_product;
    }

    public function setStockProduct(int $stock_product): self
    {
        $this->stock_product = $stock_product;

        return $this;
    }
}
