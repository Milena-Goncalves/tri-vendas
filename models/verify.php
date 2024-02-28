<?php
session_start();

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
