<?php

namespace App\Purger;

use Doctrine\Common\DataFixtures\Purger\PurgerInterface;

// ...
class PostPurger implements PurgerInterface
{
    public function purge() : void
    {
        // ...
    }

}