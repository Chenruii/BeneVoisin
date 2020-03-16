<?php

namespace App\Repository;

use App\Entity\DatePost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DatePost|null find($id, $lockMode = null, $lockVersion = null)
 * @method DatePost|null findOneBy(array $criteria, array $orderBy = null)
 * @method DatePost[]    findAll()
 * @method DatePost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatePostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DatePost::class);
    }

    // /**
    //  * @return DatePost[] Returns an array of DatePost objects
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
    public function findOneBySomeField($value): ?DatePost
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
