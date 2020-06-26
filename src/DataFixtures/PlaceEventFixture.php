<?php

namespace App\DataFixtures;

use App\Entity\PlaceEvent;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PlaceEventFixtures extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $placeEvent1 = new PlaceEvent();
        $placeEvent1->setDistrictPlaceEvent("Vaugirad");
        $placeEvent1->setLabelPlaceEvent("246 rue de la convention");
        $placeEvent1->setCityPlaceEvent("PARIS");
        $placeEvent1->setZipCodePlaceEvent("75015");
        $placeEvent1->setCountryPlaceEvent("France");
        $manager->persist($placeEvent1);
        $manager->flush();
        $this->addReference('placeEvent-1', $placeEvent1);


        $placeEvent2 = new PlaceEvent();
        $placeEvent2->setDistrictPlaceEvent("Canal en vue");
        $placeEvent2->setLabelPlaceEvent("45 rue de paris");
        $placeEvent2->setCityPlaceEvent("Noisy le sec");
        $placeEvent2->setZipCodePlaceEvent("93320");
        $placeEvent2->setCountryPlaceEvent("France");
        $manager->persist($placeEvent2);
        $manager->flush();
        $this->addReference('placeEvent-2', $placeEvent2);

    }

    public function getOrder()
    {
        return 5;
    }
}
