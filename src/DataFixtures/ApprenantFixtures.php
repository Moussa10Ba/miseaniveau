<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Profil;
use App\Entity\Apprenant;
use App\DataFixtures\ProfilFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
        $apprenant=new Apprenant();
        $faker = Factory::create();
        for ($i =1 ; $i <= 10; $i++) {
            $apprenant = new Apprenant();
            $password =$this->encoder->encodePassword($apprenant,"passer");
            $profil = new Profil();
            $apprenant->setPassword($password);
            $apprenant->setArchive(false);
            $apprenant->setPrenom($faker->firstNameMale);
            $apprenant->setNom($faker->lastName);
            $apprenant->setEmail($faker->email);
            $apprenant->setLogin($faker->username);
            $apprenant->setStatus("Travailleur");
            $apprenant->setProfil($this->getReference(ProfilFixtures::PROFIL_APPRENANT_REFERENCE));
            $tabphoto=[
                "image1.jpg",
                "image3.jpg",
                "image4.jpg"
            ];

            $apprenant->setPhoto($faker->randomElement($tabphoto));
            $manager->persist($apprenant);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ProfilFixtures::class,
        );
    }
}
