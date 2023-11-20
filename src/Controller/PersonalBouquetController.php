<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\PersonalBouquetManager;

class PersonalBouquetController extends AbstractController
{
    public function index(): string
    {
        $personalBManager = new PersonalBouquetManager();
        if (!empty($_POST)) {
            $form = array_map('trim', $_POST);
            $personalBManager->insert($form);
        }
        return $this->twig->render('Home/personal_bouquet.html.twig');
    }
}
