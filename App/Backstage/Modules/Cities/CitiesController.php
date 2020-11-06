<?php
namespace App\Backstage\Modules\Cities;

use Framework\BackController;
use Framework\HTTPRequest;

class CitiesController extends BackController
{
    public function executeSubscribe(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Subscribe');

        $userID = $this->app()->visitor()->getAttribute('userID');
        $cityID = htmlspecialchars($request->getData('cityID'));

        $subsManager = $this->managers->getManagerOf('Subscriptions');
        $newSubscription = $subsManager->add($userID, $cityID);

        $this->app->httpResponse()->redirect('/auth/cities.php');
        $this->page->addVar('newSubscription', $newSubscription); // vaut true si la souscription a fonctionné, false sinon
    }

    public function executeUnsubscribe(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Subscribe');

        $userID = $this->app()->visitor()->getAttribute('userID');
        $cityID = htmlspecialchars($request->getData('cityID'));

        $subsManager = $this->managers->getManagerOf('Subscriptions');
        $supprSubscription = $subsManager->delete($userID, $cityID);

        $this->app->httpResponse()->redirect('/auth/cities.php');
        $this->page->addVar('supprSubscription', $supprSubscription); // vaut true si la souscription a été supprimée, false sinon
    }

}