<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $order_date;

    #[ORM\Column(type: 'integer')]
    private $number_product;

    #[ORM\Column(type: 'boolean')]
    private $is_sent;

    #[ORM\Column(type: 'float')]
    private $total_price;

    #[ORM\Column(type: 'datetime')]
    private $shipp_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
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

    public function getIsSent(): ?bool
    {
        return $this->is_sent;
    }

    public function setIsSent(bool $is_sent): self
    {
        $this->is_sent = $is_sent;

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

    public function getShippDate(): ?\DateTimeInterface
    {
        return $this->shipp_date;
    }

    public function setShippDate(\DateTimeInterface $shipp_date): self
    {
        $this->shipp_date = $shipp_date;

        return $this;
    }
}