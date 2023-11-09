<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\UserManager;
use App\Controller\VerifyController;

class UserController extends AbstractController
{
    public const VALABLE_SPETIAL_CHAR = ['!', '?', '&', '%', '@', '*', '#'];

    public function addUser(): string
    {
        $errors = [];
        //Vérification du du formulaire (rempli ou pas) si oui on enleve les
        //espaces et on la place dans une nouvelle variable
        if (!empty($_POST)) {
            $signForm = array_map('trim', $_POST);
            $errors = $this->validate($signForm);
            //Si le formulaire n'a pas d'erreurs qui sont stockés dans la
            //variable $errors, alors il fait appele a la methode insert
            //de UserManager qui envoie les données dans la BDD
            if (empty($errors)) {
                $userManager = new UserManager();
                $userManager->insert($signForm);
                //Si les étapes du dessus sont validées, on est envoyés a l'accueil
                //header('Location:/');
            }
        }

        return $this->twig->render('Home/signup.html.twig', ['errors' => $errors]);
    }

    //Créations d'une methode de vérification du formulaire
    public function validate(array $formSign): array
    {
        $verifyController = new VerifyController();

        $errors = [];

        $errors[] = $verifyController->verifyCommun($formSign['userId']);
        $errors[] = $verifyController->verifyCommun($formSign['lastname']);
        $errors[] = $verifyController->verifyCommun($formSign['firstname']);
        $errors[] = $verifyController->verifyCommun($formSign['email']);
        $errors[] = $verifyController->verifyCommun($formSign['password']);
        $errors[] = $verifyController->verifyEmail($formSign['email']);

        if (strlen($formSign['userId']) > 40) {
            $errors['userIdSoLong'] = 'Votre nom d\'utilisateur est trop long';
        }

        if (strlen($formSign['password']) < 8) {
            $errors['smallPassword'] = 'Votre mot de passe doit contenir plus de 8 caractères';
        }

        //On crée une variable $password qui va stocker
        //tous les caracteres de $forSign['password'] dans un tableau
        $password = str_split($formSign['password']);
        $testcar = false;
        //On boucle chaque element de $password en recuperent le $caractere
        foreach ($password as $cararactere) {
            //On verifie chaque caractere s'il y en a au moin 1 qui
            //se trouve dans le tableau VALABLE_SPETIAL_CAR qui est une constate
            if (in_array($cararactere, self::VALABLE_SPETIAL_CHAR)) {
                $testcar = true;
                break;
            }
        }

        if (!$testcar) {
            $errors['NotSecurePassword'] = 'Votre mot de passe doit contenir 
        //    un caractères spécial : !, ?, &, %, @, *, #';
        }
        var_dump($errors);
        return $errors;
    }
}
