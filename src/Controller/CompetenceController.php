<?php

namespace App\Controller;

use App\Entity\Niveau;
use App\Entity\Competence;
use App\Repository\NiveauRepository;
use App\Repository\CompetenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\GroupeCompetenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
                    $niveau->setCritereDeval($data['critereDeval']);
                    $niveau->setCompetence($competence);
                    $em->persist($niveau);
                }
                $em->flush();
                return new JsonResponse(["message"=>"Update OK",Response::HTTP_OK]);
        }

    }

    /**
     * @Route("api/admin/competences", name="addCompetence", methods={"POST"})
     */

    public function AddCompetence(Request $request,EntityManagerInterface $em, GroupeCompetenceRepository $gCrepo)
    {

        $data=json_decode($request->getContent(),true);
        foreach ($data as $value){
            if ($value===''){
                return new JsonResponse(["message"=>"Tous les champs sont obligatoire",Response::HTTP_BAD_REQUEST]);
            }
        }
        $id = $data["groupeCompetence"];
        $groupeCompetence = $gCrepo->findOneBy(["id"=>$id]);
         if(!$groupeCompetence){
            return new JsonResponse(["message"=>"Ce groupe de Competence n'existe pas",Response::HTTP_BAD_REQUEST]);
         }
        $niveau1 = new Niveau();
        $niveau2 = new Niveau();
        $niveau3 = new Niveau();

        
        $competence = new Competence();
        $competence->setLibelle($data['libelle']);
        $competence->setArchive(false);
    

        $niveau1->setCritereDeval($data['critereDeval1']);
        $niveau1->setGroupeDaction($data['groupeDaction1']);
       

        $niveau2->setCritereDeval($data['critereDeval2']);
        $niveau2->setGroupeDaction($data['groupeDaction2']);
        

        $niveau3->setCritereDeval($data['critereDeval3']);
        $niveau3->setGroupeDaction($data['groupeDaction3']);
       

        $competence->addNiveau($niveau1);
        $competence->addNiveau($niveau2);
        $competence->addNiveau($niveau3);

        $groupeCompetence->AddCompetence($competence);
        
        $em->persist($niveau1);
        $em->persist($niveau2);
        $em->persist($niveau3);
        $em->persist($competence);
        $em->flush();
        return new JsonResponse(['message'=>"Succes",Response::HTTP_CREATED]);
    }
}

