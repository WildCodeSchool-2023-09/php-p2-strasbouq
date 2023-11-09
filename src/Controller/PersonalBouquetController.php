<?php

namespace App\Controller;

class PersonalBouquetController extends AbstractController
{
    public function personalBouquet(): string
    {
        return $this->twig->render('Home/personal_bouquet.html.twig');
    }
}
