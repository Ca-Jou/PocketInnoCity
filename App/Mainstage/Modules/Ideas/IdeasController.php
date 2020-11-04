<?php
namespace App\Mainstage\Modules\Ideas;

use Framework\BackController;
use Framework\HTTPRequest;

class IdeasController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $nbIdeas = $this->app->config()->get('number_of_ideas');

        $this->page->addVar('title', 'Global '.$nbIdeas.' most liked ideas !');

        $manager = $this->managers->getManagerOf('Ideas');

        $ideasList = $manager->getList(0, $nbIdeas);

        $this->page->addVar('ideasList', $ideasList);
    }
}