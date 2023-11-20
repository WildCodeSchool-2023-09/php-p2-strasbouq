<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class StockManager extends AbstractManager
{
    public const TABLE = 'article';

    public function update(array $editForm)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
        " SET name=:name, price=:price, quantity=:quantity WHERE id=:id");
        $statement->bindValue('name', $editForm['name'], PDO::PARAM_STR);
        $statement->bindValue('price', $editForm['price'], PDO::PARAM_STR);
        $statement->bindValue('quantity', $editForm['quantity'], PDO::PARAM_INT);
        $statement->bindValue('id', $editForm['id'], PDO::PARAM_INT);

        $statement->execute();
    }

    public function increment(array $restocks)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
        " SET quantity = quantity + :refill  WHERE id=:id");
        $statement->bindValue('refill', $restocks['refill'], PDO::PARAM_INT);
        $statement->bindValue('id', $restocks['id'], PDO::PARAM_INT);
        $statement->execute();
    }
}
