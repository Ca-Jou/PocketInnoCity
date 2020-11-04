<?php
namespace App\Mainstage;

use Framework\Application;

class MainstageApplication extends Application
{
    public function __construct()
    {
        parent::__construct();
        $this->name = 'Mainstage';
    }

    public function run()
    {
        $controller = $this->getController();
        $controller->execute();

        $this->httpResponse->setPage($controller->page());
        $this->httpResponse->send();
    }
}