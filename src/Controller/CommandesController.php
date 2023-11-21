<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\CommandesManager;

class CommandesController extends AbstractController
{
    public function index()
    {
        $commandesManager = new CommandesManager();
        $commades = $commandesManager->selectAll();
        return $this->twig->render('Admin/commandes.html.twig', ['commandes' => $commades]);
    }
}
