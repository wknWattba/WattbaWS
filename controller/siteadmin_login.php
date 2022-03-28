<?php
require_once("../model/siteadmin.php");
require_once("../model/dataAccess.php");

session_start();

if (!isset($_POST["username"])) {
    echo "invalid Username";
    return;
}


$username = $_POST["username"];

if (!isset($_POST["password"])) {
    echo "invalid Password";
    return;
}

$password = $_POST["password"];

echo $username;
echo $password;

if (loginUser($username,$password)) {
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    echo "Successfully logged in";
} else {
    echo "Invalid username or password";
}
}
?>