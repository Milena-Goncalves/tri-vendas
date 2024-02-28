<?php
session_start();
require "../bd/db.php";
$isUserLoggedIn = false;

if (isset($_SESSION["user_id"])) {
    $isUserLoggedIn = true;
    $userId = $_SESSION["user_id"];
    $nameSql = "SELECT username AS name FROM users WHERE user_id = :userId";
    $nameStmt = $pdo->prepare($nameSql);
    $nameStmt->execute([":userId" => $userId]);
    $name = $nameStmt->fetch(PDO::FETCH_ASSOC);
}

$categorySql = "SELECT category_id, name FROM categories ORDER BY name ASC";
$categoryStmt = $pdo->prepare($categorySql);
$categoryStmt->execute();
$categories = $categoryStmt->fetchAll(PDO::FETCH_ASSOC);

include "../pages/compar/header.php";
