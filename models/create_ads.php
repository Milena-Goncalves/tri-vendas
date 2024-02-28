<?php
require "../bd/db.php";
require "../vendor/autoload.php";
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
session_start();

$isUserLoggedIn = false;
if (isset($_SESSION["user_id"])) {
    $isUserLoggedIn = true;
    $user_id = $_SESSION["user_id"];
}

$adCreated = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $bucketName = "imgmilena";
    $region = "eu-north-1";
    $key = "AKIA5FTZCKAFX3NU2OQM";
    $secret = "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";

    // Inicializando cliente S3
    $s3Client = new S3Client([
        "version" => "latest",
        "region" => $region,
        "credentials" => [
            "key" => $key,
            "secret" => $secret,
        ],
    ]);

    $imageUrl = "";

    if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
        $fileName = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];

        // Nome único para o arquivo no bucket
        $key = "uploads/" . uniqid() . "-" . $fileName;

        try {
            // Faz o upload do arquivo para o bucket S3
            $result = $s3Client->putObject([
                "Bucket" => $bucketName,
                "Key" => $key,
                "SourceFile" => $fileTmpName,
                "ACL" => "public-read",
            ]);

            // Obtém a URL pública do arquivo
            $imageUrl = $result["ObjectURL"];
        } catch (AwsException $e) {
            // Trata erros do upload
            echo "Erro ao fazer upload: " . $e->getMessage();
            exit();
        }
    } else {
        // Tratar erro de upload
        echo "Erro ao enviar arquivo: " . $_FILES["image"]["error"];
    }

    $title = $_POST["title"] ?? null;
    $description = $_POST["description"] ?? null;
    $price = preg_replace("/[^\d.]/", "", $_POST["price"] ?? "");
    $category = $_POST["category"] ?? null;
    $location = $_POST["location"] ?? null;

    $sql =
        "INSERT INTO ads (user_id, category_id, title, description, price, location, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if (
        $stmt->execute([
            $user_id,
            $category,
            $title,
            $description,
            $price,
            $location,
            $imageUrl,
        ])
    ) {
        $adCreated = true;
    }
}

$categorySql = "SELECT category_id, name FROM categories ORDER BY name ASC";
$categoryStmt = $pdo->prepare($categorySql);
$categoryStmt->execute();
$categories = $categoryStmt->fetchAll(PDO::FETCH_ASSOC);
