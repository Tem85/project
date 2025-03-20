<?php

namespace projectSession;
class User
{
//    private bool $isAuthorized = false;
    private string $email;
    private string $password;
//    private string $role;
//    private int $id;
    public function __construct()
    {
//        $this->role = $role;
//        $this->id = $id;
//        $this->isAuthorized = false;
    }
//    public function isAuthorized(): bool
//    {
//        return $this->isAuthorized;
//    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

}
