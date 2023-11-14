<?php

namespace App\Controller;

use App\Controller\AbstractController;

class VerifyController extends AbstractController
{
    public function verifyCommun(string $champ)
    {
        $error = '';
        if (empty($champ)) {
            $error = 'Le champ doit être rempli';
        }
        return $error;
    }

    public function verifyEmail(string $email)
    {
        $error = '';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Le mail n\'est pas valide';
        }
        return $error;
    }

    public function verifyRestock(string $quantity)
    {
        $error = '';
        if ($quantity < 0) {
            $error = 'Le nombre doit etre positif';
        }
        return $error;
    }
}
