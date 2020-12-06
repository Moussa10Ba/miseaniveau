<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Entity\Niveau;
use App\Repository\CompetenceRepository;
use App\Repository\NiveauRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetenceController extends AbstractController
{
    /**
     * @Route("api/admin/competences/{id}", name="updateCompetence", methods={"PUT"})
     */
    public function updateCompetence(Request $request, $id,CompetenceRepository $repository,
                                     NiveauRepository $niveauRepository,EntityManagerInterface $em)
    {
        $data=json_decode($request->getContent(),true);
        $competence=$repository->findOneBy(['id'=>$id]);
        if (key_exists('idniveau',$data)){
            $niveau=$niveauRepository->findOneBy(['id'=>$data['idniveau']]);

        }
        if ($competence){
                if ($niveau){
                    $competence->addNiveau($niveau);
                }else{
                    $niveau=new Niveau();
                    $niveau->setLibelle($data['libelleNiveau']);
                    $niveau->setCritereDeval($data['critereDeval']);
                    $niveau->setCompetence($competence);
                    $em->persist($niveau);
                }
                $em->flush();
                return new JsonResponse(["message"=>"Update OK",Response::HTTP_OK]);
        }

    }

    /**
     * @Route("api/admin/competences", name="AddCompetence", methods={"POST"})
     */

    public function AddCompetence(Request $request,EntityManagerInterface $em)
    {
        $data=json_decode($request->getContent(),true);
        foreach ($data as $value){
            if ($value===''){
                return new JsonResponse(["message"=>"Tous les champs sont obligatoire",Response::HTTP_BAD_REQUEST]);
            }
        }
        $competence = new Competence();
        $competence->setLibelle($data['libelle']);
        $competence->setDescriptif($data['descriptif']);
        $competence->setArchive(false);

        $tabLibelleNiveau=['LibelleNiveau1','LibelleNiveau2','LibelleNiveau3'];
        $tabDescriptif=['critereDeval1','critereDeval2','critereDeval3'];
        $taGroupeDaction=['groupeDaction1','groupeDaction2','groupeDaction3'];
        for ($i=0;$i<3;$i++)
        {
            $niveau = new Niveau();
            $niveau->setLibelle($tabLibelleNiveau[$i]);
            $niveau->setLibelle($tabDescriptif[$i]);
            $niveau->setCritereDeval($taGroupeDaction[$i]);
            $competence->addNiveau($niveau);
            $em->persist($niveau);
            $em->persist($competence);
        }
        $em->flush();
        return new JsonResponse(['message'=>"Succes",Response::HTTP_CREATED]);
    }
}
