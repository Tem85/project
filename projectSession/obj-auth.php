<?php

use projectSession\Auth;
use projectSession\User;

require_once "Auth.php";
require_once "User.php";

$auth = new Auth($_POST['email'], $_POST['password']);
$results = $auth->authenticate();
if ($_SESSION['auth'])
{
    $users = new User($_SESSION['auth']);
    $users->isAuthorized();
    header('Location: index.php');
} else {
    print_r($results);
}
