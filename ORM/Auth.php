<?php

namespace ORM;

require_once 'ParentRegAuth.php';
require_once 'User.php';


class Auth extends ParentRegAuth
{
    public function __construct($email, $password)
    {
        parent::__construct($email, $password);
    }

    public function authenticate(): array
    {

        $email = $this->getEmail();
        $password = $this->getPassword();
        $user = new User();
        $userEmailPass = $user->findEmail($email);
        $_SESSION['auth'] = false;
        $response = [
            'status' => true,
            'error' => [],
        ];

        if (empty($email) || empty($password)) {;
            $response = [
                'status' => false,
                'error' => [
                    'message' => 'All fields are required',
                    'code' => 1
                ]
            ];
        }

        if (empty($userEmailPass)) {;
            $_SESSION['error'] = 'Email or password is incorrect';
            header('location: /ORM/form.php');
            $response = [
                'status' => false,
                'error' => [
                    'message' => 'All fields are required',
                    'code' => 20
                ]
            ];
        }


        if (password_verify($password, $userEmailPass['password']) === false) {
            $_SESSION['error'] = 'Email or password is incorrect';
            header('location: /ORM/form.php');
            $response = [
                'status' => false,
                'error' => [
                    'message' => 'Password is invalid',
                    'code' => 22
                ],
            ];
        }

        if ($response['status'] === true)
        {
            $_SESSION['email'] = $userEmailPass['email'];
            $_SESSION['id'] = $userEmailPass['Id'];
            $_SESSION['auth'] = true;
        }

        return $response;
    }
}
