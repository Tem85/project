<?php

header('Content-Type: application/json; charset=utf-8');
$error = [];

$file = __DIR__ . '/email.txt';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["login"])) {
        $error[] = [
            'error' => 0,
            "message" => "Email is empty",
        ];
    }

    if (empty($_POST["password"])) {
        $error[] = [
            'error' => 1,
            "message" => "Password is empty",
        ];
    }

    $email = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);

    if (file_exists($file)) {
        $result = fopen($file, 'r');
        if ($result === false) {
            $error[] = [
                'error' => 2,
                "message" => "Cannot open file " . $file . " for reading",
            ];
            exit;
        }
    }
    $log = [];
    while (($srtLine = fgets($result)) !== false) {
        $srtLine = trim($srtLine);
        $jsonData = json_decode($srtLine, true);

        if ($jsonData === null) {
            $error[] = [
                'error' => 1,
                "message" => "Cannot parse json: " . $srtLine,
            ];
        } else {
            $log[] = $jsonData;
        }
    }

    $loginReturn =[];
    $passwordReturn =[];
    foreach ($log as $logEntry) {
        foreach ($logEntry as $message => $value) {
            if  (in_array($email, $value)) {
                $loginReturn[] = $value['login'];
                $passwordReturn = $value['password'];
            }
        }
    }
    if (in_array($email, $loginReturn)) {
        if(!password_verify($password, $passwordReturn)) {
            $error[] = [
                'error' => 2,
                "message" => "Wrong password",
            ];
        }
    } else {
        $error[] = [
            'error' => 3,
            "message" => "Wrong login",
        ];
    }

    fclose($result);

    if(empty($error)){
        echo "Здравствуйте $email";
    } else {
        echo json_encode($error);
    }
}
