<?php

namespace App\Repository;

use App\Entity\DateAnnonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DateAnnonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateAnnonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateAnnonce[]    findAll()
 * @method DateAnnonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateAnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateAnnonce::class);
    }

    // /**
    //  * @return DateAnnonce[] Returns an array of DateAnnonce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DateAnnonce
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
