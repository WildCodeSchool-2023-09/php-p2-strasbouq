<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Controller\VerifyController;

class LoginController extends AbstractController
{
    public function login(): string
    {
        $errors = [];
        //Vérification du formulaire (rempli ou pas), si oui on enleve les
        //espaces et on place le $_Post dans une nouvelle variable
        if (!empty($_POST)) {
            $formLog = array_map('trim', $_POST);
            $errors = $this->loginValidate($formLog);
        }
        return $this->twig->render('Home/login.html.twig', ['errors' => $errors]);
    }

    public function loginValidate(array $formLogin): array
    {
        $verifyController = new VerifyController();

        $errors = [];

        $errors['email'] = $verifyController->verifyCommun($formLogin['email']);
        $errors['password'] = $verifyController->verifyCommun($formLogin['password']);
        return $errors;
    }
}
