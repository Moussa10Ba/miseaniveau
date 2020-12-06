<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use App\Repository\CompetenceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NiveauFixtures extends Fixture
{
    public function __construct(CompetenceRepository $competenceRepository)
    {
        $this->competenceRepository=$competenceRepository;
    }

    public function load(ObjectManager $manager)
    {
        $tabCompetence=$this->competenceRepository->findAll();
        for ($i=1;$i<=6;$i++){
            $niveau=new Niveau();
            $niveau->setLibelle('Niveau'.$i);
            $niveau->setCritereDeval("Critere D'evalution".$i);

            if ($i>=3){
                $niveau->setCompetence($tabCompetence[2]);
            }else{
                $niveau->setCompetence($tabCompetence[1]);
            }
            $manager->persist($niveau);
        }
        $manager->flush();
    }

}
