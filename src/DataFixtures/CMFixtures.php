<?php

namespace App\DataFixtures;

use App\Entity\CM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class CMFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i =1 ; $i <= 10; $i++) {
            $cm = new CM();
            $password =$this->encoder->encodePassword($cm,"passer");
            $cm->setPassword($password);
            $cm->setArchive(false);
            $cm->setPrenom($faker->firstNameMale);
            $cm->setNom($faker->lastName);
            $cm->setEmail($faker->email);
            $cm->setLogin($faker->username);
            $cm->setProfil($this->getReference(ProfilFixtures::PROFIL_CM_REFERENCE));
            $tabphoto=[
                "image1.jpg",
                "image3.jpg",
                "image4.jpg"
            ];

            $cm->setPhoto($faker->randomElement($tabphoto));

            $manager->persist($cm);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return array(
            ProfilFixtures::class,
        );
    }
}
