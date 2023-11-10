<?php

namespace App\Controller;

use App\Controller\AbstractController;

class AdminDashboardController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Admin/adminDashboard.html.twig');
    }
}
