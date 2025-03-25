<?php

namespace projectSession;
require_once 'User.php';
require_once 'Validate.php';
require_once 'ParentRegAuth.php';

class Registration extends ParentRegAuth
{
    public function __construct(string $email, string $password)
    {
        parent::__construct($email, $password);
    }

    public function registration(): array
    {
        $email = parent::setEmail($this->getEmail());
        $password = parent::setPassword($this->getPassword());
        $_SESSION['reg'] = false;
        $validate = new Validate();
        $response = [
            'status' => true,
            'error' => [],

        ];

        if (!$validate->isEmail($email)) {
            $response = [
                'status' => false,
                'error' => [
                    'message' => 'Please enter all the fields',
                    'code' => 2
                ],
            ];
        }

        if (str_contains(file_get_contents(__DIR__. '/email.json'), $validate->isEmail($email)))
        {
            $response = [
                'status' => false,
                'error' => [
                    'message' => "Email is invalid",
                    'code' => 1
                ],
            ];
        }

        if ($response['status']) {
            $hash_password = password_hash($password(), PASSWORD_DEFAULT);
            $dataArray = json_encode(['email' => $email(), 'password' => $hash_password, 'role' => 'user']);
            file_put_contents(__DIR__. '/email.json', $dataArray);
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $hash_password;
            $_SESSION['role'] = 'user';
            $_SESSION['reg'] = true;
        }
        return $response;
    }
}
