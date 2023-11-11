<?php

namespace App\Controller;
require "../../config/config.php";

class UserController extends AbstractController
{
    public function signup(): string
    {
        return $this->twig->render('Home/signup.html.twig');
    }
    public function checkLogin(): bool
    {
        $errors= array();
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);

        // Différentes vérifications;


        // Verif pas d'erreurs
        if (empty($errors))
            return true;

        return false;
    }
}
