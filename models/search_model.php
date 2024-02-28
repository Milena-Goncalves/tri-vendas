<?php

require "../bd/db.php";
require "log_user.php";

$searchResults = [];

if (isset($_GET["search"]) || isset($_GET["category"])) {
    $searchTerm = isset($_GET["search"]) ? $_GET["search"] : "";
    $category = isset($_GET["category"]) ? $_GET["category"] : "";

    $sql = "SELECT * FROM ads WHERE status = 1";

    $conditions = [];
    $params = [];

    if (!empty($searchTerm)) {
        $conditions[] = "(title LIKE ? OR description LIKE ?)";
        $searchTerm = "%" . $searchTerm . "%";
        $params[] = $searchTerm;
        $params[] = $searchTerm;
    }

    if (!empty($category)) {
        $conditions[] = "category_id = ?";
        $params[] = $category;
    }

    if (count($conditions) > 0) {
        $sql .= " AND " . implode(" AND ", $conditions);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
include "../pages/compar/header.php";
