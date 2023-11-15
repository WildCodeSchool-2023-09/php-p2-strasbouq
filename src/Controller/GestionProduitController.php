<?php

namespace App\Controller;

use App\Controller\AbstractController;

class GestionProduitController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Admin/gestionProduits.html.twig');
    }
}
