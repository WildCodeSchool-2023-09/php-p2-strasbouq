<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class ContactManager extends AbstractManager
{
    public const TABLE = 'contact';

    public function insert(array $form)
    {
        $statement = $this->pdo->prepare('INSERT INTO ' . self::TABLE .
        '(`name`, `email`, `text`) VALUES (:name, :email, :text)');
        $statement->bindValue('name', $form['name'], PDO::PARAM_STR);
        $statement->bindValue('email', $form['email'], PDO::PARAM_STR);
        $statement->bindValue('text', $form['text'], PDO::PARAM_STR);

        $statement->execute();
    }
}
