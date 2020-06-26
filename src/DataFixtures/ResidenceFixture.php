<?php

namespace App\DataFixtures;

use App\Entity\Residence;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResidenceFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = $this->getReference('user-1');

        $residence1 = new Residence();
        $residence1->setTrackNumber("12");
        $residence1->setTrack("rue ");
        $residence1->setHall("A");
        $residence1->setCity($user1);
        $residence1->setZipCode("93220");
        $manager->persist($residence1);

        $residence2 = new Residence();
        $residence2->setTrackNumber("232");
        $residence2->setTrack("boulevard");
        $residence2->setHall("B");
        $residence2->setCity($user1);
        $residence2->setZipCode("75014");
        $manager->persist($residence2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}
