<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ThemeFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $theme1 = new Theme();
        $theme1->setTitleTheme("Cuisine");
        $theme1->setDescriptionTheme("cuisine  du monde");
        $manager->persist($theme1);

        $theme2 = new Theme();
        $theme2->setTitleTheme("Quotidien");
        $theme2->setDescriptionTheme("bricolage");
        $manager->persist($theme2);

        $manager->flush();

    }

    public function getOrder()
    {
        return 3;
    }
}
