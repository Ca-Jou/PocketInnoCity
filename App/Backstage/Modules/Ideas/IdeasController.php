<?php
namespace App\Backstage\Modules\Ideas;

use Entity\Idea;
use Framework\BackController;
use Framework\HTTPRequest;

class IdeasController extends BackController
{
    public function executeShow(HTTPRequest $request)
    {
        $userID = $this->app()->visitor()->getAttribute('userID');

        $userManager = $this->managers->getManagerOf('Users');
        $userLikes = $userManager->getUserLikes($userID);

        $cityID = htmlspecialchars($request->getData('cityID'));

        $ideasManager = $this->managers->getManagerOf('Ideas');
        $cityIdeas = $ideasManager->getCityList($cityID);

        $citiesManager = $this->managers->getManagerOf('Cities');
        $city = $citiesManager->getCity($cityID);

        $this->page->addVar('title', 'PIC - '.$city->name());
        $this->page->addVar('cityIdeas', $cityIdeas);
        $this->page->addVar('userLikes', $userLikes);
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
                'title' => htmlspecialchars($request->postData('title')),
                'content' => htmlspecialchars($request->postData('content')),
                'location' => htmlspecialchars($request->postData('location')),
                'city' => htmlspecialchars($request->postData('city'))
            ]);

            if (!$idea->isValid())
            {
                $this->app->visitor()->setFlash('Merci de remplir tous les champs obligatoires.');
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

    public function executeLike(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Like');

        $userID = $this->app()->visitor()->getAttribute('userID');
        $ideaID = htmlspecialchars($request->getData('ideaID'));
        $cityID = htmlspecialchars($request->getData('cityID'));

        $likesManager = $this->managers->getManagerOf('Likes');
        $like = $likesManager->add($userID, $ideaID);

        $this->app->httpResponse()->redirect('/auth/city-'.$cityID.'.php');
        $this->page->addVar('like', $like); // vaut true si le like a fonctionné, false sinon
    }

    public function executeUnlike(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Unlike');

        $userID = $this->app()->visitor()->getAttribute('userID');
        $ideaID = htmlspecialchars($request->getData('ideaID'));
        $cityID = htmlspecialchars($request->getData('cityID'));

        $likesManager = $this->managers->getManagerOf('Likes');
        $unlike = $likesManager->delete($userID, $ideaID);

        $this->app->httpResponse()->redirect('/auth/city-'.$cityID.'.php');
        $this->page->addVar('unlike', $unlike); // vaut true si le unlike a fonctionné, false sinon
    }
}