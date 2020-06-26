<?php

namespace App\Repository;

use App\Entity\PlaceEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlaceEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlaceEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlaceEvent[]    findAll()
 * @method PlaceEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaceEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlaceEvent::class);
    }

    // /**
    //  * @return PlaceEvent[] Returns an array of PlaceEvent objects
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
    public function findOneBySomeField($value): ?PlaceEvent
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
