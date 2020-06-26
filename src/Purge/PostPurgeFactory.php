<?php

namespace App\Purger;
// ...
use Doctrine\Common\DataFixtures\Purger\PurgerInterface;
use Doctrine\ORM\EntityManagerInterface;

class PostPurgeFactory implements PurgerFactory
{
    public function createForEntityManager(?string $emName, EntityManagerInterface $em, array $excluded = [], bool $purgeWithTruncate = false) : PurgerInterface
    {
        return new PostPurger($em);
    }
}