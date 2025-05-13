<?php

use projectSession\Auth;
use projectSession\User;

require_once "User.php";
require_once "Auth.php";
require_once "Registration.php";

$users = new User();
echo 'Добрый день '. $_SESSION['role']. ', ' . $_SESSION['email'];
