<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ProfilFixtures extends Fixture
{
    public const PROFIL_APPRENANT_REFERENCE = 'profil_apprenant';
    public const PROFIL_ADMIN_REFERENCE = 'profil_admin';
    public const PROFIL_CM_REFERENCE = 'profil_cm';
    public const PROFIL_FORMATEUR_REFERENCE = 'profil_formateur';
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $tab=["Apprenant","Formateur","CM","ADMIN"];
        for ($i=1; $i <=4 ; $i++) { 
            $profil = new Profil();
            if ($i==1) {
                $profil->setLibelle("Apprenant");
                $profil->setArchive(true);
                $this->addReference(self::PROFIL_APPRENANT_REFERENCE, $profil);

            }if ($i==2) {
                $profil->setLibelle("Formateur");
                $this->addReference(self::PROFIL_FORMATEUR_REFERENCE, $profil);
            }if ($i==3) {
                $profil->setLibelle("CM");
                $profil->setArchive(true);
                $this->addReference(self::PROFIL_CM_REFERENCE, $profil);
            }if ($i==4) {
                $profil->setLibelle("ADMIN");
               
                $this->addReference(self::PROFIL_ADMIN_REFERENCE, $profil);
            }
            $manager->persist($profil);
        }

        $manager->flush();
    }
}
