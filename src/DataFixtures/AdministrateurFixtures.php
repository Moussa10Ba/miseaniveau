<?php

namespace App\DataFixtures;

use App\Entity\Administrateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdministrateurFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();
        for ($i=0 ;$i<5; $i++){
            $admin = new Administrateur();
            $password =$this->encoder->encodePassword($admin,"passer");

            $admin->setMatricule("mat".$i);
            $admin->setPassword($password);
            $admin->setArchive(false);
            $admin->setPrenom($faker->firstNameMale);
            $admin->setNom($faker->lastName);
            $admin->setEmail($faker->email);
            $admin->setLogin($faker->username);
            $admin->setProfil($this->getReference(ProfilFixtures::PROFIL_ADMIN_REFERENCE));
            $tabphoto=[
                "image1.jpg",
                "image3.jpg",
                "image4.jpg"
            ];

            $admin->setPhoto($faker->randomElement($tabphoto));
            $manager->persist($admin);
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
