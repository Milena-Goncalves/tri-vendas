<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";
require "../bd/db.php";

$message = ""; // Inicializa a mensagem como uma string vazia

if (isset($_POST["login"])) {
    $email = $_POST["email"]; // Certifique-se de coletar esses dados do formulário
    $password = $_POST["password"];

    // Sua lógica de verificação de usuário aqui
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $verificationCode = rand(100000, 999999);
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host = "smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail->Username = "f339e1319e8ba6";
            $mail->Password = "3ea65a9ecd17fa";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 2525;

            $mail->setFrom("from@example.com", "Mailer");
            $mail->addAddress($email); // Adiciona o destinatário

            $mail->isHTML(true);
            $mail->Subject = "Seu Código de Verificação";
            $mail->Body = "Seu código de verificação é: $verificationCode";

            $mail->send();

            $_SESSION["verification_code"] = $verificationCode;
            $_SESSION["temp_user_id"] = $user["user_id"];

            header("Location: ../pages/verify_code.php");
            exit();
        } catch (Exception $e) {
            $message = "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    } else {
        $message = "<p>Credenciais inválidas</p>";
    }
}
if ($message !== "") {
    echo $message;
}

$message = "";

if (isset($_POST["verify"])) {
    $userCode = $_POST["code"];

    if ($userCode == $_SESSION["verification_code"]) {
        unset($_SESSION["verification_code"]);
        header("Location: index.php");
        exit();
    } else {
        $message = "<p>Código de verificação incorreto.</p>";
    }
}
?>


<?php if (!empty($message)) {
    echo $message;
} ?>

<!-- Aqui começa o HTML do seu login.php, inclua este PHP no topo do seu arquivo HTML -->


