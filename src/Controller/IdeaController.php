<?php

namespace App\Controller;

use App\Entity\Idea;
use App\Entity\User;
use App\Form\IdeaFormType;
use App\Repository\IdeaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class IdeaController extends AbstractController
{
    private $twig;
    private $entityManager;
    private $ideaRepository;

    public function __construct(Environment $twig, EntityManagerInterface $entityManager, IdeaRepository $ideaRepository)
    {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
        $this->ideaRepository = $ideaRepository;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        return new Response(
            $this->twig->render('idea/index.html.twig', [
            'topIdeas' => $this->ideaRepository->findTop(5),
        ]));
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_REMEMBERED")
     * @Route("/like", name="like")
     */
    public function like(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $ID = $request->query->get('idea');
        $idea = $this->ideaRepository->find($ID);

        $user->addLike($idea);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return new Response(
            $this->twig->render('city/show.html.twig', [
                'city' => $idea->getCity(),
            ]));
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_REMEMBERED")
     * @Route("/unlike", name="unlike")
     */
    public function unlike(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $ID = $request->query->get('idea');
        $idea = $this->ideaRepository->find($ID);

        $user->removeLike($idea);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return new Response(
            $this->twig->render('city/show.html.twig', [
                'city' => $idea->getCity(),
            ]));
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_REMEMBERED")
     * @Route("/submit", name="submit")
     */
    public function submit(Request $request): Response
    {
        $idea = new Idea();
        $form = $this->createForm(IdeaFormType::class, $idea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            /** @var User $user */
            $user = $this->getUser();
            $idea->setAuthor($user);

            $this->entityManager->persist($idea);
            $this->entityManager->flush();

            return $this->redirectToRoute('city', ['city' => $idea->getCity()->getId()]);
        }

        return new Response(
            $this->twig->render('idea/submit.html.twig', [
                'idea_form' => $form->createView()
            ]));
    }
}
