<?php

    namespace App\Controller;

    use App\Repository\UserRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    /**
     * @property UserPasswordEncoderInterface passwordEncoder
     * @Route("/admin")
     */
    class AdminController extends AbstractController
    {
        /**
         * @var UserPasswordEncoderInterface
         */
        private $passwordEncoder;

        /**
         * @Route("/dashboard", name="admin_dashboard")
         * @param UserRepository $userRepository
         * @return Response
         */
        public function dashboard(UserRepository $userRepository)
        {
            $users = $userRepository->findAll();
            return $this->render( 'admin/dashboard.html.twig', [
                'users' => $users
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
}