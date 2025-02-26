<?php

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = htmlspecialchars($_POST["form_email"]);
    $password = htmlspecialchars($_POST["form_password"]);


}
