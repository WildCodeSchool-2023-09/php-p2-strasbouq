<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\CategorieManager;

class CategorieController extends AbstractController
{
    public function index(): string
    {
        $categorieManager = new CategorieManager();
        $produits = $categorieManager->selectAll('', 'ASC');
        return $this->twig->render('Home/catalogue.html.twig', ['produits' => $produits]);
    }

    public function sortVase(): string
    {
        $categorieManager = new CategorieManager();
        $produits = $categorieManager->selectByCategorie('vase');
        return $this->twig->render('Home/catalogueVase.html.twig', ['produits' => $produits]);
    }

    public function sortBouquet(): string
    {
        $categorieManager = new CategorieManager();
        $produits = $categorieManager->selectByCategorie('bouquet');
        return $this->twig->render('Home/catalogueBouquet.html.twig', ['produits' => $produits]);
    }

    public function sortFleur(): string
    {
        $categorieManager = new CategorieManager();
        $produits = $categorieManager->selectByCategorie('fleur');
        return $this->twig->render('Home/catalogueFleur.html.twig', ['produits' => $produits]);
    }

    public function sortCoffret(): string
    {
        $categorieManager = new CategorieManager();
        $produits = $categorieManager->selectByCategorie('coffret');
        return $this->twig->render('Home/catalogueCoffret.html.twig', ['produits' => $produits]);
    }

    public function show($id)
    {
        $categorieManager = new CategorieManager();
        $produits = $categorieManager->selectOneById($id);
        return $this->twig->render('Home\product-page.html.twig', ['produits' => $produits]);
    }
}
