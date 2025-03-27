<?php

namespace projectSession;

require_once 'ParentRegAuth.php';

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
        $_SESSION['auth'] = false;
        $validate = new Validate();
        $response = [
            'status' => true,
            'error' => [],
        ];

        if ($validate->emptyEmail($email) === false)
        {
            $response =[
                'status' => false,
                'error' => [
                    'message' => 'Email is invalid',
                    'code' => 21
                ],
            ];
        }

        if (!$validate->isEmail($email))
        {
            $response =[
                'status' => false,
                'error' => [
                'message' => 'Email is invalid',
                    'code' => 20
                ],

            ];
        }

        if ($validate->isPassword($password) === false)
        {
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
            $data = file_get_contents(__DIR__. '/email.json');
            $data = json_decode($data, true);
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['auth'] = true;
        }

        return $response;
    }
}
