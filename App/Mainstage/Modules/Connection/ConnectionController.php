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

        if ($request->method() == 'POST')
        {
            $pseudo = htmlspecialchars($request->postData('pseudo'));
            $mail = htmlspecialchars($request->postData('mail'));
            $city = ucfirst(htmlspecialchars($request->postData('city')));
            $password = htmlspecialchars($request->postData('password'));

            if (strlen($password) < 8)
            {
                $this->app->visitor()->setFlash('Invalid password. Password should contain at least 8 characters.');
            }

            $cityManager = $this->managers->getManagerOf('Cities');
            $cityID = $cityManager->getID($city);

            if (!isset($cityID))
            {
                $this->app->visitor()->setFlash('Votre ville n\'est pas inscrite sur PocketInnoCity ! Vous ne pourrez pas lui soumettre vos idées.');
                $cityID = 1;
            }

            $hashedPassword = hash('sha256', $password);

            $user = new User([
                'pseudo' => $pseudo,
                'mail' => $mail,
                'city' => $cityID,
                'password' => $hashedPassword
            ]);

            if (!$user->isValid())
            {
                $this->app->visitor()->setFlash('Please fill all fields.');
            }

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
                $this->app->visitor()->setFlash('Your account was properly created!');
                $this->app->visitor()->setAuthenticated(true);
            }
        }
    }
}