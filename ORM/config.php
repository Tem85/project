<?php

$connect = "mysql:host=mysql;dbname=app";
$user = "user";
$pass = "secret";

try {
    $pdo = new PDO($connect, $user, $pass);
} catch (PDOException $e) {
    die('404');
}
return $pdo;
