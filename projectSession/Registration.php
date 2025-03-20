<?php

namespace projectSession;
require_once 'User.php';
require_once 'Validate.php';

//session_start();

class Registration
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

    public function setEmail(string $email): Registration
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): Registration
    {
        $this->password = $password;
        return $this;
    }

    public function registration(): array
    {
        $validate = new Validate();
        $response = [
            'status' => true,
            'error' => [],

        ];

        if (!$validate->isEmail($this->email)) {
            $response = [
                'status' => false,
                'error' => [
                    'message' => 'Please enter all the fields',
                    'code' => 2
                ],
            ];
        }

        if (str_contains(file_get_contents(__DIR__. '/email.json'), $validate->isEmail($this->email)))
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
            $hash_password = password_hash($this->password, PASSWORD_DEFAULT);
            $dataArray = json_encode(['email' => $this->email, 'password' => $hash_password, 'role' => 'user']);
            file_put_contents(__DIR__. '/email.json', $dataArray);
            $_SESSION['email'] = $this->email;
            $_SESSION['password'] = $hash_password;
            $_SESSION['role'] = 'user';
        }
        //var_dump($_SESSION['email']);
        return $response;
    }
}

$registration = new Registration();

$result = $registration->setEmail(htmlspecialchars($_POST["email"]))
    ->setPassword(htmlspecialchars($_POST["password"]))
    ->registration();
print_r($result);











//    public function registration()
//    {
//        $hash_password = password_hash($this->password, PASSWORD_DEFAULT);
//        $data = __DIR__. '/email.json';
//        $dataArrays = file_get_contents($data);
//        $dataArray = json_encode(['email' => $this->email, 'password' => $hash_password, 'roles' => $this->roles]);
//
//        if(empty($this->email) || empty($this->password)) {
//            echo  'Please enter all the fields';
//            exit;
//        }
//
//        if (str_contains($dataArrays, $this->email)) {
//            echo 'Please enter a valid email address';
//            exit;
//        }
//
//        if(empty($error)) {
//            file_put_contents($data, $dataArray);
//            //$_SESSION["email"] = $email;
//            //$_SESSION["password"] = $hash_password;
//            //$_SESSION["role"] = "user";
//            //echo 'Здравствуйте '. $this->email;
//            header('Location: log-out.php');
//        }
//    }
//}
//
//$registration = new Registration(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));
//$registration->registration();
