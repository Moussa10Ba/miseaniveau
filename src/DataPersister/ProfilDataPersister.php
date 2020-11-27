<?php
namespace App\DataPersister;

use App\Entity\Profil;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

final class ProfilDataPersister implements ContextAwareDataPersisterInterface
{
  private $em;
  public function __construct(EntityManagerInterface $em){
    $this->em=$em;
  }
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Profil;
    }

    public function persist($data, array $context = [])
    {
      // call your persistence layer to save $data
      return $data;
    }

    public function remove($data, array $context = [])
    {
      // call your persistence layer to delete $data
      
      $data->setArchive(true);
      foreach ($data->getUtilisateurs() as $user){
          $user->setArchive(true);
      }
      $this->em->persist($data);
      $this->em->flush();

    }
}