<?php
namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReferentielRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class ReferentielService{

    private $serializer;
    private $manager;
    public function __construct( SerializerInterface $serializer, EntityManagerInterface $manager){
        $this->serializer = $serializer;
        $this->manager = $manager;

    }

    public function createReferentiel(Request $request){
        $referentiel = $request->request->all();
        //return new JsonResponse($referentiel, 400);
        
        // $data= json_decode($request->getContent(), true); 
        $programme = $request->files->get("programme");
        if($programme){
            $programme = fopen($programme->getRealPath(),"rb");
            $referentiel["programme"]=$programme;
        }
        
        $referentiel = $this->serializer->denormalize($referentiel, "App\\Entity\\Referentiel");
        $this->manager->persist($referentiel);
        $this->manager->flush();
        return $referentiel;
    }

}