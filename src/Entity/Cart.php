<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="app_cart")
 * @ORM\Entity()
 */

class Cart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="date_time", type="datetime")
     */
    private $dateTime;

    /**
     * @var Customer
     *
     * @ORM\OneToOne(targetEntity="Customer")
     */
    private $customer;

    /**
     * @var Collection|Product[]
     *
     * @ORM\ManyToMany(targetEntity="Product")
     */
    private $products;

    /**
     * @return mixed
     */

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTime(): ?DateTime
    {
        return $this->dateTime;
    }

    /**
     * @param DateTime|null $dateTime
     */
    public function setDateTime(?DateTime $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Collection|Product[] $products
     */
    public function setProducts($products): void
    {
        $this->products = $products;
    }


}