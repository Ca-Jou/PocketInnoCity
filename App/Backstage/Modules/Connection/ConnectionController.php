<?php
namespace App\Backstage\Modules\Connection;

use Framework\BackController;
use Framework\HTTPRequest;

class ConnectionController extends BackController
{
    public function executeSignin(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Connexion');

        if ($request->postExists('login'))
        {
            $login = $request->postData('login');
            $password = $request->postData('password');

            $manager = $this->managers->getManagerOf('Users');
            $user = $manager->getUserByPseudo($login);

            if (isset($user) && hash('sha256',$password) === $user->password())
            {
                $this->app->visitor()->setAuthenticated(true);
                $this->app->visitor()->setAttribute('userID', $user->userID());
                $this->app->httpResponse()->redirect('/');
            }
            else
            {
                $this->app->visitor()->setFlash('Invalid username or password.');
            }
        }
    }

    public function executeSignout(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Déconnexion');

        $this->app->visitor()->setAuthenticated(false);
        $this->app->visitor()->setFlash('Vous avez été déconnecté.e.');

        $this->app->httpResponse()->redirect('/');
    }
}