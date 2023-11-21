<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\StockManager;

class StockController extends AbstractController
{
    public function index(): string
    {

        $stockManager = new StockManager();

        $stocks = $stockManager->selectAll();

        return $this->twig->render('Admin/stock-form.html.twig', ['stocks' => $stocks]);
    }

    public function edit(int $id)
    {
        $stockManager = new StockManager();
        if (!empty($_POST)) {
            $stockManager->update($_POST);

            header('Location:/stock');
        }

        $editStock = $stockManager->selectOneById($id);

        return $this->twig->render('Admin/stock-edit.html.twig', ['editStock' => $editStock]);
    }

    public function increment(int $id)
    {
        $stockManager = new StockManager();
        if (!empty($_POST)) {
            $stockManager->increment($_POST);
            header('Location:/stock');
        }
        $restocks = $stockManager->selectOneById($id);

        return $this->twig->render('Admin/stock-restock.html.twig', ['restocks' => $restocks]);
    }
}
