<?php include "../models/register.php"; ?>

<body>
<div class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100" style="margin: 15% 0 15% 0;">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <div class="form-container g-3 align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="#bfacff" class="bi bi-person-circle" viewBox="0 0 16 16 " style="
    margin: 15px;">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>

                        <h3 class="title">Cadastro</h3>


                        <form class="form-horizontal" action="register.php" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="checkbox">
                                <span class="check-label">I agree to the <a href="">Terms</a> and <a href="">Privacy Policy.</a></span>
                            </div>
                            <button type="submit" name="register" value="Registrar" class="btn signout">Cadastre-se</button>

                            <p></p>
                            <span class="check-label">Caso já tenha conta faça Login:</span>
                            <p></p>
                            <div class="form-group d-flex justify-content-center">
                                <a class="btn signin" href="login.php">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "compar/footer.php"; ?>
</body>