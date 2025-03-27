<?php

namespace projectSession;
class User
{
    private bool $isAuthorized;
    private string $email;
    public function __construct($email, $isAuthorized = false)
    {
        $this->email = $email;
        $this->isAuthorized = $isAuthorized;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function isAuthorized(): bool
    {
        if ($_SESSION["auth"] === true)
        {
            $this->isAuthorized = true;
        }
        return $this->isAuthorized;
    }
}
