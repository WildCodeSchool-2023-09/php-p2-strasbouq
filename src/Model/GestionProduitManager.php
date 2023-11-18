<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class GestionProduitManager extends AbstractManager
{
    public const TABLE = 'article';

    public function add(array $form, string $fileName)
    {
        $statement = $this->pdo->prepare('INSERT INTO ' . self::TABLE .
        '(`name`, `price`, `quantity`, `categorie`, `description`, `position`, `image`) 
        VALUES (:name, :price, :quantity, :categorie, :description, :position, :image)');
        $statement->bindValue('name', $form['name'], PDO::PARAM_STR);
        $statement->bindValue('price', $form['price'], PDO::PARAM_STR);
        $statement->bindValue('quantity', $form['quantity'], PDO::PARAM_INT);
        $statement->bindValue('categorie', $form['categorie'], PDO::PARAM_STR);
        $statement->bindValue('description', $form['description'], PDO::PARAM_STR);
        $statement->bindValue('position', $form['position'], PDO::PARAM_INT);
        $statement->bindValue('image', $fileName, PDO::PARAM_STR);

        $statement->execute();
    }

    public function update(array $form, string $fileName)
    {
        $statement = $this->pdo->prepare('UPDATE ' . self::TABLE . ' SET name=:name, price=:price, 
        quantity=:quantity, categorie=:categorie, description=:description, position=:position, 
        image=:image WHERE id=:id');
        $statement->bindValue('name', $form['name'], PDO::PARAM_STR);
        $statement->bindValue('price', $form['price'], PDO::PARAM_STR);
        $statement->bindValue('quantity', $form['quantity'], PDO::PARAM_INT);
        $statement->bindValue('categorie', $form['categorie'], PDO::PARAM_STR);
        $statement->bindValue('description', $form['description'], PDO::PARAM_STR);
        $statement->bindValue('position', $form['position'], PDO::PARAM_INT);
        $statement->bindValue('image', $fileName, PDO::PARAM_STR);
        $statement->bindValue('id', $form['id'], PDO::PARAM_INT);

        $statement->execute();
    }
}
