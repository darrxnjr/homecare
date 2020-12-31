<?php

namespace App\DataFixtures;

use App\Entity\Allergie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AllergieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 30; $i++){
            $allergie = new Allergie();
            $allergie->setNomAllergie("Allergie $i");
        $manager->persist($allergie);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
