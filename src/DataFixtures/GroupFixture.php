<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit\TextUI\Configuration\Group;

class GroupFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userGroup = new Group('administrators');
        // this reference returns the User object created in UserFixtures
        $userGroup->addUser($this->getReference(UserFixtures::ADMIN_USER_REFERENCE));

        $manager->persist($userGroup);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
