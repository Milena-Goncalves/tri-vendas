<?php
session_start();
require "../bd/db.php";
$isUserLoggedIn = false;
$userInfo = [];

if (isset($_SESSION["user_id"])) {
    $isUserLoggedIn = true;
    $userId = $_SESSION["user_id"];

    // Buscar informações do usuário logado
    $userSql =
        "SELECT username, email, register_date FROM users WHERE user_id = :userId";
    $userStmt = $pdo->prepare($userSql);
    $userStmt->execute([":userId" => $userId]);
    $userInfo = $userStmt->fetch(PDO::FETCH_ASSOC);

    // Ajustar a consulta para buscar apenas anúncios do usuário logado
    $sql = "SELECT ads.*, categories.name AS category_name 
            FROM ads 
            JOIN categories ON ads.category_id = categories.category_id 
            WHERE ads.user_id = :userId AND ads.status = 1
            ORDER BY ads.post_date DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":userId" => $userId]);
    $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
include "../pages/compar/header.php";
