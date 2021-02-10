<?php
namespace App\Service;


use App\Entity\CM;
use App\Entity\Profil;
use App\Entity\Formateur;
use App\Entity\Utilisateur;
use App\Entity\Administrateur;
use App\Repository\ProfilRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ApiPlatform\Core\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    public function addUser( Request $request){
    //$data=$request->request->all();
   $data= json_decode($request->getContent(), true);  
  //  dd($request->request->all());
            //  $profilREcup=$data['profil'];
            //   $id= intval(substr($profilREcup, 19));   
        $profil=$this->profilRepo->findOneById($data['profil']);
       $profil_libelle = $profil->getLibelle();
    
       if($profil_libelle === "ADMIN"){
           $profil_libelle = "Administrateur";
           $user= new Administrateur();
       }elseif($profil_libelle=="Formateur"){
              $user = new Formateur();
       }elseif($profil_libelle=="CM"){
        $user = new CM();
 }
        
       
    //    $user=$this->serializer->denormalize($data,"App\Entity\\".$profil_libelle);
    //     dd($user);
    //     $user->setProfil($profil);
    
    //     $photo=$request->files->get("photo");
       
    //     if ($photo){
    //         $photoConverti = fopen($photo->getRealPath(),"rb");
    //         $user->setPhoto($photoConverti);
    //     }
    //     $plainPassword = $this->givePassword();
    //     $user->setPlainPassword($plainPassword);
    //     $encoded =$this->encoder->encodePassword($user, $plainPassword);
    //     $user->setPassword($encoded);

    //     $errors = $this->validator->validate($user);
    //     if ($errors){
    //         $errors=$this->serializer->serialize($errors,json);
    //         return $errors;
    //     }
    $user->setPrenom($data['prenom']);
    $user->setNom($data['nom']);
    $user->setEmail($data['email']);
    $user->setLogin($data['username']);
   // $user->setPhoto($data['prenom']);
    $user->setProfil($profil);
    $plainPassword = $this->givePassword();
    $user->setPlainPassword($plainPassword);
         $encoded =$this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        return $user;

   

    //   $user = $request->request->all();
    // //   if(!$user){
    // //       $user=$request->getContent();
    // //       if($request->get('photo'))
    // //       {
    // //           $user=json_decode($user,true);
    // //       }
    // //   }
    //   $profil = $this->serializer->denormalize($user["profil"],"App\Entity\Profil");
    //   $profil_libelle = $profil->getLibelle();
    //   $user=$this->serializer->denormalize($user, "App\Entity\\".$profil_libelle);
    //   $user->setRoles(['ROLE_'.$profil_libelle]);
    //   $plainPassword = $this->givePassword();
    //       $user->setPlainPassword($plainPassword);
    //       $encoded =$this->encoder->encodePassword($user, $plainPassword);
    //       $user->setPassword($encoded);
    //       $user->setLogin('MoussaLogin');
    //       $photo=$request->files->get("photo");
        
    //     if ($photo){
    //         $photoConverti = fopen($photo->getRealPath(),"rb");
    //         $user->setPhoto($photoConverti);
    //     }
             //     return $user;
            
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
                'Utilisez ce mot passe pour acceder a votre compte et puis le changer immediatement
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
    public function transformData($getContent){
        $array=[];
        $data=preg_split("/form-data; /",$getContent);
        // suprimer le premier element du tab
        unset($data[0]);
        foreach ($data as $value){
            //Enlever le retour chariot et le retour à la ligne
            $arraySecond= preg_split("/\r\n/",$value);
            array_pop($arraySecond);
            array_pop($arraySecond);
            $key = explode('"',$arraySecond[0]);
            $key=$key[1];
            $array[$key]= end($arraySecond);

        }
            return $array;
    }
}

