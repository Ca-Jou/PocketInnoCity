<?php
namespace App\Backstage\Modules\Ideas;

use Framework\BackController;
use Framework\HTTPRequest;

class IdeasController extends BackController
{
    public function executeShow(HTTPRequest $request)
    {
        $cityID = $request->getData('cityID');

        $ideasManager = $this->managers->getManagerOf('Ideas');
        $cityIdeas = $ideasManager->getCityList($cityID);

        $citiesManager = $this->managers->getManagerOf('Cities');
        $city = $citiesManager->getCity($cityID);

        $this->page->addVar('title', 'PIC - '.$city->name());
        $this->page->addVar('cityIdeas', $cityIdeas);
        $this->page->addVar('city', $city);
    }

    public function executeCities(HTTPRequest $request)
    {
        $userID = $this->app()->visitor()->getAttribute('userID');

        $citiesManager = $this->managers->getManagerOf('Cities');
        $userCities = $citiesManager->getUserCities($userID);

        $this->page->addVar('title', 'PIC - Mes villes');
        $this->page->addVar('userCities', $userCities);
    }

    public function executeSubmit(HTTPRequest $request)
    {

    }
}