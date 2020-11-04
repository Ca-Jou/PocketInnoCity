<?php
namespace App\Backstage;

use App\Backstage\Modules\Connection\ConnectionController;
use Framework\Application;

class BackstageApplication extends Application
{
    public function __construct()
    {
        parent::__construct();
        $this->name = 'Backstage';
    }

    public function run()
    {
        if ($this->visitor->isAuthenticated())
        {
            $controller = $this->getController();
        }
        else
        {
            $controller = new ConnectionController($this, 'Connection', 'signin');
        }

        $controller->execute();

        $this->httpResponse->setPage($controller->page());
        $this->httpResponse->send();
    }
}