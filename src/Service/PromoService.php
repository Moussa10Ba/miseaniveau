<?php
namespace App\Service;


use App\Entity\Apprenant;
use App\Repository\PromoRepository;
use App\Repository\ProfilRepository;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PromoService{

    private $serializer;
    private $manager;
    public function __construct( SerializerInterface $serializer, EntityManagerInterface $manager,ProfilRepository $repoProfil,UserPasswordEncoderInterface $encoder ){
        $this->serializer = $serializer;
        $this->manager = $manager;
        $this->repoProfil= $repoProfil;
        $this->encoder=$encoder;

    }

    public function createPromo(Request $request){

        $promo = $request->request->all();
        //return new JsonResponse($referentiel, 400);
        
        // $data= json_decode($request->getContent(), true); 
        $avatar = $request->files->get("avatar");
        if($avatar){
            $avatar = fopen($avatar->getRealPath(),"rb");
            $promo["avatar"]=$avatar;
        }
        
        $promo = $this->serializer->denormalize($promo, "App\\Entity\\Promo");
        if($request->files->get('excelFile')){
            
            //----------------------------------------------------
            //DEBUT RECUPERATION DES DONNEES DU FICHIERS EXCELS
            //-----------------------------------------------------
            $doc = $request->files->get("excelFile");

            $file= IOFactory::identify($doc);
            $reader= IOFactory::createReader($file);
            $spreadsheet=$reader->load($doc);
    
            $tab_apprenants= $spreadsheet->getActivesheet()->toArray();   
            $waited_Array=['prenom','nom','email','username','password'];
            $attr=$tab_apprenants[0];
    
            $valide_excel= true;
            foreach($waited_Array as $element){
                if (!in_array($element, $attr)) {
                    $valide_excel= false;
                    break;
                }
            }
            if($valide_excel){
                $profil = $this->repoProfil->findOneByLibelle(['Apprenant']);
                for($i=1;$i<count($tab_apprenants);$i++)
                {
                    $apprenant = new Apprenant();
                    for($k=0;$k<count($tab_apprenants[$i]);$k++)
                    {
                        $data=$tab_apprenants[$i][$k];
                        if($attr[$k]=="password")
                        {
                             $apprenant->setPassword($this->encoder->encodePassword($apprenant,$data));
                        }else
                        {
                        $apprenant->{"set".ucfirst($attr[$k])}($data);
                        }
                    }
                    $apprenant->setProfil($profil);
                    $apprenant->setArchive(false);
                    $apprenant->setStatus('attente');
                    $this->manager->persist($apprenant);
                    // $group_princicpal->addApprenant($apprenant);
                    $promo->addApprennant($apprenant);

                }
                $this->manager->persist($promo);
                $this->manager->flush();
               // return $this->json(['message'=>'Promo Ajoutée avec success','promo'=>$promo],200);
                }else{
                     return $promo;
                }

                    

       
        
    }

}
}
