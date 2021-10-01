<?php

namespace App\Tests;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testIntegerPrice()
    {
        $product = new Product();
        $product->setPrice(1000);
        $actual = $product->getPrice();

        $this->assertEquals(1000, $actual);
    }

    public function testNullPrice()
    {
        $product1 = new Product();
        $product1->setPrice(null);
        $actual1 = $product1->getPrice();

        $this->assertEquals(null, $actual1);
    }
}
