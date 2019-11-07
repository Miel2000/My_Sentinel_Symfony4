<?php

namespace App\Repository;

use App\Entity\Coeficient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Coeficient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coeficient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coeficient[]    findAll()
 * @method Coeficient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoeficientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coeficient::class);
    }

    // /**
    //  * @return Coeficient[] Returns an array of Coeficient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Coeficient
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
