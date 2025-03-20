<?php

use projectSession\Auth;
use projectSession\Registration;

//require_once "Registration.php";
require_once "User.php";
require_once "Validate.php";
require_once "Auth.php";
echo'<pre>';


$auth = new Auth();
$results = $auth->setEmail($_GET["email"])
    ->setPassword($_GET["password"])
    ->authenticate();
print_r($results);
