<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class RestockManager extends AbstractManager
{
    public const TABLE = 'restock';
    public const FINAL_TABLE = 'stock';

    public function addToVerify(array $restockForm)
    {
        $statement = $this->pdo->prepare('INSERT INTO ' . self::TABLE . ' (`product`, `quantity`) VALUES (:product , :quantity)');
        $statement->bindValue('product', $restockForm['product'], PDO::PARAM_STR);
        $statement->bindValue('quantity', $restockForm['quantity'], PDO::PARAM_INT);

        $statement->execute();
    }
    //public function a valider (UPDATE?) pour l'ajout a la table 'stock'
    public function insert()
    {
        $statement = $this->pdo->prepare('INSERT INTO ' . self::FINAL_TABLE . ' (`product`, `quantity`) SELECT (`product`, `quantity`) FROM' . self::FINAL_TABLE);
        $statement->bindValue('product', self::FINAL_TABLE['product'], PDO::PARAM_STR);
        $statement->bindValue('quantity', self::FINAL_TABLE['quantity'], PDO::PARAM_INT);
        $statement->bindValue('product', self::TABLE['product'], PDO::PARAM_STR);
        $statement->bindValue('product', self::TABLE['quantity'], PDO::PARAM_INT);
        
        $statement->execute();
    }

    public function update(array $editForm)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET product=:product, quantity=:quantity WHERE id=:id");
        $statement->bindValue('product', $editForm['product'], PDO::PARAM_STR);
        $statement->bindValue('quantity', $editForm['quantity'], PDO::PARAM_INT);
        $statement->bindValue('id', $editForm['id'], PDO::PARAM_INT);
        
        $statement->execute();
    }



}   
