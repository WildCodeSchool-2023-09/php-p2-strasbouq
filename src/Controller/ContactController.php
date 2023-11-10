<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ContactManager;
use App\Controller\VerifyController;

class ContactController extends AbstractController
{
    public function addContact(): string
    {
        $errors = [];
        //Vérification du du formulaire (rempli ou pas) si oui on enleve les
        //espaces et on la place dans une nouvelle variable
        if (!empty($_POST)) {
            $form = array_map('trim', $_POST);
            $errors = $this->validate($form);
            //Si le formulaire n'a pas d'erreurs qui sont stockés dans la
            //variable $errors, alors il fait appele a la methode insert
            //de UserManager qui envoie les données dans la BDD
            if (empty($errors)) {
                $contactManager = new ContactManager();
                $contactManager->insert($form);
                //Si les étapes du dessus sont validées, on est envoyés a l'accueil
                header('Location:/');
            }
        }

        return $this->twig->render('Home/contact.html.twig', ['errors' => $errors]);
    }

    public function validate(array $formContact): array
    {
        $verifyController = new VerifyController();

        $errors = [];

        $errors['name'] = $verifyController->verifyCommun($formContact['name']);
        $errors['email'] = $verifyController->verifyCommun($formContact['email']);
        $errors['text'] = $verifyController->verifyCommun($formContact['text']);
        $errors['emailFormat'] = $verifyController->verifyEmail($formContact['email']);

        //on verifie si le nombre decaracteres est en dessous de 200
        if (mb_strlen($formContact['text']) > 200) {
            $errors['textTooLong'] = 'Votre message est trop long';
        }
        $errors = array_filter($errors);
        return $errors;
    }
}
