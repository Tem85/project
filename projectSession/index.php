<?php

use projectSession\User;

require_once "User.php";
require_once "Auth.php";

$users = new User($_SESSION['email']);
$user = $users->getEmail();
echo 'Добрый день '. $user;
