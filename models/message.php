<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";
require "../bd/db.php"; //
$messageResponse = ""; // Para armazenar a mensagem de resposta do envio

// Verifica se o formulário foi submetido
if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST["message"]) &&
    isset($_POST["ad_id"])
) {
    $ad_id = $_POST["ad_id"];
    $messageContent = $_POST["message"];

    // Busca pelo e-mail do anunciante usando o ad_id
    $stmt = $pdo->prepare(
        "SELECT users.email, users.username FROM ads INNER JOIN users ON ads.user_id = users.user_id WHERE ad_id = ?"
    );
    $stmt->execute([$ad_id]);
    $user = $stmt->fetch();

    if ($user) {
        $email = $user["email"]; // E-mail do anunciante

        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor
            $mail->isSMTP();
            $mail->Host = "smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail->Username = "f339e1319e8ba6";
            $mail->Password = "3ea65a9ecd17fa";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 2525;

            // Destinatários
            $mail->setFrom("from@example.com", "Mailer");
            $mail->addAddress($email);

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = "Você recebeu uma mensagem sobre seu anúncio";
            $mail->Body =
                "<h4>Mensagem sobre o seu anúncio</h4><p>" .
                htmlspecialchars($messageContent) .
                "</p>";
            $mail->AltBody = htmlspecialchars($messageContent);

            $mail->send();
            $messageResponse =
                "Mensagem enviada com sucesso para o anunciante.";
        } catch (Exception $e) {
            $messageResponse =
                "A mensagem não pôde ser enviada. Mailer Error: ";
            $mail->ErrorInfo;
        }
    } else {
        $messageResponse =
            "Não foi possível encontrar o anúncio ou o anunciante.";
    }
} else {
    $messageResponse = "Informações necessárias não fornecidas.";
}
