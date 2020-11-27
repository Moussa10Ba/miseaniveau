<?php

namespace App\DataFixtures;

use App\Entity\formateur;
use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FormateurFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i =1 ; $i <= 10; $i++) {
            $formateur = new Formateur();
            $password =$this->encoder->encodePassword($formateur,"passer");
            $formateur->setPassword($password);
            $formateur->setArchive(false);
            $formateur->setPrenom($faker->firstNameMale);
            $formateur->setNom($faker->lastName);
            $formateur->setEmail($faker->email);
            $formateur->setLogin($faker->username);
            $formateur->setProfil($this->getReference(ProfilFixtures::PROFIL_FORMATEUR_REFERENCE));
            $tabphoto=[
                "image1.jpg",
                "image3.jpg",
                "image4.jpg"
            ];

            $formateur->setPhoto($faker->randomElement($tabphoto));
            $tabSpecialite=[
                "DEV",
                "IA",
                "DESIGN"
            ];
            $formateur->setSpecialite($faker->randomElement($tabSpecialite));
            $manager->persist($formateur);
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
