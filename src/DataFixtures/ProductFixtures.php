<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setTitle('Product 1');
        $product->setCode('1');
        $product->setPrice(1000);

        $manager->persist($product);

        $manager->flush();
    }
}
