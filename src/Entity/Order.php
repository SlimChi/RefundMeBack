<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
#[ApiResource(
    normalizationContext: ['groups' => ['order_read']],
    denormalizationContext: ['groups' => ['order_write']],
    )]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("order_read")]
    private $id;

    #[ORM\Column(type: 'datetime')]
    #[Groups(["order_read","order_write"])]
    private $orderDate;

    #[ORM\Column(type: 'integer')]
    #[Groups(["order_read","order_write"])]
    private $numberProduct;

    #[ORM\Column(type: 'boolean')]
    #[Groups(["order_read","order_write"])]
    private $isSent;

    #[ORM\Column(type: 'float')]
    #[Groups(["order_read","order_write"])]
    private $totalPrice;

    #[ORM\Column(type: 'datetime')]
    #[Groups(["order_read","order_write"])]
    private $shippDate;

    #[ORM\OneToMany(mappedBy: 'orders', targetEntity: User::class)]
    private $users;

    #[ORM\OneToOne(targetEntity: Facture::class, cascade: ['persist', 'remove'])]
    private $facture;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
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

    public function getIsSent(): ?bool
    {
        return $this->isSent;
    }

    public function setIsSent(bool $isSent): self
    {
        $this->isSent = $isSent;

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

    public function getShippDate(): ?\DateTimeInterface
    {
        return $this->shippDate;
    }

    public function setShippDate(\DateTimeInterface $shippDate): self
    {
        $this->shippDate = $shippDate;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setOrders($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getOrders() === $this) {
                $user->setOrders(null);
            }
        }

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }
}