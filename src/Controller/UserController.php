<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Twig\Environment;

class UserController extends AbstractController
{
    private $twig;
    private $entityManager;

    public function __construct(Environment $twig, EntityManagerInterface $entityManager)
    {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/profile", name="profile")
     */
    public function index(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $city = $user->getCity();
        $subscriptions = $user->getSubscriptions()->toArray();
        $ideas = $user->getIdeas()->toArray();

        return new Response(
            $this->twig->render('user/index.html.twig'));
    }

    /**
     * @IsGranted("IS_ANONYMOUS")
     * @Route("/signup", name="signup")
     */
    public function signup(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(SignupFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $user->setPassword($passwordEncoder->encodePassword(
                $user,
                $user->getPassword()
            ));

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return new Response(
            $this->twig->render('user/submit.html.twig', [
                'user_form' => $form->createView()
            ]));
    }
}
