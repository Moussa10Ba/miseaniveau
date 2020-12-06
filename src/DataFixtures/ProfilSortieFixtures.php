<?php

namespace App\DataFixtures;

use App\Entity\ProfilSortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfilSortieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        // $manager->persist($product);
        $tabProfilSortie=["Dev Back","Dev Front","Dev Full"];

        for ($i=0;$i<3;$i++){
            $profilSortie = new ProfilSortie();
            $profilSortie->setLibelleProfilSortie($tabProfilSortie[$i]);
            $manager->persist($profilSortie);
        }

        $manager->flush();
    }
}
