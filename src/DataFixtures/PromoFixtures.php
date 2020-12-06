<?php

namespace App\DataFixtures;

use App\Entity\Promo;
use App\Repository\ApprenantRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PromoFixtures extends Fixture
{
    public function __construct(ApprenantRepository $userRepo){
        $this->userRepo=$userRepo;
    }
    public function load(ObjectManager $manager)
    {
        $tabPromo=array();
        $tabLangue=array();
        $tabLieu=array();
        $tabPromo=['Promo_1','Promo_2','Promo_3'];
        $tabLangue=['Français','Anglais','Arabe'];
        $tabLieu=['Dakar','Saint_Louis','Thies'];
        $tabApprenant=$this->userRepo->findAll();
        for ($i=0;$i<3;$i++){
            $promo = new Promo();
            $promo->setDateDebut(\DateTime::createFromFormat('d-m-Y', "12-10-2021"));
            $promo->setDateFin(\DateTime::createFromFormat('d-m-Y', "12-10-2022"));
            $promo->setDescription("Description de la Promo");
            $promo->setLangue($tabLangue[$i]);
            $promo->setLieu($tabLieu[$i]);
            $promo->setTitre($tabPromo[$i]);
            $promo->setReferenceAgate("Reference".$i);
            $manager->persist($promo);



        }
        $manager->flush();
    }
}
