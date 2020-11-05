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

    public function executeSignup(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Inscription');

        $pseudo = $request->postData('pseudo');
        $mail = $request->postData('mail');
        $city = ucfirst($request->postData('city'));
        $password = hash('sha256', $request->postData('password'));

        if (!isset($pseudo) || empty($pseudo))
        {
            $this->app->visitor()->setFlash('Username is required.');
        }
        elseif (!isset($mail) || empty($mail))
        {
            $this->app->visitor()->setFlash('Mail address is required.');
        }
        elseif (!isset($city) || empty($city))
        {
            $this->app->visitor()->setFlash('City is required.');
        }
        elseif (!isset($password) || empty($password) || strlen($password) < 8)
        {
            $this->app->visitor()->setFlash('Invalid password. Password should contain at least 8 characters.');
        }
        else
        {
            $cityManager = $this->managers->getManagerOf('Cities');
            $cityID = $cityManager->getID($city);

            $user = new User([
                'pseudo' => $pseudo,
                'mail' => $mail,
                'city' => $cityID,
                'password' => $password
            ]);

            $userManager = $this->managers->getManagerOf('Users');
            $existing = $userManager->getUserByPseudo($pseudo);

            if (isset($existing))
            {
                $this->app->visitor()->setFlash('This pseudo is not available, sorry !');
                $this->app->visitor()->setAuthenticated(false);
                $this->app->httpResponse()->redirect('/signup/');
            }
            else
            {
                $userManager->add($user);
                $user = $userManager->getUserByPseudo($pseudo);
                $this->app->visitor()->setFlash('Your account was properly created!');
                $this->app->visitor()->setAuthenticated(true);
                header('Refresh:3; url=/auth/');
            }
        }
    }

    public function executeSignout(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Déconnexion');

        $this->app->visitor()->setAuthenticated(false);
        $this->app->visitor()->setFlash('Vous avez été déconnecté. Vous allez être redirigé vers l\'accueil.');

        header('Refresh:3; url=/');
    }
}