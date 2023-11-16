<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class CategorieManager extends AbstractManager
{
    public const TABLE = 'article';

    public function selectByCategorie(string $orderBy = '', string $direction = 'ASC', string $condition = ''): array
    {
        $query = 'SELECT * FROM ' . self::TABLE ;
        if  ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction . ' WHERE categorie= ' . $condition 
        };
    return $this->pdo->prepare($query)->fetchall();
     }
}
