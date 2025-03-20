<?php

namespace projectSession;

class Auth
{
    private string $email;
    private string $password;

    public function __construct()
    {

    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Auth
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): Auth
    {
        $this->password = $password;
        return $this;
    }

    public function authenticate(): array
    {
        $validate = new Validate();
        $response = [
            'status' => true,
            'error' => [],
        ];

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
        if ($validate->isPassword($this->password) === false)
        {
            $response =[
                'status' => false,
                'error' => [
                    'message' => 'Password is invalid',
                    'code' => 22
                ],
            ];
        }

        if ($response['status'] === true)
        {
            $_SESSION['auth'] = true;
        }


        return $response;
    }

}
