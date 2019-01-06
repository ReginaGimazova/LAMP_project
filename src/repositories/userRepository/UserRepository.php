<?php

namespace app\repositories\userRepository;

use app\core\DBConnection;
use app\models\User;

/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 04.01.19
 * Time: 16:26
 */

class UserRepository implements UserRepositoryInterface
{
    public function save(User $user)
    {
        $pdo = DBConnection::pgsqlConnection();
        $sql = "insert into users (username, password) values (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword());
        var_dump($user->getPassword());
        var_dump($user->getUsername());
        $stmt->execute();
    }

    public function find(int $id)
    {
        $pdo = DBConnection::pgsqlConnection();
        $sql = "select * from users where user_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findByName(string $name)
    {
        $pdo = DBConnection::pgsqlConnection();
        $sql = "select * from users where username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $name);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function remove(int $id)
    {
        $pdo = DBConnection::pgsqlConnection();
        $sql = "delete from users where user_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function findAll()
    {
        $pdo = DBConnection::pgsqlConnection();
        $sql = "select * from users";
        $stmt = $pdo->prepare($sql);
        return $stmt->fetchAll();
    }
}