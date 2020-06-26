<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture implements FixtureGroupInterface, OrderedFixtureInterface
{
    public const ADMIN_USER_REFERENCE = 'admin-user';

    public function load(ObjectManager $manager)
    {
        $user = new User('rui.chen1996@mail.com', 'pass_1234');
        $user->setFirstname("CHEN");
        $user->setLastname("Rui");
        $user->setEmail("rui.chen1996@mail.com");
        $manager->persist($user);
        $manager->flush();

        $this->addReference(self::ADMIN_USER_REFERENCE, $user);
    }

    public function getOrder()
    {
        return 1;
    }

    public static function getGroups(): array
    {
        return ['group1', 'group2'];
    }

}
