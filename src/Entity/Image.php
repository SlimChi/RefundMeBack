<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImageRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['image_read']],
    denormalizationContext: ['groups' => ['image_write']],
    )]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("image_read")]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["image_read","image_write"])]
    private $libelle_image;

    #[ORM\Column(type: 'text')]
    #[Groups(["image_read","image_write"])]
    private $description_image;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["image_read","image_write"])]
    private $url_image;

    #[ORM\ManyToMany(targetEntity: Product::class, mappedBy: 'image')]
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleImage(): ?string
    {
        return $this->libelle_image;
    }

    public function setLibelleImage(string $libelle_image): self
    {
        $this->libelle_image = $libelle_image;

        return $this;
    }

    public function getDescriptionImage(): ?string
    {
        return $this->description_image;
    }

    public function setDescriptionImage(string $description_image): self
    {
        $this->description_image = $description_image;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->url_image;
    }

    public function setUrlImage(string $url_image): self
    {
        $this->url_image = $url_image;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addImage($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeImage($this);
        }

        return $this;
    }
}
