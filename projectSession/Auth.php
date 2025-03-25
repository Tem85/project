<?php

namespace projectSession;

class Auth
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function authenticate(): array
    {
        $_SESSION['auth'] = false;
        $validate = new Validate();
        $response = [
            'status' => true,
            'error' => [],
        ];

        if ($validate->emptyEmail($this->email) === false)
        {
            $response =[
                'status' => false,
                'error' => [
                    'message' => 'Email is invalid',
                    'code' => 21
                ],
            ];
        }

        if (!$validate->isEmail($this->email))
        {
            $response =[
                'status' => false,
                'error' => [
                'message' => 'Email is invalid',
                    'code' => 20
                ],

            ];
        }

        if ($validate->isPassword($this->password) === false)
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
