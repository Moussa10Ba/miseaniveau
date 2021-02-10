<?php
namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReferentielRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ReferentielService{

    public function createReferentiel(Request $request, Serializer $serializer, EntityManagerInterface $manager){
        $referentiel = $request->request->all();
        // $data= json_decode($request->getContent(), true); 
        // dd($data);
        dd($referentiel);
        $programme = $request->files->get("programme");
        $programme = fopen($programme->getRealPath(),"rb");
        $referentiel["programme"]=$programme;
        $referentiel = $serializer->denormalize($referentiel, "App\\Entity\\Referentiel");
        $manager->persist($referentiel);
        $manager->flush();
        return new JsonResponse($referentiel, Response::HTTP_CREATED);
    }

}