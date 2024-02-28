<?php include "../models/log.php"; ?>
    <form action="verify_code.php" method="post">
        <label for="code">Código de Verificação:</label>
        <input type="text" id="code" name="code" required>
        <button type="submit" name="verify">Verificar</button>
    </form>
