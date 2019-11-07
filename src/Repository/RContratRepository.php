<?php

namespace App\Repository;

use App\Entity\RContrat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RContrat|null find($id, $lockMode = null, $lockVersion = null)
 * @method RContrat|null findOneBy(array $criteria, array $orderBy = null)
 * @method RContrat[]    findAll()
 * @method RContrat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RContratRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RContrat::class);
    }

    // /**
    //  * @return RContrat[] Returns an array of RContrat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RContrat
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
