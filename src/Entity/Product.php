<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['product_read']],
    denormalizationContext: ['groups' => ['product_write']],
    )]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("product_read")]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["product_read","product_write"])]
    private $titleProduct;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["product_read","product_write"])]
    private $description;

    #[ORM\Column(type: 'float')]
    #[Groups(["product_read","product_write"])]
    private $price;

    #[ORM\Column(type: 'boolean')]
    #[Groups(["product_read","product_write"])]
    private $isAvailable;

    #[ORM\Column(type: 'boolean')]
    #[Groups(["product_read","product_write"])]
    private $packaging;

    #[ORM\Column(type: 'integer')]
    #[Groups(["product_read","product_write"])]
    private $stockProduct;

    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'products')]
    private $image;

    public function __construct()
    {
        $this->image = new ArrayCollection();
    }

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
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

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
        return $this->stockProduct;
    }

    public function setStockProduct(int $stockProduct): self
    {
        $this->stockProduct = $stockProduct;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Image $image): self
    {
        if (!$this->image->contains($image)) {
            $this->image[] = $image;
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        $this->image->removeElement($image);

        return $this;
    }
}
