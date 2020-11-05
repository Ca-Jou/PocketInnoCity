<?php
namespace App\Mainstage\Modules\Connection;

use Entity\User;
use Framework\BackController;
use Framework\HTTPRequest;

class ConnectionController extends BackController
{
    public function executeSignup(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Inscription');

        $pseudo = $request->postData('pseudo');
        $mail = $request->postData('mail');
        $city = ucfirst($request->postData('city'));
        $password = $request->postData('password');

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
            $hashedPassword = hash('sha256', $password);

            $cityManager = $this->managers->getManagerOf('Cities');
            $cityID = $cityManager->getID($city);

            if (!isset($cityID))
            {
                $this->app->visitor()->setFlash('Votre ville n\'est pas inscrite sur PocketInnoCity ! Vous ne pourrez pas lui soumettre vos idées.');
                $cityID = 1;
            }

            $user = new User([
                'pseudo' => $pseudo,
                'mail' => $mail,
                'city' => $cityID,
                'password' => $hashedPassword
            ]);

            $userManager = $this->managers->getManagerOf('Users');
            $existing = $userManager->getUserByPseudo($pseudo);

            if (isset($existing))
            {
                $this->app->visitor()->setFlash('This pseudo is not available, sorry !');
                $this->app->visitor()->setAuthenticated(false);
            }
            else
            {
                $userManager->add($user);
                $user = $userManager->getUserByPseudo($pseudo);
                $this->app->visitor()->setFlash('Your account was properly created!');
                $this->app->visitor()->setAuthenticated(true);
            }
        }
    }
}