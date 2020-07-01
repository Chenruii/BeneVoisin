<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @property UserPasswordEncoderInterface passwordEncoder
 * @Route("/admin")
 */
class AdminController extends EasyAdminController
{
<<<<<<< HEAD
	/**
	 * @var UserPasswordEncoderInterface
	 */
	private $passwordEncoder;

	/**
	 * @Route("/dashboard", name="admin_dashboard", methods={"GET","HEAD"})
	 * @param UserRepository $userRepository
	 * @return Response
	 */
	public function dashboard(UserRepository $userRepository)
	{
		$users = $userRepository->findAll();
		return $this->render( 'admin/dashboard.html.twig', [
			'users' => $users,
		] );
	}

	/**
	 * UserController constructor.
	 *
	 * @param UserPasswordEncoderInterface $passwordEncoder
	 */
	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;
	}

	public function persistEntity($entity)
	{
		$this->encodePassword( $entity );
		parent::persistEntity( $entity );
	}

	public function updateEntity($entity)
	{
		$this->encodePassword( $entity );
		parent::updateEntity( $entity );
	}

	public function encodePassword($user)
	{
		if (!$user instanceof User) {
			return;
		}

		$user->setPassword(
			$this->passwordEncoder->encodePassword( $user, $user->getPassword() )
		);
	}
=======
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @Route("/dashboard", name="admin_dashboard", methods={"GET","HEAD"})
     * @param UserRepository $userRepository
     * @return Response
     */
    public function dashboard(UserRepository $userRepository)
    {
        $users = $userRepository->findAll();
        return $this->render( 'admin/dashboard.html.twig', [
            'users' => $users,
        ] );
    }

    /**
     * UserController constructor.
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function persistEntity($entity)
    {
        $this->encodePassword( $entity );
        parent::persistEntity( $entity );
    }

    public function updateEntity($entity)
    {
        $this->encodePassword( $entity );
        parent::updateEntity( $entity );
    }

    public function encodePassword($user)
    {
        if (!$user instanceof User) {
            return;
        }

        $user->setPassword(
            $this->passwordEncoder->encodePassword( $user, $user->getPassword() )
        );
    }
>>>>>>> fb3156ed45a27728f034f384076405be44609394
}