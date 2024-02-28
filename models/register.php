<?php
require "../bd/db.php";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $password]);

    // Redireciona para a página de login após o registro
    header("Location: login.php");
}
include "compar/headerlogin.php";
