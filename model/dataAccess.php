<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_username = "u269742845_root";
$db_name = "u269742845_wattba";
$db_password = "Password123!";

$pdo = new
    PDO("mysql:host=localhost;dbname=$db_name",
$db_username,$db_password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function addAdmin($admin_id,$admin_user,$admin_password) {
    global $pdo;
    $statement = $pdo->prepare('INSERT INTO siteadmin (admin_id,admin_user,admin_password) VALUES (?,?,?)');
    $statement->execute([$admin_id,$admin_user,$admin_password]);
    $result = $statement->fetchALL(PDO::FETCH_CLASS, 'siteadmin');
    return $result;
}

function loginUser($username, $password) {
    global $pdo;
    $statement = $pdo->prepare("SELECT adminUser,adminPass FROM siteadmin WHERE adminUser = ? LIMIT 1");
    try {
        $statement->execute([$username]);
    } catch (Exception $exception) {
        return false;
    }
    if ($statement->rowCount() <= 0) {
        return false;
    }
    $result = $statement->fetchObject('siteadmin');
    return password_verify($password, $result->adminPass);
}