<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Controller\VerifyController;
use App\Model\UserManager;

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
            if (empty($errors)) {
                $userManager = new UserManager;
                $userConnection = $userManager->selectOneById($id);
                if ($userConnection['email'] === $formLog['email'] && verify_password($userConnection['password']) === $formLog['password']) 
                {
                    $_SESSION['userId'] = $userConnection['userId'];
                    var_dump($_SESSION);
                }
            }
        }
        return $this->twig->render('Home/login.html.twig', ['errors' => $errors]);
    }

    public function loginValidate(array $formLogin): array
    {
        $verifyController = new VerifyController();

       // est ce qu'on a un résultat
        // un seul résultat

        $errors = [];

        $errors['email'] = $verifyController->verifyCommun($formLogin['email']);
        $errors['password'] = $verifyController->verifyCommun($formLogin['password']);
        $errors = array_filter($errors);
        return $errors;
    }
}
