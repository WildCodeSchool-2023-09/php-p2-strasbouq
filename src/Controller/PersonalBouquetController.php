<?php

namespace App\Controller;

class PersonalBouquetController extends AbstractController
{
    public function personalBouquet(): string
    {
        if (!empty($_POST)) {
            var_dump($_POST);
        }

        return $this->twig->render('Home/personal_bouquet.html.twig');
    }
}
