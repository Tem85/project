<?php


use projectSession\Registration;
use projectSession\User;

require_once "Registration.php";
require_once "User.php";
//echo'<pre>';

$registration = new Registration(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));
$result = $registration->registration();
if ($_SESSION['reg'])
{
    $users = new User($_SESSION['email']);
    $user = $users->getEmail();
    header('Location: index.php');
} else {
    print_r($result);
}
