<?php

namespace app\repositories\userRepository;
use app\models\User;

/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 04.01.19
 * Time: 15:55
 */

interface UserRepositoryInterface
{
    public function save(User $user);
    public function find(int $id);
    public function remove(int $id);
    public function findAll();
}