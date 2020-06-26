<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PlaceEventController extends AbstractController
{
    /**
     * @Route("/place/event", name="place_event")
     */
    public function index()
    {
        return $this->render('place_event/index.html.twig', [
            'controller_name' => 'PlaceEventController',
        ]);
    }
}
