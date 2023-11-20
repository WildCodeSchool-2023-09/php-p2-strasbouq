<?php

namespace App\Controller;

use App\Model\UserManager;
use App\Controller\VerifyController;
use App\Controller\AbstractController;

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
                $userManager = new UserManager();
                $userConnection = $userManager->selectOneByEmail($formLog['email']);
                if ($userConnection && password_verify($formLog['password'], $userConnection['password'])) {
                    $_SESSION['userId'] = $userConnection['userId'];
                    $_SESSION['isLoggin'] = true;
                    $_SESSION['isAdmin'] = $userConnection['isAdmin'];
                    header('Location:/');
                }
            }
        }
        return $this->twig->render('Home/login.html.twig', ['errors' => $errors]);
    }

    public function logout()
    {
        unset($_SESSION['isLoggin']);
        unset($_SESSION['isAdmin']);
        unset($_SESSION['userId']);
        header('Location:/');
    }

    public function loginValidate(array $formLogin): array
    {
        $verifyController = new VerifyController();
        $errors = [];

        $errors['email'] = $verifyController->verifyCommun($formLogin['email']);
        $errors['password'] = $verifyController->verifyCommun($formLogin['password']);
        $errors = array_filter($errors);
        return $errors;
    }
}
