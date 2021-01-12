<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Require login for *every* controller method in this class.
 *
 * @IsGranted("IS_AUTHENTICATED_REMEMBERED")
 */
class CityController extends AbstractController
{
    private $twig;
    private $entityManager;
    private $cityRepository;

    public function __construct(Environment $twig, EntityManagerInterface $entityManager, CityRepository $cityRepository)
    {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
        $this->cityRepository = $cityRepository;
    }

    /**
     * @Route("/cities", name="cities")
     */
    public function index(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $cities = $this->cityRepository->findAll();
        $subscriptions = $user->getSubscriptions()->toArray();
        $suggestions = [];
        foreach ($cities as $city)
        {
            if (!in_array($city, $subscriptions))
            {
                $suggestions[] = $city;
            }
        }

        return new Response(
            $this->twig->render('city/index.html.twig', [
                'userCities' => $subscriptions,
                'userSuggestions' => $suggestions
            ]));
    }

    /**
     * @Route("/subscribe", name="subscribe")
     */
    public function subscribe(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $cityID = $request->query->get('city');

        $user->addSubscription($this->cityRepository->find($cityID));
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->index($request);
    }

    /**
     * @Route("/unsubscribe", name="unsubscribe")
     */
    public function unsubscribe(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $cityID = $request->query->get('city');

        $user->removeSubscription($this->cityRepository->find($cityID));
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->index($request);
    }

    /**
     * @Route("/city", name="city")
     */
    public function show(Request $request): Response
    {
        $cityID = $request->query->get('city');

        return new Response(
            $this->twig->render('city/show.html.twig', [
                'city' => $this->cityRepository->find($cityID),
            ]));
    }

}
