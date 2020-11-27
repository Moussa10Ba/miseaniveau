<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Curl\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurController extends AbstractController
{
    public function __construct(UserPasswordEncoderInterface $encoder,SerializerInterface $serializer,ValidatorInterface $validator,NormalizerInterface $decorated
    ,UserService $userService,EntityManagerInterface $em)
    {
        $this->encoder=$encoder;
        $this->serializer=$serializer;
        $this->validator=$validator;
        $this->decorated=$decorated;
        $this->userService=$userService;
        $this->em=$em;
    }
    /**
     * @Route("/api/apprenants", name="addApprennant", methods={"POST"})
     * @Route("/api/formateurs", name="addFormateur", methods={"POST"})
     */
    public function addUser(Request $request)
    {

        if (!$this->isGranted('ROLE_ADMIN'))
        {
            return $this->json(["message"=>"Acces Refuse"],Response::HTTP_BAD_REQUEST);
        }
        $user=$this->userService->addUser($request);
        //dd($user);
        if (!($user instanceof Utilisateur)){
            return new JsonResponse($user,Response::HTTP_BAD_REQUEST);
        }
        $this->userService->sendMail($user);
        $this->em->persist($user);
        $this->em->flush();

        return new JsonResponse(["message"=>"User Add",Response::HTTP_CREATED]);
    }

    /**
     * @Route("/api/admin/users/{id}", name="updateUser", methods={"PUT"})
     * @Route("/api/apprenants/{id}", name="updateApprenant", methods={"PUT"})
     */
    public function updateUser(Request $request, $id){
        $data=$request->request->all();
        dd($data);
    }
}
