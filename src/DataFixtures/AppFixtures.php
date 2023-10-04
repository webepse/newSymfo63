<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 1; $i<=10; $i++)
        {
            $product = new Product();
            $product->setTitle("Titre de mon produit ".$i)
                    ->setDescription("<div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem iusto tempore impedit consequatur ad sunt.</div>")
                    ->setImage("https://picsum.photos/200/300")
                    ->setCreateAt(new \DateTime());
            $manager->persist($product);
        }


        $manager->flush();
    }
}
