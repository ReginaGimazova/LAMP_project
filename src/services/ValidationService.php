<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 04.01.19
 * Time: 12:16
 */

namespace app\services;

class ValidationService
{
    private $errors = [];

    public function validateEmail(string $email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = 'Введенный email невалидный';
        }
    }

    public function validatePassword(string $password){
        if (strlen($password) < 5){
            $this->errors['password'] = 'Пароль должен содержать более 4 символов';
        }
    }

    public function checkInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}