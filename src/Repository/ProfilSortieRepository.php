<?php

namespace App\Repository;

use App\Entity\ProfilSortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProfilSortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilSortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilSortie[]    findAll()
 * @method ProfilSortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilSortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilSortie::class);
    }

    // /**
    //  * @return ProfilSortieFixtures[] Returns an array of ProfilSortieFixtures objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProfilSortieFixtures
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
