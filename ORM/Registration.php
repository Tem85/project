<?php

namespace ORM;

//require_once 'Validate.php';
require_once 'ParentRegAuth.php';
require_once 'User.php';


class Registration extends ParentRegAuth
{
    public function __construct(string $email, string $password)
    {
        parent::__construct($email, $password);
    }

    public function registration(): array
    {
        $user = new User();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $_SESSION['auth'] = false;
        $response = [
            'status' => true,
            'error' => []

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

        foreach ($user->all() as $value) {
            if ($value['email'] === $email) {
                $response = [
                    'status' => false,
                    'error' => [
                        'message' => 'Email already exists',
                        'code' => 2
                    ]
                ];
            }
        }

        if ($response['status']) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $user->create(['username' => 'test', 'email' => $email, 'password' => $hash_password]);
            $_SESSION['email'] = $email;
            $_SESSION['auth'] = true;
        }
        return $response;
    }
}
