<?php
namespace App\Service;


use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Profil;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class UserService
{
    public function __construct(UserPasswordEncoderInterface $encoder,SerializerInterface $serializer,
    ProfilRepository $profilRepo, ValidatorInterface $validator, EntityManagerInterface $em,\Swift_Mailer $mailer){
        $this->encoder=$encoder;
        $this->serializer=$serializer;
        $this->profilRepo=$profilRepo;
        $this->em=$em;
        $this->validator=$validator;
        $this->mailer=$mailer;
    }
    public function addUser(Request $request,$profil=null)
    {
        $data=$request->request->all();

        $profil=$this->profilRepo->findOneByLibelle($data["profil"]);
       unset($data['profil']);
        $user=$this->serializer->denormalize($data,"App\Entity\\".$profil->getLibelle(),true);
        $user->setProfil($profil);
        $photo=$request->files->get("photo");
        if ($photo){
            $photoConverti = fopen($photo->getRealPath(),"rb");
            $user->setPhoto($photoConverti);
        }
        $plainPassword = $this->givePassword();
        $user->setPlainPassword($plainPassword);
        $encoded =$this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);

        $errors = $this->validator->validate($user);
        if ($errors){
            $errors=$this->serializer->serialize($errors,json);
            return $errors;
        }

        return $user;





    }
    public function givePassword($randoPassword="passer"){
        //return $randoPassword.rand(10,10000);
        return "passer";
    }

    public function sendMail($user){

        $mail=$user->getEmail();
        $password=$user->getPlainPassword();
        $message = (new \Swift_Message('Configuration nouveau Mot de passe'))
            ->setFrom('testermail889@gmail.com')
            ->setTo($mail)
            ->setBody(
                'Utilisez ce mot passe pour acceder a votre compte et changer le apres connexion 
                '.$password
                );

       $this->mailer->send($message);
    }

    public function updateUser($objet, $request, $errors){
        if (!$objet){
            return $errors;
        }
        dd($request);
    }
}

