<?php
session_start();

require_once '../Registration.php';
require_once '../Auth.php';

use ORM\Registration;

$registration = new Registration(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));
$result = $registration->registration();

if ($_SESSION['auth']) {
    header("location: ../index.php");
} else {
    print_r($result);
}
