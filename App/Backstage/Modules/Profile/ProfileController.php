<?php
namespace App\Backstage\Modules\Connection;

use Framework\BackController;
use Framework\HTTPRequest;

class ConnectionController extends BackController
{
    public function executeShowProfile(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Mon Profil');
        // TODO: implement showProfile action
    }
}