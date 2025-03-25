<?php

use projectSession\Auth;
use projectSession\Registration;
use projectSession\User;
use projectSession\ParentRegAuth;

require_once "Registration.php";
require_once "User.php";
require_once "Validate.php";
require_once "Auth.php";
//echo'<pre>';


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $parentRegAuth = new ParentRegAuth(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));
    $registration = new Registration();
    $result = $registration->registration();
    if ($_SESSION['reg'])
    {
        $users = new User($_SESSION['email']);
        $user = $users->getEmail();
        header('Location: index.php');
        //echo 'Вы зарегистрированы '. $user;
    } else {
        print_r($result);
    }
} else
{
    $auth = new Auth($_GET['email'], $_GET['password']);
    $results = $auth->authenticate();
    if ($_SESSION['auth'])
    {
        $users = new User($_SESSION['auth']);
        $users->isAuthorized();
        header('Location: index.php');
        //echo 'Вы авторизованы '. $_SESSION['email'];
    } else {
        print_r($results);
    }
}
