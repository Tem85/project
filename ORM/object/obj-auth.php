<?php
session_start();

require_once '../Registration.php';
require_once '../Auth.php';

use ORM\Auth;

$auth = new Auth($_POST['email'], $_POST['password']);
$result = $auth->authenticate();


if ($_SESSION['auth']) {
    header("location: ../index.php");
} else {
    print_r($result);
}
