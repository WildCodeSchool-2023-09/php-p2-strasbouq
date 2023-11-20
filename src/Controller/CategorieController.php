<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\CategorieManager;

class CategorieController extends AbstractController
{
    public function show()
    {
        return $this->twig->render('Home\product-page.html.twig');
    }
}
