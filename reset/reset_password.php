<?php
session_start();
require '../db.php';
include '../pages/compar/headerlogin.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['token'])) {
    $_SESSION['token'] = $_GET['token'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $token = $_SESSION['token'];

    if ($newPassword == $confirmPassword) {
        // Buscar o e-mail associado ao token
        $sql = "SELECT email FROM password_resets WHERE token = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token]);
        $email = $stmt->fetchColumn();
        
        if ($email) {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            // Atualizar a senha do usuário no banco de dados
            $sql = "UPDATE users SET password = ? WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$newPasswordHash, $email])) {
                echo "Sua senha foi redefinida com sucesso.";
                // Após a redefinição bem-sucedida, remover o token
                $sql = "DELETE FROM password_resets WHERE email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$email]);
            }
        }
    } else {
        echo "As senhas não coincidem.";
    }
}
?>

<form action="reset_password.php" method="post">
    Nova Senha: <input type="password" name="newPassword" required><br>
    Confirmar Nova Senha: <input type="password" name="confirmPassword" required><br>
    <input type="submit" value="Redefinir Senha">
</form>

<?php include '../principal/compar/footer.php'; ?>