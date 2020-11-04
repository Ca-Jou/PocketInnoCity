<?php
namespace App\Backstage\Modules\Connection;

use Framework\BackController;
use Framework\HTTPRequest;

class ConnectionController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Sign in');

        if ($request->postExists('login'))
        {
            $login = $request->postData('login');
            $password = $request->postData('password');

            $manager = $this->managers->getManagerOf('Users');
            $user = $manager->getUser($login);

            if (isset($user) && $password == $user->password())
            {
                $this->app->visitor()->setAuthenticated(true);
                $this->app->httpResponse()->redirect('.');
            }
            else
            {
                $this->app->visitor()->setFlash('Invalid username or password.');
            }
        }
    }
}