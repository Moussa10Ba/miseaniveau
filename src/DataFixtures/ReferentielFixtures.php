<?php

namespace App\DataFixtures;

use App\Entity\Referentiel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class ReferentielFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(EntityManagerInterface $em){
        $this->em=$em;
    }
    public function load(ObjectManager $manager)
    {

        for ($i=0;$i<5;$i++){
            $referentiel = new Referentiel();
            
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.

    }
}
