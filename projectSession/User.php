<?php

namespace projectSession;

class User
{
    private bool $isAuthorized = false;
    private string $email;
    public function __construct()
    {
        if ($this->isAuthorized)
        {
            $data = file_get_contents(__DIR__. '/email.json');
            $data = json_decode($data, true);
            $_SESSION['email'] = $data['email'];
            $_SESSION['role'] = $data['role'];
        }
    }

    public function isAuthorized(): bool
    {
        if ($_SESSION["auth"] === true)
        {
            $this->isAuthorized = true;
        }
        return $this->isAuthorized;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }
}
