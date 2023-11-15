<?php

namespace App\Controller;

use App\Controller\AbstractController;

class CatalogueController extends AbstractController
{
    public function index(): string 
    {
        return $this->twig->render('Home/catalogue.html.twig');
    }

}
