<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\AdminMessageManager;

class AdminMessageController extends AbstractController
{
    public function index(): string
    {
        $adminMessageManager = new AdminMessageManager();
        $messages = $adminMessageManager->selectAll('id', 'DESC');
        return $this->twig->render('Admin/adminMessage.html.twig', ['messages' => $messages]);
    }

    public function delete($id)
    {
        $adminMessageManager = new AdminMessageManager();
        $adminMessageManager->delete($id);
        header('Location:/message');
    }
}
