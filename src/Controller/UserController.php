<?php

namespace App\Controller;

class UserController extends AbstractController
{
    public function signup(): string
    {
        return $this->twig->render('Home/signup.html.twig');
    }
}
