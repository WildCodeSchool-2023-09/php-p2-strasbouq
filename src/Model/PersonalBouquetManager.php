<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class PersonalBouquetManager extends AbstractManager
{
    public const TABLE = 'compositions';

    public function insert(array $form)
    {
        $statement = $this->pdo->prepare('INSERT INTO ' . self::TABLE .
        ' (`forme`, `couleur`, `fleur1`, `fleur2`, `herbe`) VALUES (:forme, 
        :couleur, :fleur1, :fleur2, :herbe)');
        $statement->bindValue('forme', $form['forme'], PDO::PARAM_STR);
        $statement->bindValue('couleur', $form['couleur'], PDO::PARAM_STR);
        $statement->bindValue('fleur1', $form['fleur1'], PDO::PARAM_STR);
        $statement->bindValue('fleur2', $form['fleur2'], PDO::PARAM_STR);
        $statement->bindValue('herbe', $form['herbe'], PDO::PARAM_STR);
        $statement->execute();
    }
}
