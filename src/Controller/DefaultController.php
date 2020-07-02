<?php

namespace App\Controller;

use App\Entity\Residence;
use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\ThemeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;


class DefaultController extends AbstractController
{
	/**
	 * @Route("/home", name="home")
	 * @param PostRepository $postRepository
	 * @param ThemeRepository $themeRepository
	 * @return Response
	 */
    public function index(PostRepository $postRepository, ThemeRepository $themeRepository)
    {
		$posts = $postRepository->findAll();
		$themes = $themeRepository->findAll();

		return $this->render('default/index.html.twig', [
			'posts' => $posts,
			'themes' => $themes,
		]);
    }

	/**
	 * @Route("/recherche", name="search")
	 * @param Request $request
	 * @param PostRepository $repo
	 * @param PaginatorInterface $paginator
	 * @return Response
	 */
	public function recherche(Request $request, PostRepository $repo, PaginatorInterface $paginator) {

		$searchForm = $this->createForm(SearchType::class);
		$searchForm->handleRequest($request);
		$donnees = $repo->findAll();
		if ($searchForm->isSubmitted() && $searchForm->isValid()) {
			$titlePost = $searchForm->getData()->getTitlePost();
			$donnees = $repo->search($titlePost);
			if ($donnees == null) {
				$this->addFlash('erreur', 'Aucune annonce contenant ce mot clé dans le titre n\'a été trouvée, essayez en un autre.');
			}
		}

		// Paginate the results of the query
		$posts = $paginator->paginate(
		// Doctrine Query, not results
			$donnees,
			// Define the page parameter
			$request->query->getInt('page', 1),
			// Items per page
			4
		);

		return $this->render('biblio/search.html.twig',[
			'posts' => $posts,
			'searchForm' => $searchForm->createView()
		]);
	}

    /**
     * @Route("/contactForm", name="contact")
     */
    public function contact()
    {
        return $this->render('default/contact.html.twig', [
        ]);
    }

    /**
     * @Route("/mentionsLegales", name="mentions")
     */
    public function mentions()
    {
        return $this->render('default/mentions.html.twig', [
        ]);
    }
}
