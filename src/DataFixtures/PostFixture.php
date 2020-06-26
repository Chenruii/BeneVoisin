<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = $this->getReference('user-1');

        $post1 = new Post();
        $post1->setTitlePost("titlePost");
        $post1->setDescriptionPost("descriptionPost");
        $post1->setAnnouncer($user1);
        $post1->setContact("test@test.com");
        $post1->setDateEvent(new \DateTime("2020-06-29 15:34:18"));
        $post1->setPlaceEvent("$placeEvent1");
        $post1->setPostType("share");
        $manager->persist($post1);

        $post2 = new Post();
        $post2->setTitlePost("titlePost");
        $post2->setDescriptionPost("descriptionPost");
        $post2->setAnnouncer($user1);
        $post2->setContact("0707979797");
        $post2->setDateEvent(new \DateTime("2020-07-12 15:34:18"));
        $post2->setPlaceEvent("$placeEvent1");
        $post2->setPostType("discover");
        $manager->persist($post2);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
