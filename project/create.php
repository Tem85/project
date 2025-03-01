<?php
//session_start();
header('Content-Type: application/json; charset=utf-8');

$error = [];
$currents = [];

$file = __DIR__ . '/email.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["login"])) {
        $error[] = [
            'code' => 1,
            'message' => 'no login'
        ];
    }

    if (empty($_POST["password"])) {
        $error[] = [
            'code' => 2,
            'message' => 'no pass'
        ];
    }

    $email = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if (file_exists($file)) {
        $current = file_get_contents($file);
        //$current = $email.', '."\n".$hash_password."\n";
    } else {
        $error[] = [
            'code' => 4,
            'message' => 'no write to file'
        ];
    }

    if (!str_contains($current, $email)) {
        $current = (json_encode([['login' => $email, 'password' => $hash_password]]). "\n");
    } else {
        $error[] = [
            'code' => 3,
            'message' => 'Пользователь с таким именем уже существует'
        ];
    }

    if (empty($error)) {
        file_put_contents($file, $current, FILE_APPEND | LOCK_EX );
        echo 'Регистрация пройдена';
    } else {
        echo json_encode($error);
   }

}

//echo json_encode([
  //  'error' => $error,
//]);
