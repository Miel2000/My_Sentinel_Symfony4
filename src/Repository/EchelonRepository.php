<?php

namespace App\Repository;

use App\Entity\Echelon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Echelon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Echelon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Echelon[]    findAll()
 * @method Echelon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EchelonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Echelon::class);
    }

    // /**
    //  * @return Echelon[] Returns an array of Echelon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Echelon
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
