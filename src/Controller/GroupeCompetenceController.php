<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Entity\GroupeCompetence;
use App\Repository\CompetenceRepository;
use App\Repository\GroupeCompetenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class GroupeCompetenceController extends AbstractController
{
    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer, CompetenceRepository $cpRepo,GroupeCompetenceRepository $groupeCompetenceRepository)
    {
        $this->em = $em;
        $this->serializer = $serializer;
        $this->cpRepo = $cpRepo;
        $this->groupeCompetenceRepository=$groupeCompetenceRepository;
    }

    /**
     * @Route("api/admin/groupe_competences", name="saveGroupeCompetence", methods={"POST"})
     */
    public function saveGroupeCompetence(Request $request)
    {
        $data = $request->getContent();
        $newdata = json_decode($data, true);
        $tabAverifier = ['libelle', 'descriptif', 'idGroupeCompetence'];
        $groupeCompetence = new GroupeCompetence();
        $competence = $this->cpRepo->findOneBy(['id' => $newdata['idCompetence']]);
        $isValid=true;
        foreach ($tabAverifier as $value){
            if ($value ==''){
                $isValid=false;
                return new JsonResponse(["messge"=>"Tous les champs sont obligatoire"],Response::HTTP_NOT_FOUND);
            }
        }
        if (!$competence){
            $newCompetence = new Competence();
            $newCompetence->setLibelle($newdata['LibelleCompetence']);
            $newCompetence->setArchive(false);
            $newCompetence->setDescriptif("Descriptif de la nouvelle Competence");
            $this->em->persist($newCompetence);
            $this->em->flush();
        }
        $groupeCompetence->setDescriptif($newdata['descriptif']);
        $groupeCompetence->setLibelle($newdata['libelle']);
        $groupeCompetence->addCompetence($competence);
        $this->em->persist($groupeCompetence);
        $this->em->flush();
        return new JsonResponse(["message"=>"Succes",Response::HTTP_CREATED]);

    }

    /**
    * @Route("api/admin/groupe_competences/{id}", name="updateGroupeCompetence", methods={"PUT"})
    */

    public function updateGroupeCompetence(Request $request,$id){
        $data=json_decode($request->getContent(),true);
        $groupeCompetence=$this->groupeCompetenceRepository->findOneBy(['id'=>$id]);

        if (!$groupeCompetence){
            return new JsonResponse(["message"=>"No Groupe Competence found",Response::HTTP_BAD_REQUEST]);
        }
        $idCompetence=$data['idCompetence'];

        $competence=$this->cpRepo->findOneBy(['id'=>$idCompetence]);
        if ($data['action']=='add'){
            $groupeCompetence->addCompetence($competence);
        }elseif ($data['action']=='remove'){
            $groupeCompetence->removeCompetence($competence);
        }else{
            return new JsonResponse(["message"=>"Impossible d'effectuer ce traitement",Response::HTTP_BAD_REQUEST]);
        }
        $this->em->flush();
        return new JsonResponse(["message"=>"Update Ok",Response::HTTP_OK]);

    }
}
