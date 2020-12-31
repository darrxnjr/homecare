<?php

namespace App\DataFixtures;

use App\Entity\Symptome;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SymptomeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 30; $i++){
            $symptome = new Symptome();
            $symptome->setNomSymptome("Symptome $i");
        $manager->persist($symptome);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
