<?php

namespace App\Controller;

use App\Entity\PlaceEvent;
use App\Form\PlaceEventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @Route("/new", name="placeEvent_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $placeEvent = new PlaceEvent();
        $form = $this->createForm(placeEventType::class, $placeEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($placeEvent);
            $entityManager->flush();

            return $this->redirectToRoute('placeEvent_index');
        }

        return $this->render('placeEvent/new.html.twig', [
            'placeEvent' => $placeEvent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="placeEvent_show", methods={"GET"})
     */
    public function show(placeEvent $placeEvent): Response
    {
        return $this->render('placeEvent/show.html.twig', [
            'placeEvent' => $placeEvent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="placeEvent_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PlaceEvent $placeEvent): Response
    {
        $form = $this->createForm(PlaceEventType::class, $placeEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('placeEvent_index');
        }

        return $this->render('placeEvent/edit.html.twig', [
            'placeEvent' => $placeEvent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="placeEvent_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PlaceEvent $placeEvent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$placeEvent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($placeEvent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('placeEvent_index');
    }
}
