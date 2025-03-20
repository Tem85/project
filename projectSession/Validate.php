<?php

namespace projectSession;

session_start();

class Validate
{
    public function isEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function emptyEmail(string $email)
    {
        if($email !== $_SESSION['email']) {
            return false;
        }
    }
    public function isPassword(string $password)
    {
        if (!password_verify($password, $_SESSION['password']))
        {
            return false;
        }

    }
}
