<?php

namespace App\Controller;

class PersonalBouquetController extends AbstractController
{
    public function personalBouquet(): string
    {
        if (!empty($_POST)) {
        }

        return $this->twig->render('Home/personal_bouquet.html.twig');
    }
}
