<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\CategorieManager;

class CategorieController extends AbstractController
{
    public function index(): string 
    {
        $categorieManager = new CategorieManager;
        $produits = $categorieManager->selectAll('position', 'ASC', '');
        return $this->twig->render('Home/catalogue.html.twig', ['produits' => $produits]);
    }

    public function sortVase(): string
    {
        $categorieManager = new CategorieManager;
        $produits = $categorieManager->selectByCategorie('position', 'ACS', 'vase');
        return $this->twig->render('Home/catalogueVase.html.twig', ['produits' => $produits]);
    }

    public function sortBouquet(): string
    {
        $categorieManager = new CategorieManager;
        $produits = $categorieManager->selectByCategorie('position', 'ACS', 'bouquet');
        return $this->twig->render('Home/catalogueBouquet.html.twig', ['produits' => $produits]);
    }

    public function sortFleur(): string
    {
        $categorieManager = new CategorieManager;
        $produits = $categorieManager->selectByCategorie('position', 'ACS', 'fleur');
        return $this->twig->render('Home/catalogueFleur.html.twig', ['produits' => $produits]);
    }

    public function sortPlante(): string
    {
        $categorieManager = new CategorieManager;
        $produits = $categorieManager->selectByCategorie('position', 'ACS', 'plante');
        return $this->twig->render('Home/cataloguePlante.html.twig', ['produits' => $produits]);
    }
}