<?php
//session_start();
header('Content-Type: application/json; charset=utf-8');

$error =[];
$file = __DIR__ . '/email.txt';
$result = fopen($file, 'r');
$result = fread($result, filesize($file));

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


    if (strpos($result, $email) !== false && empty($error)) {
        $error[] = [
            'code' => 3,
            'message' => 'Пользователь с таким именем уже существует'
        ];
    }

    if (file_exists($file)) {
        $current = file_get_contents($file);
        $current = (json_encode(['login' => $email, 'password' => $hash_password]). "\n");
    } else {
        $error[] = [
            'code' => 3,
            'message' => 'no write to file'
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
