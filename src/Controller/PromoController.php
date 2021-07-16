<?php

namespace App\Controller;

use App\Service\PromoService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PromoController extends AbstractController
{
     /**
     * @Route("/api/admin/promo/add", name="addPromo", methods={"POST"})
     */
    public function addPromo(PromoService $proServ, Request $request)
    {
        return $this->json($proServ->createPromo($request),200);
    }

}
