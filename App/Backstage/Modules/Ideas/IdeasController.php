<?php
namespace App\Backstage\Modules\Ideas;

use Entity\Idea;
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
        $userSuggestions = $citiesManager->getUserSuggestions($userID);

        $this->page->addVar('title', 'PIC - Mes villes');
        $this->page->addVar('userCities', $userCities);
        $this->page->addVar('userSuggestions', $userSuggestions);
    }

    public function executeSubmit(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Partager');
        $userID = $this->app()->visitor()->getAttribute('userID');

        $citiesManager = $this->managers->getManagerOf('Cities');
        $citiesList = $citiesManager->getUserCities($userID);
        $this->page->addVar('citiesList', $citiesList);

        if ($request->method() == 'POST')
        {
            $idea = new Idea([
                'author' => $userID,
                'title' => $request->postData('title'),
                'content' => $request->postData('content'),
                'location' => $request->postData('location'),
                'city' => $request->postData('city')
            ]);

            if (!$idea->isValid())
            {
                $this->app->visitor()->setFlash('Please fill all required fields.');
            }
            else
            {
                $ideasManager = $this->managers->getManagerOf('Ideas');
                $ideasManager->add($idea);

                $this->app->visitor()->setFlash('Votre idée a bien été partagée !');
                $this->app->httpResponse()->redirect('/auth/profile.php');
            }
        }
    }
}