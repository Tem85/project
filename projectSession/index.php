<?php

use projectSession\User;

require_once "User.php";
require_once "Auth.php";

session_start();

$users = new User($_SESSION['email']);
$user = $users->getEmail();
echo 'Вы зарегистрированы '. $user;
