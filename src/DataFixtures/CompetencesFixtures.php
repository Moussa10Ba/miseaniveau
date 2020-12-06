<?php

namespace App\DataFixtures;

use App\Entity\Competence;
use App\Entity\Niveau;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CompetencesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tabLibComp=['Creer une base donnee','Mettre en place une page web','Maquetter un site',
            'Developper le backend'];
        $tabDescript=['Description Creation base donnée','Description mise en place page web',
            'Description maquettage site','Description Dev Backend'];
        $j=0;
        for ($i=0;$i<5;$i++){
            $j=$i+1;
            $competence = new Competence();
            $niveau=new Niveau();
            $competence->setLibelle($tabLibComp[$i]);
            $competence->setDescriptif($tabDescript[$i]);
            $competence->setArchive(false);
            if ($i<3){
                $niveau->setLibelle("Niveau ".$j);
                $niveau->setCritereDeval("Critere D'evalution ".$j);
                $competence->addNiveau($niveau);
            }


            $manager->persist($niveau);
            $manager->persist($competence);
        }

        $manager->flush();
    }

}
