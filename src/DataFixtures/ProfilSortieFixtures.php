<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfilSortieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // $product = new Product();
        // $manager->persist($product);
        $profilSortie=new \App\Entity\ProfilSortie();
        $manager->flush();
    }
}
