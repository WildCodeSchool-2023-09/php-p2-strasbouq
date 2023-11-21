<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class CategorieManager extends AbstractManager
{
    public const TABLE = 'article';

    public function selectByCategorie(string $categorie): array
    {
        $query = 'SELECT * FROM ' . self::TABLE . ' WHERE categorie=:categorie';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('categorie', $categorie, PDO::PARAM_STR);

        $statement->execute();
        return $statement->fetchAll();
    }
}
