<?php

namespace App\DataFixtures;

use App\Entity\Medicament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MedFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 30; $i++) {
            $med = new Medicament();
            $med->setNomMed("Medicament $i");
            $med->setFabricant("Fabricant $i");
            $med->setIndications("Indication $i");
            $med->setContreIndic("Contre indication $i");
            $med->setComposants("Composant $i");

            // $product = new Product();
            // $manager->persist($product);
        $manager->persist($med);
        }
        $manager->flush();
    }
}
