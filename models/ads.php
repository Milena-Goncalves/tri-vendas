<?php
require "../bd/db.php";
$sql = "SELECT ads.*, categories.name AS category_name, users.username AS user_name 
                        FROM ads 
                        JOIN categories ON ads.category_id = categories.category_id 
                        JOIN users ON ads.user_id = users.user_id
                        WHERE ads.status = 1
                        ORDER BY ads.post_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$ads = $stmt->fetchAll(PDO::FETCH_ASSOC);
