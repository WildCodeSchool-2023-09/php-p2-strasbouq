<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class UserManager extends AbstractManager
{
    public const TABLE = 'customers';

    public function insert(array $signForm)
    {
        //ligne 23 : au moment d'injecter la donnée : password, on la crypte avec la
        //function password_hash pour que le mot de passe ne soit pas visible tel quel dans la BDD
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (`userId`, `lastname`, `firstname`, `email`, `password`) 
        VALUES (:userId, :lastname, :firstname, :email, :password)");
        $statement->bindValue('userId', $signForm['userId'], PDO::PARAM_STR);
        $statement->bindValue('lastname', $signForm['lastname'], PDO::PARAM_STR);
        $statement->bindValue('firstname', $signForm['firstname'], PDO::PARAM_STR);
        $statement->bindValue('email', $signForm['email'], PDO::PARAM_STR);
        $statement->bindValue('password', password_hash($signForm['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        return $statement->execute();
    }
    public function userLogin(array $userLogin)
    {
        $statement = $this->pdo->prepare('SELECT email, password FROM ' . self::TABLE . 'WHERE email=:email and password=:password');
        $statement->bindValue('email', $userLogin['email'], PDO::PARAM_STR);
        $statement->bindValue('password', $userLogin['password'], PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch();
    }
}
