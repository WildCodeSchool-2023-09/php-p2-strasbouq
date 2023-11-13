<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\RestockManager;

class RestockController extends AbstractController
{
    public const PRODUCTS = ['Tulipes', 'Dahlias', 'Cosmos', 'Roses', 'Pivoines', 'Fougeres', 'Eucalyptus'];
    public function addToVerify(): string 
    {
        $errors = [];

        $restockManager = new RestockManager();

        if (!empty($_POST)) {
            $restockForm = array_map('trim', $_POST);
            $errors = $this->validate($restockForm);

            if (empty($errors)) {
                $restockManager->addToVerify($restockForm);
            }
            
        }
        $restocks = $restockManager->selectAll();

        return $this->twig->render('Admin/restock-form.html.twig', ['errors' => $errors, 'restocks' => $restocks]);
    }

    public function validate(array $restockForm): array
    {

        $errors = [];
        //if (in_array($restockForm, self::PRODUCTS)) {
        //    $errors['invalidProduct'] = 'Produit invalide';
        //}
        $verifyController = new VerifyController();
        $errors['negatifQuantity'] = $verifyController->verifyRestock($restockForm['quantity']);
        $errors['quantity'] = $verifyController->verifyCommun($restockForm['quantity']);
        $errors['product'] = $verifyController->verifyCommun($restockForm['product']);
        $errors = array_filter($errors);
        return $errors;
    }

    public function edit(int $id)
    {   
        $restockManager = new RestockManager();
        if (!empty($_POST)) {
            
            $restockManager->update($_POST);

            header('Location:/restock');
        }

        $editRestock = $restockManager->selectOneById($id);

        return $this->twig->render('Admin/restock-edit.html.twig', ['editRestock' => $editRestock]);
    }

    public function delete(int $id)
    {   
        $restockManager = new RestockManager();

        $restockManager->delete($id);

        header('Location:/restock');
    }
    //public function a travailler pour l'ajout a la table 'stock'
    public function insert()
    {

        return $this->twig->render('Admin/restock-form.html.twig');
    }
}
