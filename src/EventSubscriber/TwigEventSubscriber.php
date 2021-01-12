<?php

namespace App\EventSubscriber;

use App\Repository\CityRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{

    private $twig;
    private $cityRepository;

    public function __construct(Environment $twig, CityRepository $cityRepository)
    {
        $this->twig = $twig;
        $this->cityRepository = $cityRepository;
    }

    public function onKernelController(ControllerEvent $event)
    {
        $this->twig->addGlobal('global', $this->cityRepository->findBy(['name' => 'Global'])[0]);
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}
