<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '123456';
$db_db = 'classifieds_db';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_db", $db_user, $db_password);
    // Configure o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection error: ' . $e->getMessage();
    exit();
}
?>
