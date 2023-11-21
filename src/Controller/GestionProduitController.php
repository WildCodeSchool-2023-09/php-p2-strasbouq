<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\GestionProduitManager;
use App\Controller\VerifyController;

class GestionProduitController extends AbstractController
{
    public function index(): string
    {
        $gestionManager = new GestionProduitManager();
        $produits = $gestionManager->selectAll();

        return $this->twig->render('Admin/gestionProduit.html.twig', ['produits' => $produits]);
    }

    public function add()
    {

        $errors = [];
        if (!empty($_POST)) {
            $errors = $this->validate($_POST);

            if (empty($errors)) {
                $uploadDir = __DIR__ . '/../../public/upload/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir);
                }
                $filesName = $_FILES['image']['name'];
                $tmpName = $_FILES['image']['tmp_name'];
                move_uploaded_file($tmpName, $uploadDir . $filesName);

                $gestionManager = new GestionProduitManager();
                $gestionManager->add($_POST, $filesName);

                header('Location:/gestionProduit');
            }
        }
        return $this->twig->render('Admin/addProduit.html.twig', ['errors' => $errors]);
    }

    public function edit($id)
    {
        $gestionManager = new GestionProduitManager();
        $errors = [];
        if (!empty($_POST)) {
            $uploadDir = __DIR__ . '/../../public/upload/';
            $filesName = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmpName, $uploadDir . $filesName);
            $errors = $this->validate($_POST);

            if (empty($errors)) {
                $gestionManager->update($_POST, $filesName);
            }
            header('Location:/gestionProduit');
        }
        $produits = $gestionManager->selectOneById($id);
        return $this->twig->render('Admin/editProduit.html.twig', ['produits' => $produits, 'errors' => $errors]);
    }

    public function delete($id)
    {
        $gestionManager = new GestionProduitManager();
        $gestionManager->delete($id);
        header('Location:/gestionProduit');
    }

    public function validate(array $form)
    {
        $verifiController = new VerifyController();

        $errors = [];

        $errors['name'] = $verifiController->verifyCommun($form['name']);
        $errors['price'] = $verifiController->verifyCommun($form['price']);
        $errors['quantity'] = $verifiController->verifyCommun($form['quantity']);
        $errors['description'] = $verifiController->verifyCommun($form['description']);

        $errors = array_filter($errors);
        return $errors;
    }
}
