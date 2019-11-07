<?php

namespace App\Repository;

use App\Entity\RSituationFamilliale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RSituationFamilliale|null find($id, $lockMode = null, $lockVersion = null)
 * @method RSituationFamilliale|null findOneBy(array $criteria, array $orderBy = null)
 * @method RSituationFamilliale[]    findAll()
 * @method RSituationFamilliale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RSituationFamillialeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RSituationFamilliale::class);
    }

    // /**
    //  * @return RSituationFamilliale[] Returns an array of RSituationFamilliale objects
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
    public function findOneBySomeField($value): ?RSituationFamilliale
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
