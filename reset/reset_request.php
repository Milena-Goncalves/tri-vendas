<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
require '../bd/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(50)); // Gera um token seguro
        // Armazena o token no banco de dados, associado ao usuário
        $sql = "INSERT INTO password_resets (email, token) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $token]);

        $mail = new PHPMailer(true);

        try {
            //Configurações do servidor
            $mail->isSMTP(); // Setar o uso de SMTP
            $mail->Host = 'smtp.mailtrap.io'; // Servidor SMTP do Mailtrap
            $mail->SMTPAuth = true; // Ativa autenticação SMTP
            $mail->Username = 'f339e1319e8ba6'; // Usuário SMTP do Mailtrap
            $mail->Password = '3ea65a9ecd17fa'; // Senha SMTP do Mailtrap
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Ativar criptografia TLS
            $mail->Port = 2525; // Porta TCP para se conectar

            // Destinatários
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($email); // Adiciona o destinatário

            // Conteúdo
            $mail->isHTML(true); // Define o formato do email para HTML
            $mail->Subject = 'Redefinição de Senha';
            $mail->Body    = "Para redefinir sua senha, clique no seguinte link: http://localhost:3000/reset_password.php?token=$token";
            $mail->AltBody = 'Para redefinir sua senha, copie e cole o seguinte link no seu navegador: http://localhost:3000/reset_password.php?token='.$token;

            $mail->send();
            echo "Instruções de redefinição de senha foram enviadas para seu e-mail.";
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Nenhum usuário encontrado com esse e-mail.";
    }
}

include '../pages/compar/headerlogin.php';
?>
<div class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100" style="margin: 15% 0 15% 0;">
            <div class="col-md-offset-4 col-md-10 col-sm-offset-3 col-sm-6">
                <div class="form-container g-3 align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="#bfacff" class="bi bi-person-circle" viewBox="0 0 16 16 "style="
                    margin: 15px;">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
   
                    <h3 class="title pb-20 pt-20">Solicitação para Redefinição de senha </h3>
                    <form action="reset_request.php" method="post" class="form-horizontal"">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            <div class="form-group d-flex justify-content-center">
                            <button class="btn signin" type="submit" value="Solicitar Redefinição de Senha" name="submit">Enviar código</button>
                    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../pages/compar/footer.php' ?>
