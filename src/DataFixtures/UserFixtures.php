<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 30; $i++){
            $user = new User();
            $user->setNom("Nom de l'utilisateur n*$i");
            $user->setPrenom("Prénom de l'utilisateur n*$i");
            $user->setAdresse("Adresse de l'utilisateur n*$i");
            $user->setDateNaiss(new \DateTime());
            $user->setSexe("Sexe de l'utilisateur n*$i");
        $manager->  persist($user);

        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
