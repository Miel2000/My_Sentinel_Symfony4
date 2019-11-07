<?php

namespace App\Repository;

use App\Entity\RDureeContrat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RDureeContrat|null find($id, $lockMode = null, $lockVersion = null)
 * @method RDureeContrat|null findOneBy(array $criteria, array $orderBy = null)
 * @method RDureeContrat[]    findAll()
 * @method RDureeContrat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RDureeContratRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RDureeContrat::class);
    }

    // /**
    //  * @return RDureeContrat[] Returns an array of RDureeContrat objects
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
    public function findOneBySomeField($value): ?RDureeContrat
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
