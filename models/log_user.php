<?php
session_start();
include "../bd/db.php";
$isUserLoggedIn = false;

if (isset($_SESSION["user_id"])) {
    $isUserLoggedIn = true;
    $userId = $_SESSION["user_id"];
    $nameSql = "SELECT username AS name FROM users WHERE user_id = :userId";
    $nameStmt = $pdo->prepare($nameSql);
    $nameStmt->execute([":userId" => $userId]);
    $name = $nameStmt->fetch(PDO::FETCH_ASSOC);
}
