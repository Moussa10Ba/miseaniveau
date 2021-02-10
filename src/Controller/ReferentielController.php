<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use App\Service\ReferentielService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReferentielController extends AbstractController
{
    /**
     * @Route("/api/admin/referentiels", name="addReferentiel", methods={"POST"})
     */
    public function addReferentiel(ReferentielService $refser, Request $request, SerializerInterface $serializer, EntityManagerInterface $manager)
    {
       return $this->json($refser->createReferentiel($request, $serializer, $manager),200);
    }
}
