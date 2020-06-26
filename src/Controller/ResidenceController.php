<?php

namespace App\Controller;

use App\Entity\Residence;
use App\Form\ResidenceType;
use App\Repository\ResidenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/residence")
 */
class ResidenceController extends AbstractController
{
	/**
	 * @Route("/", name="residence_index", methods={"GET"})
	 * @param ResidenceRepository $residenceRepository
	 * @return Response
	 */
    public function index(ResidenceRepository $residenceRepository): Response
    {
        return $this->render('residence/index.html.twig', [
            'residences' => $residenceRepository->findAll(),
        ]);
    }

	/**
	 * @Route("/new", name="residence_new", methods={"GET","POST"})
	 * @param Request $request
	 * @return Response
	 */
    public function new(Request $request): Response
    {
        $residence = new Residence();
        $form = $this->createForm(ResidenceType::class, $residence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($residence);
            $entityManager->flush();

            return $this->redirectToRoute('residence_index');
        }

        return $this->render('residence/new.html.twig', [
            'residence' => $residence,
            'form' => $form->createView(),
        ]);
    }

	/**
	 * @Route("/{id}", name="residence_show", methods={"GET"})
	 * @param Residence $residence
	 * @return Response
	 */
    public function show(Residence $residence): Response
    {
        return $this->render('residence/show.html.twig', [
            'residence' => $residence,
        ]);
    }

	/**
	 * @Route("/{id}/edit", name="residence_edit", methods={"GET","POST"})
	 * @param Request $request
	 * @param Residence $residence
	 * @return Response
	 */
    public function edit(Request $request, Residence $residence): Response
    {
        $form = $this->createForm(ResidenceType::class, $residence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('residence_index');
        }

        return $this->render('residence/edit.html.twig', [
            'residence' => $residence,
            'form' => $form->createView(),
        ]);
    }

	/**
	 * @Route("/{id}", name="residence_delete", methods={"DELETE"})
	 * @param Request $request
	 * @param Residence $residence
	 * @return Response
	 */
    public function delete(Request $request, Residence $residence): Response
    {
        if ($this->isCsrfTokenValid('delete'.$residence->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($residence);
            $entityManager->flush();
        }

        return $this->redirectToRoute('residence_index');
    }
}
