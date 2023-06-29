<?php
session_start();
// redirect upon success
require "Authenticator.php";
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: index.php");
    exit();
}

$Authenticator = new Authenticator();

// change code every minute
$checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2); // 2 = 2*30sec clock tolerance

if (!$checkResult) {
    $_SESSION['failed'] = true;
    header("Location: index.php");
    exit();
}
// redirect to the pages dashboard upon success.
header("Location: http://localhost/FinalTest/clients/pages_dashboard");
?>

