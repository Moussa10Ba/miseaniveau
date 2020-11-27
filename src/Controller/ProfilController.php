<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
    $this->em=$em;
    }
    /**
     * @Route("api/admin/profils/{id}/users", name="get_all_users_by_profils", methods={"GET"})
     */
    public function getListUserByProfil($id, ProfilRepository $profilRepo)
    {
        $profil = $profilRepo->findOneBy(["id"=>$id]);
        if ($profil) {
            return $this->json($profil->getUtilisateurs(),201,[]);
        }
            return $this->json(["message"=>"Ce Profil n'existe Pas"],Response::HTTP_NOT_FOUND);

    }
    
    
}
