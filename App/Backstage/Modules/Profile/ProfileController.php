<?php
namespace App\Backstage\Modules\Profile;

use Framework\BackController;
use Framework\HTTPRequest;

class ProfileController extends BackController
{
    public function executeShowProfile(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Mon Profil');
        $userID = $this->app()->visitor()->getAttribute('userID');

        $usersManager = $this->managers->getManagerOf('Users');
        $user = $usersManager->getUserById($userID);
        $cityID = $user->city();

        $ideasManager = $this->managers->getManagerOf('Ideas');
        $userIdeas = $ideasManager->getUserList($userID);

        $citiesManager = $this->managers->getManagerOf('Cities');
        $city = $citiesManager->getCity($cityID);
        $userSubs = $citiesManager->getUserCities($userID);

        $this->page->addVar('user', $user);
        $this->page->addVar('city', $city);
        $this->page->addVar('userSubs', $userSubs);
        $this->page->addVar('userIdeas', $userIdeas);
    }
}