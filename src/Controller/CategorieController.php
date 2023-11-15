<?php

namespace App\Controller;
use App\Controller\AbstractController;
use App\Model\CategorieManager;

class CategorieController extends AbstractController
{
    public function show()
    {
      //$categorieManager= new CategorieManager; 
      //$produits= $categorieManager->selectOneById($id);
       return $this->twig->render('Home\product-page.html.twig',);

    }
}
