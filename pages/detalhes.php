<?php
include "../bd/db.php";
include "../models/log_user.php";
include "compar/header.php";
include "../models/message.php";

if (isset($_GET["ad_id"])) {
    $ad_id = $_GET["ad_id"];

    $stmt = $pdo->prepare(
        "SELECT ads.*, categories.name AS category_name, users.username AS user_name FROM ads 
        INNER JOIN categories ON ads.category_id = categories.category_id 
        INNER JOIN users ON ads.user_id = users.user_id 
        WHERE ad_id = ?"
    );
    $stmt->execute([$ad_id]);
    $ad = $stmt->fetch();

    if ($ad) {
        echo "<div class='ad-container'>";
        echo "<h2>" . htmlspecialchars($ad["title"]) . "</h2>";
        echo "<img src='" .
            htmlspecialchars($ad["image_path"]) .
            "' alt='Imagem do Anúncio' style='max-width: 100%; height: auto;'/>";
        echo "<div class='ad-info'>";
        echo "<p><strong>Descrição:</strong> " .
            nl2br(htmlspecialchars($ad["description"])) .
            "</p>";
        echo "<p><strong>Categoria:</strong> " .
            htmlspecialchars($ad["category_name"]) .
            "</p>";
        echo "<p><strong>Preço:</strong> $" .
            htmlspecialchars($ad["price"]) .
            "</p>";
        echo "<p><strong>Localidade:</strong> " .
            htmlspecialchars($ad["location"]) .
            "</p>";

        echo "</div>";
        echo "</div>";
    } else {
        echo "<p>Anúncio não encontrado.</p>";
    }
} else {
    echo "<p>ID do anúncio não especificado.</p>";
}
?>
<?php if (isset($_SESSION["user_id"])) { ?>
    <form action="detalhes.php?ad_id=<?php echo $ad_id; ?>" method="post">
        <input type="hidden" name="ad_id" value="<?php echo $ad_id; ?>">
        <textarea name="message" required></textarea>
        <button type="submit">Enviar Mensagem</button>
    </form>
    <?php if (!empty($messageResponse)) {
        echo "<p>$messageResponse</p>";
    } ?>
    <?php } else {echo "<p>Você precisa estar logado para enviar uma mensagem.</p>";} ?>

<?php include "compar/footer.php"; ?>
